<?php
require_once('dbhelper.php');
require_once('filehelper.php');
session_start();

if ($_SESSION['accountType'] != 'director' and $_SESSION['accountType'] != 'student') {
    header("Location: index.php");
}

$courses = getRows("SELECT courseName FROM course");
if (isset($_POST['courseSelect']) and $_SESSION['courseName'] = 'UNDEFINED') {
    $_SESSION['courseName'] = $_POST['course'];
    $courseName = $_SESSION['courseName'];
} else if (isset($_POST['courseReselect'])) {
    $_SESSION['courseName'] = 'UNDEFINED';
} else if (isset($_POST['submit']) and $_SESSION['courseName'] != 'UNDEFINED') {
    $comp = preg_split("/\s+/", $_POST['tutor']);
    $tutorEmail = $comp[2];
    $studentEmail = $_SESSION['username'];
    $date = $_POST['sessionDate'];
    $time = $_POST['sessionTime'];
    $comment = $_POST['comment'];
    $datetime = $_POST['sessionDate'] . " " . $_POST['sessionTime'];
    $courseName = $_SESSION['courseName'];
    $supp = $_FILES['supp'];
    $suppURL = uploadFile($supp, 'assets/docs/supp');
    $checkQuery = "SELECT * from events where start = '$datetime' and name = '$courseName'";
    $avail = getOneRow($checkQuery);
    $_SESSION['courseName'] = 'UNDEFINED';
    if ($avail) {
        runQuery("INSERT INTO appointment (course, tutor, date, time, comments, student, fileURL)
            VALUES('$courseName', '$tutorEmail', '$date', '$time', '$comment', '$studentEmail', '$suppURL')");
        $id = $avail['id'];
        runQuery("DELETE from events where id = '$id'");
        header("Location: confirmation-page.php");
    } else {
        echo "<script>alert('There is no such availability! Please try again')</script>";
    }
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
            <div class="p-2">
                <div class="text-center">
                    <h4>Schedule Appointments</h4>
                </div>
            </div>
            <form action="schedule.php" method="POST">
                <div class="form-group">
                    <label for="course">Course:</label>
                    <select class="form-control" id="course" name="course" required>
                        <?php
                        if ($_SESSION['courseName'] != 'UNDEFINED') {
                            $courseName = $_SESSION['courseName'];
                            $courses = getRows("SELECT courseName FROM course where courseName = '$courseName'");
                        }
                        foreach ($courses as $course) {
                            echo "<option>" . $course['courseName'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="p-2">
                            <button class="btn btn-danger btn-block" name="courseSelect" type="submit">Select
                            </button>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="p-2">
                            <button class="btn btn-danger btn-block" name="courseReselect" type="submit">Reselect
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <form action="schedule.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tutor">Tutor: </label>
                    <select class="form-control" name="tutor" id="tutor" required>
                        <?php
                        $courseName = $_SESSION['courseName'];
                        $tutors = getRows("SELECT firstName, lastName, email from users left join course on 
                                                    users.email = course.tutor where accountType = 1 and 
                                                                                    course.courseName = '$courseName'");
                        if ($tutors) {
                            foreach ($tutors as $tutor) {
                                echo "<option>" . $tutor['firstName'] . " " . $tutor['lastName'] . " " .
                                    $tutor['email'] . "</option>";

                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="session-date">Date: </label>
                    <input type="date" name="sessionDate" id="session-date" required>
                </div>

                <div class="form-group">
                    <label for="session-time">Time: </label>
                    <input type="time" name="sessionTime" id="session-time">
                </div>

                <div class="form-group">
                    <label for="comment">Comments:</label>
                    <textarea class="form-control" id="comment" name="comment" required></textarea>
                </div>

                <div class="form-group">
                    <label for="file-upload">Upload file: </label>
                    <input type="file" class="form-control-file" name="supp" id="file-upload" required>
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
    dp.eventResizeHandling = "Disabled";
    dp.eventMoveHandling = "Disabled"

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
