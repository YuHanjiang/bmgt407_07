<?php
require_once('dbhelper.php');
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    if ($_POST['password'] != $_POST['repeatPassword']) {
        echo '<script>alert("Please enter the same password twice")</script>';
    }
    $email = $_POST['email'];

    if (preg_match("/umd.edu$/", $email)) {
        $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];

        $checkQuery = "SELECT email from users where email = '$email'";
        if (getOneRow($checkQuery)) {
            echo '<script>alert("User Exists!")</script>';
        } else {
            runQuery("INSERT INTO users VALUES ('$email', '$pwd', '$firstName', '$lastName', 2);");
            header("Location: login.php");
        }
    } else {
        echo '<script>alert("Please enter a University of Maryland affiliated email")</script>';
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
    <title>Register</title>
    <script
            src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"
    ></script>
    <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRÒVvoxMfooAo"
            crossorigin="anonymous"
    ></script>
    <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"
    ></script>
</head>
<body>

<?php require_once('nav-bar.php') ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="p-5">
            <picture>
                <img src="assets/img/logo.png" alt="ASTS Logo">
            </picture>

            <div class="p-2">
                <div class="text-center">
                    <h4>User Registration</h4>
                </div>
            </div>

            <form action="register.php" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="firstName">First Name:</label>
                            <input class="form-control" type="text" name="firstName" id="firstName"
                                   placeholder="First Name" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastName">Last Name:</label>
                            <input class="form-control" type="text" name="lastName" id="lastName"
                                   placeholder="Last Name" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" id="email" name="email"
                           aria-describedby="emailHelp" placeholder="Email Address" required>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="password">Password:</label>
                            <input class="form-control" type="password" id="password" name="password"
                                   placeholder="Password" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="repeatPassword">Repeat Password:</label>
                            <input class="form-control" type="password" id="repeatPassword" name="repeatPassword"
                                   placeholder="Repeat password" required>
                        </div>
                    </div>

                </div>
                <!--insert register information to student information-->
                <div class="p-2">
                    <button class="btn btn-danger btn-block" type="submit" name="submit">Register</button>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>