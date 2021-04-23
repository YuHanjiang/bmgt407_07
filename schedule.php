<?php
require_once('dbhelper.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$courses = getRows("SELECT courseName FROM course");

if (isset($_POST['submit'])) {
//    if ($_POST['password'] != $_POST['repeatPassword']) {
//        echo '<script>alert("Please enter the same password twice")</script>';
//    }
//    $email = $_POST['email'];
//    $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
//    $firstName = $_POST['firstName'];
//    $lastName = $_POST['lastName'];
//
//    $checkQuery = "SELECT email from users where email = '$email'";
//    if (getOneRow($checkQuery)) {
//        echo '<script>alert("User Exists!")</script>';
//    } else {
//        runQuery("INSERT INTO users VALUES ('$email', '$pwd', '$firstName', '$lastName', 2);");
//        header("Location: login.php");
//    }
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
    <title>Schedule</title>
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
            <div class="row justify-content-center">
                <form action="schedule.php" method="POST">
                    <div class="p-2">
                        <div class="text-center">
                            <h4>Schedule Appointments</h4>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="course">Course:</label>
                        <select class="form-control" id="course" required>
                            <?php
                            foreach ($courses as $course) {
                                echo "<option>" . $course['courseName'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tutor">Tutor: </label>
                        <select class="form-control" id="tutor" required>
                            <option>Tutor1</option>
                            <option>Tutor2</option>
                            <option>Tutor3</option>
                            <option>Tutor4</option>
                            <option>Tutor4</option>
                            <option>Tutor5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="session-date">Date: </label>
                        <input type="date" id="session-date" required>
                    </div>

                    <div class="form-group">
                        <label for="session-time">Time: </label>
                        <input type="time" id="session-time">
                    </div>

                    <div class="form-group">
                        <label for="comment">Comments:</label>
                        <textarea class="form-control" id="comment" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="file-upload">Upload file: </label>
                        <input type="file" class="form-control-file" id="file-upload" required>
                    </div>

                    <!--div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    </div-->
                    <div class="p-2">
                        <button class="btn btn-danger btn-block" name="submit" type="submit">Submit</button>
                    </div>
                </form>
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

    dp.init();

    dp.onEventClick = function (args) {
        alert("clicked: " + args.e.text());
    };

    loadEvents();

    function loadEvents() {
        dp.events.load("backend_events.php");
    }

</script>

</body>
</html>
