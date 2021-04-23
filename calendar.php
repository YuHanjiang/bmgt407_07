<?php
require_once('dbhelper.php');
session_start();

$username = $_SESSION['username'];
$appointments = getRows("SELECT * FROM appointment where tutor = '$username'");

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
    <div class="col-8">
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
    <div class="col-4">
        <div class="container">
            <div class="p-3">
                <h4>Upcoming Sessions: </h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Student</th>
                        <th scope="col">Comments</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($appointments as $appointment) {
                        echo "<tr>";
                        echo "<td>" . $appointment['date'] . "</td>";
                        echo "<td>" . $appointment['time'] . "</td>";
                        echo "<td>" . $appointment['student'] . "</td>";
                        echo "<td style=\"word-wrap: break-word;min-width: 100px;max-width: 100px;\">" .
                            $appointment['comments'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
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
        var name = prompt("New event name:", "Event")
        dp.clearSelection();
        if (!name) {
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