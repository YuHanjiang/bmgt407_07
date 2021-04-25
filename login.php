<?php
require_once('dbhelper.php');
session_start();

if (isset($_SESSION['username'])) {
    header('Location: index.php');
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $type = -1;
    if ($_POST['type'] == "Student") {
        $type = 2;
    } else if ($_POST['type'] == 'Tutor') {
        $type = 1;
    } else if ($_POST['type'] == 'Director') {
        $type = 0;
    }

    $query = "SELECT email, password FROM users WHERE email = '{$email}' and accountType = '$type'";
    $record = getOneRow($query);

    if (isset($record) and $record['email'] == $email and password_verify($pwd, $record['password'])) {
        $_SESSION['username'] = $email;
        $_SESSION['courseName'] = 'UNDEFINED';
        if ($type == 0) {
            $_SESSION['accountType'] = 'director';
        } else if ($type == 1) {
            $_SESSION['accountType'] = 'tutor';
        } else {
            $_SESSION['accountType'] = 'student';
        }

        header('Location: index.php');
    } else {
        echo '<script>alert("Wrong email or password, please try again.")</script>';
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

    <title>Login</title>
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
                    <h4>Login</h4>
                </div>
            </div>

            <form action="login.php" method="POST">
                <fieldset>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" id="email" name="email"
                               aria-describedby="emailHelp" placeholder="Email Address" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input class="form-control" type="password" name="password" id="password"
                               placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Account Type:</label>
                        <select class="form-control" id="type" name="type" required>
                            <option>Student</option>
                            <option>Tutor</option>
                            <option>Director</option>
                        </select>
                    </div>

                    <div class="p-2">
                        <button class="btn btn-danger btn-block" type="submit" name="submit" id="submit">Login</button>
                    </div>
                </fieldset>
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
