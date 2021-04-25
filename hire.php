<?php
require_once('dbhelper.php');
require_once('filehelper.php');
session_start();
date_default_timezone_set('America/New_York');

$courses = getRows("SELECT courseName FROM course");
$Tutors = getRows("SELECT * FROM Tutor");
if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $grade = $_POST['grade'];
    $UID = $_POST['studentID'];
    $phone = $_POST['phone'];
    $focus1 = $_POST['course1'];
    $grade1 = $_POST['grade1'];
    $focus2 = $_POST['course2'];
    $grade2 = $_POST['grade2'];
    $focus3 = $_POST['course3'];
    $grade3 = $_POST['grade3'];
    $workHours = $_POST['workHours'];
    $short_answer = $_POST['shortAnswer'];
    $resume = $_FILES['resume'];
    $today = date("Y-m-d");

    $resumeURL = uploadFile($resume, 'assets/docs/resume');

    if (getOneRow("select * from Tutor where TutorEmail = '$email'")) {
        echo "<script>alert('You have already filed an application!')</script>";
    } else if (getOneRow("SELECT * from users where email='$email'")) {
        echo "<script>alert('This email has already registered!')</script>";
    } else {
        runQuery("INSERT INTO Tutor (FirstName, LastName, TutorEmail, Gender, GradeYear, UID, Phone, 
                   Course1, Grade1, Course2, Grade2, Course3, Grade3, WorkHours, ShortAnswer, resumeURL, 
                   ApplicationStatus, ApplyDate) 
                   VALUES('$firstName', ' $lastName', '$email', '$gender', '$grade', '$UID', '$phone', '$focus1',
                          '$grade1', '$focus2','$grade2','$focus3','$grade3', '$workHours', '$short_answer' ,
                          '$resumeURL', 'In Process', '$today')");
        header("Location: hire-confirmation.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <title>Become a Tutor</title>
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

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="p-5">
            <picture>
                <img src="assets/img/logo.png" alt="ASTS Logo">
            </picture>

            <div class="p-2">
                <div class="text-center">
                    <h2>Tutor Application Form</h2>
                    <p> Please fill out the following information to apply for a tutoring position. Give us about two
                        weeks to inform you of the status of your application. For questions, contact us at <u>aaptutoring@umd.edu</u>
                    </p>
                </div>
            </div>
            <!-- Begin my form -->
            <form action="hire.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="First Name">First Name:</label>
                            <input class="form-control" type="text" name="firstName" id="First Name"
                                   placeholder="First Name" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="Last Name">Last Name:</label>
                            <input class="form-control" type="text" name="lastName"
                                   id="Last Name" placeholder="Last Name" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="loginEmail">Email:</label>
                    <input class="form-control" type="email" id="loginEmail" name="email"
                           aria-describedby="emailHelp" placeholder="Email Address" required>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="Gender">Gender:</label>
                            <select class="form-control" name="gender" id="Gender">
                                <option value=""> --select--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="NoAnswer">I don't want to answer</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="Grade">Grade Year</label>
                            <select class="form-control" name="grade" id="Grade" required>
                                <option value=""> --select--</option>
                                <option value="freshman">Freshman</option>
                                <option value="Sophomore">Sophomore</option>
                                <option value="Junior">Junior</option>
                                <option value="Senior">Senior</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="UID">Student ID: </label>
                            <input class="form-control" type="Number" name="studentID" id="UID"
                                   placeholder="StudentID" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="Phone">Phone Number: </label>
                            <input class="form-control" type="Number" id="Phone" name="phone"
                                   placeholder="Phone Number" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="Course Focus 1">Course Focus 1: </label>
                            <select class="form-control" name="course1" id="Course Focus 1" required>
                                <?php
                                foreach ($courses as $course) {
                                    echo "<option>" . $course['courseName'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="Course Grade 1">Course Grade 1: </label>
                            <input class="form-control" type="text" name="grade1" id="Course Grade 1"
                                   placeholder="Course Grade 1" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="Course Focus 2">Course Focus 2: (Optional) </label>
                            <select class="form-control" name="course2" id="Course Focus 2">
                                <option selected="selected"></option>
                                <?php
                                foreach ($courses as $course) {
                                    echo "<option>" . $course['courseName'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="Course Grade 2">Course Grade 2: (Optional) </label>
                            <input class="form-control" type="text" id="Course Grade 2" name="grade2"
                                   placeholder="Course Grade 2">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="Course Focus 3">Course Focus 3: (Optional) </label>
                            <select class="form-control" name="course3" id="Course Focus 3">
                                <option selected="selected"></option>
                                <?php
                                foreach ($courses as $course) {
                                    echo "<option>" . $course['courseName'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="Course Grade 3">Course Grade 3: (Optional)</label>
                            <input class="form-control" type="text" id="Course Grade 3" name="grade3"
                                   placeholder="Course Grade 3">
                        </div>
                    </div>
                </div>
                <br>
                <label for="Work Hours">Work Hours: </label>
                <input class="form-control" id="Work Hours" type="text" name="workHours" placeholder="Work Hours">
                <br>
                <label for="Short Answer">What makes you a good candidate for this position? </label>
                <textarea class="form-control" name="shortAnswer" id="Short Answer" required></textarea>
                <br>
                <label for="resumeURL">Attach Your Resume</label>
                <input type="file" class="form-control-file" name="resume" id="resumeURL" required>
                <br>
                <div class="p-2">
                    <button class="btn btn-danger btn-block" type="submit" name="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>