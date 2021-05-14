<?php
require_once('dbhelper.php');
session_start();
if ($_SESSION['accountType'] != 'director' and $_SESSION['accountType'] != 'tutor') {
    header("Location: index.php");
}

$tutorEmail = $_SESSION['username'];
$courseInfo = getOneRow("SELECT courseName from course where tutor = '$tutorEmail'");
$courseName = 'None';
if ($courseInfo) {
    $courseName = $courseInfo['courseName'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/page-dim.css">
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
    />
    <title>Calendar</title>
    <script src="assets/js/daypilot/daypilot-all.min.js"></script>

</head>

<body>

<?php require_once('nav-bar.php') ?>

<br>
<div class="row">
    <div class="container">
        <div style="display: flex">
            <div style="margin-right: 10px;">
                <div id="nav"></div>
            </div>
            <div style="flex-grow: 1;">
                <div id="dp"></div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

    var nav = new DayPilot.Navigator("nav");
    nav.showMonths = 3;
    nav.skipMonths = 3;
    nav.selectMode = "week";
    nav.onTimeRangeSelected = function (args) {
        dp.startDate = args.day;
        dp.update();
        loadEvents();
    };
    nav.init();

    var dp = new DayPilot.Calendar("dp");
    dp.viewType = "Week";

    dp.eventDeleteHandling = "Update";

    dp.onEventDeleted = function (args) {
        DayPilot.Http.ajax({
            url: "backend_delete.php",
            data: {
                id: args.e.id()
            },
            success: function () {
                console.log("Deleted.");
            }
        })

    };

    dp.onEventMoved = function (args) {
        DayPilot.Http.ajax({
            url: "backend_move.php",
            data: {
                id: args.e.id(),
                newStart: args.newStart,
                newEnd: args.newEnd
            },
            success: function () {
                console.log("Moved.");
            }
        });
    };

    dp.onEventResized = function (args) {
        DayPilot.Http.ajax({
            url: "backend_move.php",
            data: {
                id: args.e.id(),
                newStart: args.newStart,
                newEnd: args.newEnd
            },
            success: function () {
                console.log("Resized.");
            }
        });
    };

    // event creating
    dp.onTimeRangeSelected = function (args) {
        name = '<?php echo $courseName ?>';
        dp.clearSelection();
        if (!name || name === 'None') {
            alert('You have not assigned a course to tutor.');
            return;
        }

        DayPilot.Http.ajax({
            url: "backend_create.php",
            data: {
                start: args.start,
                end: args.end,
                text: name,
                resource: '<?php echo $_SESSION['username'];?>'
            },
            success: function (ajax) {
                var data = ajax.data;
                dp.events.add(new DayPilot.Event({
                    start: args.start,
                    end: args.end,
                    id: data.id,
                    text: name
                }));
                console.log("Created.");
            }
        });

    };

    dp.onEventClick = function (args) {
        alert("clicked: " + args.e.text());
    };

    dp.init();

    loadEvents();

    function loadEvents() {
        dp.events.load("backend_events.php");
    }

</script>

</body>
</html>