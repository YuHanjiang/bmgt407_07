<?php
session_start();
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

    <meta name="referrer" content="no-referrer-when-downgrade"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/helpers/v2/main.css?v=2021.1.248" type="text/css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"/>
    <script src="assets/js/daypilot-all.min.js"></script>


</head>

<body>

<?php require_once('nav-bar.php') ?>

<br>
<div class="row">
    <div class="col-8">
        <div class="container">
            <div class="main">
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
    </div>
    <div class="col-4">
        <div class="container">
            <div class="row justify-content-center">
                <a class="btn btn-danger btn-lg" href="https://calendar.google.com">Edit Calendar</a>
            </div>
            <div class="p-3">
                <h4>Upcoming Sessions: </h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Student</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mar. 25</td>
                        <td>15:00</td>
                        <td>Student1</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Mar. 26</td>
                        <td>10:00</td>
                        <td>Student2</td>
                    </tr>
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

    var dp = new DayPilot.Calendar("dp");
    dp.init();

    nav.init();

    dp.viewType = "Week";

    dp.eventDeleteHandling = "Update";

    dp.onTimeRangeSelected = function (args) {
        var name = prompt("New event name:", "Event");
        if (!name) return;
        var e = new DayPilot.Event({
            start: args.start,
            end: args.end,
            id: DayPilot.guid(),
            text: name
        });
        dp.events.add(e);
        dp.clearSelection();
    };

    dp.eventDeleteHandling = "Update";
    dp.onEventDelete = function (args) {
        if (!confirm("Do you really want to delete this event?")) {
            args.preventDefault();
        }
    };

    dp.headerDateFormat = "dddd";
    dp.init();

    var e = new DayPilot.Event({
        start: new DayPilot.Date("2021-04-23T12:00:00"),
        end: new DayPilot.Date("2021-04-23T12:00:00").addHours(3).addMinutes(15),
        id: "1",
        text: "Special event"
    });
    dp.events.add(e);

</script>

<script src="assets/helpers/v2/app.js?v=2021.1.248"></script>

</body>
</html>