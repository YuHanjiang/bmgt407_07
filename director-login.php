<?php
require_once('dbhelper.php');
session_start();

if (isset($_SESSION['username'])) {
    header('Location: index.php');
}

if (isset($_SESSION['submit'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $query = "SELECT email, password FROM users WHERE username = '{$username}' and accountType = 0";
    $record = getOneRow($query);

    if ($record['email'] == $email and password_verify($pwd, $record['password'])) {
        $_SESSION['username'] = $email;

        header('Location: index.php');
    } else {
        $errorMessage = "Invalid input";
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

    <title>Director Login</title>
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
<nav class="navbar navbar-expand-sm bg-danger navbar-dark">
    <ul class="navbar-nav">
        <a class="navbar-brand">
            <img src="assets/img/logo.png" alt="Logo" style="height:30px;">
        </a>
        <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="login-dropdown" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                Login
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="student-login.html">Student Login</a>
                <a class="dropdown-item" href="tutor-login.html">Tutor Login</a>
                <a class="dropdown-item active" href="director-login.html">Director Login</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="public-hire.html">Become a Tutor</a>
        </li>
    </ul>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="p-5">
            <picture>
                <img src="assets/img/logo.png" alt="ASTS Logo">
            </picture>
            <div class="p-2">
                <div class="text-center">
                    <h4>Director Login</h4>
                </div>
            </div>

            <form action="director-login.php" method="post">
                <div class="form-group">
                    <label for="loginEmail">Email:</label>
                    <input class="form-control" type="email" id="loginEmail"
                           aria-describedby="emailHelp" placeholder="Email Address">
                </div>

                <div class="form-group">
                    <label for="loginPassword">Password:</label>
                    <input class="form-control" type="password" id="loginPassword"
                           placeholder="Password">
                </div>

                <div class="p-2">
                    <button class="btn btn-danger btn-block" type="submit">Login</button>
                </div>
            </form>
            <div class="p-3">
                <div class="text-center">
                    <a class="small" href="forgot_password.php">Forgot Password</a>
                </div>
                <div class="text-center">
                    <a class="small" href="register.php">Create an Account</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
