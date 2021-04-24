<?php
session_start();
require_once('dbhelper.php');
require_once('filehelper.php');

$Tutors = getRows("select * From Tutor");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submitted Applications</title>
    <link rel="stylesheet" type="text/css" href="assets/css/table-style.css">
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
                </div>

                <div class="text-center">
                    <h3>Submitted Applications Form</h3>
                    <div class="text-left">
                    </div>
                    <table>
                        <tr>
                            <th>First Name</th>
                            <td>Last Name</td>
                            <td>Gender</td>
                            <td>Desired Course to Tutor</td>
                            <td>Email</td>
                            <td>Phone Number</td>
                            <td>Resume File</td>
                            <td> Accept</td>
                            <td> Reject</td>
                            <td> Hold</td>
                        </tr>

                        <?php
                        //Begin loop through uploads
                        foreach ($Tutors as $Tutor) {
                            echo "<tr>";
                            echo "<td>" . $Tutor['FirstName'] . "</td>";
                            echo "<td>" . $Tutor['LastName'] . "</td>";
                            echo "<td>" . $Tutor['Gender'] . "</td>";
                            echo "<td>" . $Tutor['Course1'] . " " . $Tutor['Course2'] . $Tutor['Course3'] . "</td>";
                            echo "<td>" . $Tutor['TutorEmail'] . "</td>";
                            echo "<td>" . $Tutor['Phone'] . "</td>";
                            echo "<td><a class='btn btn-danger btn-block' href=" . $Tutor['resumeURL'] . ">Resume" . "</a></td>";
                            echo "<td><button class='btn btn-danger btn-block' 
                                    value=" . $Tutor['UID'] . " name='accept' 
                                    type='submit'>" . 'Accept' . "</button>" . "</td>";
                            echo "<td><button class='btn btn-danger btn-block' 
                                    value=" . $Tutor['UID'] . " name='reject' 
                                    type='submit'>" . 'Reject' . "</button>" . "</td>";

                            echo "<td><button class='btn btn-danger btn-block' 
                                    value=" . $Tutor['UID'] . " name='hold' 
                                    type='submit'>" . 'Hold' . "</button>" . "</td>";
                            echo "</tr>";
                        }

                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
