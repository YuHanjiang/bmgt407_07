<?php
session_start();
require_once("dbhelper.php");

if ($_SESSION['accountType'] != 'student') {
    header("Location: index.php");
}

$tutors = getRows("SELECT * FROM users WHERE accountType = 1");
$courses = getRows("SELECT * FROM course");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tutor = $_POST['tutorEmail'];
    $comments = $_POST['comments'];
    $course = $_POST['course'];
    $rating = $_POST['experience'];
    $improve = $_POST['improve'];
    runQuery("INSERT INTO feedback (tutor, student, rating, improve, course, comments) 
                    VALUES ('$tutor', '$name', '$rating', '$improve', '$course', '$comments')");
    echo "<script>alert('Thanks for your feedback')</script>";
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback Form</title>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
</head>
<body>

<?php require_once('nav-bar.php') ?>

<div class="container" style="margin-top: 50px; width:600px">
    <h2>Feedback</h2>
    <p>
        Please provide your feedback below:
    </p>
    <form action="feedback-form-input.php" method="POST">
        <div class="form-group">
            <label>How do you rate your overall experience?</label>
            <p>
                <label class="radio-inline">
                    <input type="radio" name="experience" id="overall-below-average" value="Below Average">
                    Below Average
                </label>

                <label class="radio-inline">
                    <input type="radio" name="experience" id="overall-average" value="Average">
                    Average
                </label>

                <label class="radio-inline">
                    <input type="radio" name="experience" id="overall-above-average" value="Above Average">
                    Above Average
                </label>
            </p>
        </div>
        <div class="form-group">
            <label>Did grades on homeworks, assignments, or exams improve after your tutoring session?</label>
            <p>
                <label class="radio-inline">
                    <input type="radio" name="improve" id="grades-yes" value="Yes">
                    Yes
                </label>
                <label class="radio-inline">
                    <input type="radio" name="improve" id="grades-no" value="No">
                    No
                </label>
            </p>
        </div>
        <div class="form-group">
            <label for="comments">
                Comments:</label>
            <textarea class="form-control" name="comments" id="comments"
                      placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="name">
                    Your Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">
                    Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="tutor-name">
                    Tutor Name:</label>
                <select class="form-control" name="tutorEmail" id="tutor-name" required>
                    <?php
                    foreach ($tutors as $tutor) {
                        echo '<option value=' . $tutor['email'] . ">" . $tutor['firstName'] . " " .
                            $tutor['lastName'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="col-sm-6 form-group">
                <label for="course">
                    Course:</label>
                <select class="form-control" name="course" id="course" required>
                    <?php
                    foreach ($courses as $course) {
                        echo '<option>' . $course['courseName'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-danger btn-block" type="submit" name="submit">Submit</button>
        </div>
    </form>
</div>
</body>
</html>