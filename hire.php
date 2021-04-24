<?php
require_once('dbhelper.php');
session_start();

$Tutors = getRows("SELECT * FROM Tutor");
if (isset($_POST['submit']) ) {
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['TutorEmail'];
    $gender = $_POST['Gender'];
    $grade = $_POST['Grade Year'];
    $UID = $_POST['UID'];
    $phone = $_POST['Phone'];
    $focus1 = $_POST['Course Focus 1'];
    $grade1 = $_POST['Course Grade 1'];
    $focus2 = $_POST['Course Focus 2'];
    $grade2 = $_POST['Course Grade 2'];
    $focus3 = $_POST['Course Focus 3'];
    $grade3 = $_POST['Course Grade 3'];
    $workhours = $_POST['Work Hours'];
    $short_answer = $_POST['Short Answer'];
    $resume = $_FILES['resume'];

    $resumeURL = uploadFile($resume,['file(resume)']);

    runQuery("INSERT INTO Tutor (FirstName, LastName, TutorEmail, Gender, Grade, UID, Phone, Course Focus 1, Course Grade 1, Course Focus 2, Course Grade 2, Course Focus 3, Course Grade 3, Work Hours, Short Answer, resumeURL)
        VALUES('$firstName', ' $lastName', '$email', '$gender', '$grade', '$UID', '$phone', '$focus1','$grade1', '$focus2','$grade2','$focus3','$grade3', '$workhours','$short_answer' ,'$resumeURL')");
    $success = Ture;

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
            <form>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="FirstName">First Name:</label>
                            <input class="form-control" type="text" id="First Name" placeholder="First Name" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="LastName">Last Name:</label>
                            <input class="form-control" type="text" id="Last Name" placeholder="Last Name" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="loginEmail">Email:</label>
                    <input class="form-control" type="email" id="Email"
                           aria-describedby="emailHelp" placeholder="Email Address" required>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="Gender">Gender:</label>
                            <select class="form-control" name="Gender" id="Gender" >
                                <option value=""> --select--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="Grade">Grade Year</label>
                            <select class="form-control" name="Grade" id="Grade" required>
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
                            <input class="form-control" type="Number" name="StudentID" id="UID"
                                   placeholder="StudentID" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="Phone">Phone Number: </label>
                            <input class="form-control" type="Number" id="Phone" name="Phone"
                                   placeholder="Phone Number" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="Course Focus 1">Course Focus 1: </label>
                            <input class="form-control" type="text" name="Course1" id="Course Focus 1"
                                   placeholder="Course Focus 1" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="Course Grade 1">Course Grade 1: </label>
                            <input class="form-control" type="text" name="Grade1" id="Course Grade 1"
                                   placeholder="Course Grade 1" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="Course Focus 2">Course Focus 2: (Optional) </label>
                            <input class="form-control" type="text" id="Course Focus 2" name="Course2"
                                   placeholder="Course Focus 2">
                        </div>
                        <div class="col-sm-6">
                            <label for="Course Grade 2">Course Grade 2: (Optional) </label>
                            <input class="form-control" type="text" id="Course Grade 2" name="Grade2"
                                   placeholder="Course Grade 2">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="Course Focus 3">Course Focus 3: (Optional) </label>
                            <input class="form-control" type="text" id="Course Focus 3" name="Course3"
                                   placeholder="Course Focus 3">
                        </div>
                        <div class="col-sm-6">
                            <label for="Course Grade 3">Course Grade 3: (Optional)</label>
                            <input class="form-control" type="text" id="Course Grade 3" name="Grade3"
                                   placeholder="Course Grade 3">
                        </div>
                    </div>
                </div>
                <br>
                <label for="Work Hours">Work Hours: </label>
                <input class="form-control" id="Work Hours" type="text" name="WorkHours" placeholder="Work Hours">
                <br>
                <label for="Short Answer">What makes you a good candidate for this position? </label>
                <textarea class="form-control" name="short-answer" id="Short Answer" required></textarea>
                <br>
                <label for="resumeURL" >Attach Your Resume</label>
                <input type="file" class="form-control-file" name="resume" id="resumeURL" required>
                <br>
                <div class="p-2">
                    <button class="btn btn-danger btn-block"type="submit" name="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>