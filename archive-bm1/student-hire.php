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
</head>
<body>

<nav class="navbar navbar-expand-sm bg-danger navbar-dark">
    <ul class="navbar-nav">
        <a class="navbar-brand">
            <img src="assets/img/logo.png" alt="Logo" style="height:30px;">
        </a>
        <li class="nav-item">
            <a class="nav-link" href="student-homepage.html">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="student-schedule.html">Schedule</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="student-hire.html">Become a Tutor</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">Sign Out</a>
        </li>
    </ul>
</nav>

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
                            <label for="firstName">First Name:</label>
                            <input class="form-control" type="text" id="firstName" placeholder="First Name">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastName">Last Name:</label>
                            <input class="form-control" type="text" id="lastName" placeholder="Last Name">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="loginEmail">Email:</label>
                    <input class="form-control" type="email" id="loginEmail"
                           aria-describedby="emailHelp" placeholder="Email Address">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="gender">Gender:</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value=""> --select--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="grade">Grade Year</label>
                            <select class="form-control" name="Grade" id="grade">
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
                            <label for="studentID">Student ID: </label>
                            <input class="form-control" type="Number" name="StudentID" id="studentID"
                                   placeholder="StudentID">
                        </div>
                        <div class="col-sm-6">
                            <label for="phone">Phone Number: </label>
                            <input class="form-control" type="Number" id="phone" name="Phone"
                                   placeholder="Phone Number">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="focus1">Course Focus 1: </label>
                            <input class="form-control" type="text" name="Course1" id="focus1"
                                   placeholder="Course Focus 1">
                        </div>
                        <div class="col-sm-6">
                            <label for="grade-1">Course Grade 1: </label>
                            <input class="form-control" type="text" name="Grade1" id="grade-1"
                                   placeholder="Course Grade 1">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="focus2">Course Focus 2: (Optional) </label>
                            <input class="form-control" type="text" id="focus2" name="Course2"
                                   placeholder="Course Focus 2">
                        </div>
                        <div class="col-sm-6">
                            <label for="grade2">Course Grade 2: (Optional) </label>
                            <input class="form-control" type="text" id="grade2" name="Grade2"
                                   placeholder="Course Grade 2">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="focus3">Course Focus 3: (Optional) </label>
                            <input class="form-control" type="text" id="focus3" name="Course3"
                                   placeholder="Course Focus 3">
                        </div>
                        <div class="col-sm-6">
                            <label for="grade3">Course Grade 3: (Optional)</label>
                            <input class="form-control" type="text" id="grade3" name="Grade3"
                                   placeholder="Course Grade 3">
                        </div>
                    </div>
                </div>
                <br>
                <label for="work-hours">Work Hours: </label>
                <input class="form-control" id="work-hours" type="text" name="WorkHours" placeholder="Work Hours">
                <br>
                <label for="short-answer">What makes you a good candidate for this position? </label>
                <textarea class="form-control" name="Short_answer" id="short-answer"></textarea>
                <br>
                <label for="exampleFormControlFile1">Attach Your Resume</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                <br>
                <div class="p-2">
                    <a href="public-hire-confirmation.html" class="btn btn-danger btn-block" type="submit">Register</a>
                </div>

            </form>
            <!-- This page will go into tutor information table in the DB -->
        </div>
    </div>
</div>

</body>
</html>