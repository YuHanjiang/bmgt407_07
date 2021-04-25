<?php
session_start();
if ($_SESSION['accountType'] != 'director' and $_SESSION['accountType'] != 'student') {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment Confirmation</title>
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
</head>
<body>

<?php require_once('nav-bar.php') ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="p-5">
            <div class="text-center">
                <picture>
                    <img src="assets/img/logo.png" alt="ASTS Logo">
                </picture>
                <div class="p-2">
                    <div class="text-center">
                        &nbsp;&nbsp;
                        <h5 style="color:red;">Appointment Scheduled!</h5>
                        &nbsp;&nbsp;
                        <p>Your appointment with the Academic Success and Tutorial Services has been scheduled! A
                            confirmation email has been sent to your email address containing the date and time of your
                            tutoring appointment. Thank you for using the ASTS and have a nice day.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
