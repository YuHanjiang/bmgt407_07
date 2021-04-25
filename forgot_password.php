<?php
session_start();
require_once('dbhelper.php');
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
if (isset($_POST['emailVer'])) {
    $email = $_POST['loginEmail'];
    if (getOneRow("SELECT * FROM users where email = '$email'")) {
        $_SESSION['emailVerInt'] = rand(1000, 9999);
        $_SESSION['resetEmail'] = $email;
        echo "Your Temporary Password is: " . $_SESSION['emailVerInt'];
    } else {
        echo "<script>alert('Did not find this account.')</script>";
    }
}

if (isset($_POST['submit']) and isset($_SESSION['emailVerInt']) and isset($_SESSION['resetEmail'])) {
    if ($_POST['tempPassword'] == $_SESSION['emailVerInt']) {
        if ($_POST['newPassword'] == $_POST['checkPassword']) {
            $pwd = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
            $email = $_SESSION['resetEmail'];
            runQuery("UPDATE users SET password = '$pwd' WHERE email = '$email'");
        }
    } else {
        echo "<script>alert('Please enter the correct temporary password.')</script>";
    }
    unset($_SESSION['emailVerInt']);
    unset($_SESSION['resetEmail']);
    header("Location: forgot_password.php");
} else if (isset($_POST['submit'])) {
    echo "<script>alert('Please get a temporary password first')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
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

<div class="container" style="margin-top: 50px;width:600px">
    <form action="forgot_password.php" method="POST">
        <div style="text-align: center;">
            <h2>Password Assistance</h2>
        </div>
        <div class="form-group">
            <label for="loginEmail">Email: Enter the email address associated with your account.</label>
            <input class="form-control" type="email" id="loginEmail" name="loginEmail"
                   aria-describedby="emailHelp" placeholder="Email Address">
        </div>
        <div class="form-group">
            <button class="btn btn-danger btn-block" type="submit" name="emailVer">Send verification to email</button>
        </div>
    </form>

    <form action="forgot_password.php" method="POST">
        <div class="form-group">
            <label for="TemporaryPassword">Temporary Password:</label>
            <input type="password" class="form-control" id="TemporaryPassword"
                   name="tempPassword" required>
        </div>
        <div class="form-group">
            <label for="NewPassword">
                New Password:</label>
            <input type="password" class="form-control" id="NewPassword" name="newPassword" required>
        </div>
        <div class="form-group">
            <label for="Confirm New Password">
                Confirm New Password:</label>
            <input type="password" class="form-control" id="Confirm New Password"
                   name="checkPassword" required>
        </div>
        <div class="p-2">
            <button class="btn btn-danger btn-block" type="submit" name="submit">Submit</button>
        </div>
    </form>
</div>
</body>
</html>
