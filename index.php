<?php
    session_start();
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

    <title>Homepage</title>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="assets/css/homepage-style.css">
</head>

<body>

<?php
    require_once('nav-bar.php')
?>

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
                        <h5 style="color:red;">Welcome to AAP's Academic Success & Tutorial Services (ASTS) Online
                            Scheduling System!</h5>
                        &nbsp;&nbsp;
                        <p>Struggling in a course? The Academic Success and Tutorial Services (ASTS) offers free online
                            tutoring in the following courses:</p>

                        <div id="grad1" style="text-align:center;margin:auto;color:white;font-size:15px;">
                            <p style="font-family:courier,serif;"><b>
                                &nbsp;&nbsp; <br>
                                BMGT220 | BGMT221 | BMGT230 <br>
                                &nbsp;&nbsp; <br>
                                BMGT340 | BSCI170 | CHEM131 <br>
                                &nbsp;&nbsp; <br>
                                CHEM135 | CHEM231 | CHEM241 <br>
                                &nbsp;&nbsp; <br>
                                CHEM271 | CMSC131 | ECON200 <br>
                                &nbsp;&nbsp; <br>
                                ECON201 | MATH120 | MATH140 <br>
                                &nbsp;&nbsp; <br>
                                MATH141 | PHIL170 | STAT400 <br>
                                &nbsp;&nbsp;<br> </b></p>
                        </div>
                        &nbsp;&nbsp
                        <p>For questions, contact us at <u>aaptutoring@umd.edu</u></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
