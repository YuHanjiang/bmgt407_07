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

<nav class="navbar navbar-expand-sm bg-danger navbar-dark">
    <ul class="navbar-nav">
        <a class="navbar-brand">
            <img src="assets/img/logo.png" alt="Logo" style="height:30px;">
        </a>
        <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="login-dropdown" data-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false">
                Login
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="student-login.html">Student Login</a>
                <a class="dropdown-item" href="tutor-login.html">Tutor Login</a>
                <a class="dropdown-item" href="director-login.html">Director Login</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="public-hire.html">Become a Tutor</a>
        </li>
    </ul>
</nav>

<div class="container" style="margin-top: 50px">
    <div class="form-container" style="width:600px">
        <h2>Feedback</h2>
        <p>
            Please provide your feedback below:
        </p>
        <form role="form" method="post" id="reused_form">
            <div class="row">
                <div class="col-sm-12 form-group">
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
                <div class="col-sm-12 form-group">
                    <label>Did grades on homeworks, assignments, or exams improve after your tutoring session?</label>
                    <p>
                        <label class="radio-inline">
                            <input type="radio" name="experience" id="grades-yes" value="Below Average">
                            Yes
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="experience" id="grades-no" value="Average">
                            No
                        </label>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="comments">
                        Comments:</label>
                    <textarea class="form-control" name="comments" id="comments"
                              placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                </div>
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
                    <input type="text" class="form-control" id="tutor-name" name="Tutor Name" required>
                </div>

                <div class="col-sm-6 form-group">
                    <label for="course">
                        Course:</label>
                    <input type="text" class="form-control" id="course" name="Course" required>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-danger btn-block" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>