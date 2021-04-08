<?php
session_start();
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
    <form>
        <div style="text-align: center;">
            <h2>Password Assistance</h2>
        </div>
        <div class="form-group">
            <label for="loginEmail">Email: Enter the email address associated with your account.</label>
            <input class="form-control" type="email" id="loginEmail"
                   aria-describedby="emailHelp" placeholder="Email Address">
        </div>
        <div class="form-group">
            <button class="btn btn-danger btn-block" type="submit">Send verification to email</button>
        </div>

        <div class="form-group">
            <label for="TemporaryPassword">Temporary Password:</label>
            <input type="password" class="form-control" id="TemporaryPassword"
                   name="Temporary Password" required>
        </div>
        <div class="form-group">
            <label for="NewPassword">
                New Password:</label>
            <input type="password" class="form-control" id="NewPassword" name="New Password" required>
        </div>
        <div class="form-group">
            <label for="Confirm New Password">
                Confirm New Password:</label>
            <input type="password" class="form-control" id="Confirm New Password"
                   name="Confirm New Password"
                   required>
        </div>
        <div class="p-2">
            <a href="index.html" class="btn btn-danger btn-block" type="submit">Submit</a>
        </div>
    </form>
</div>
</body>
</html>
