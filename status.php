<?php
session_start();
require_once('dbhelper.php');
$Tutors = getRows("select * From Tutor");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <title>Application Status</title>
</head>
<body>

<?php require_once('nav-bar.php') 
?>

<!--only view by tutor director-->
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="p-5">
            <div class="text-center">
                <picture>
                    <img src="assets/img/logo.png" alt="ASTS Logo">
                </picture>
                <div class="p-2">
                    <div class="text-center">
                        <h3>Application Status Form</h3>
                    </div>
                    <!--Pullled information from tutor information DB-->
                    <?php 
                    //Check if there are uploads in the DB 
                    if($Tutors) {

                    ?>
                    <table>
                        <tr>
                            <th>TutorName</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Grade Year</th>
                            <th>UID</th>
                            <th>Phone Number</th>
                            <th>Apply Date</th>
                            <th>Course Focus 1</th>
                            <th>Course Grade 1</th>
                            <th>Course Focus 2</th>
                            <th>Course Grade 2</th>
                            <th>Application Status</th>
                        </tr>
                        <?php
                        //Begin loop through uploads
                        foreach ($Tutors as $Tutor) {
                            echo "<tr>";
                            echo "<td>" . $Tutor['TutorName'] . "</td>";
                            echo "<td>" . $Tutor['Email'] . "</td>";
                            echo "<td>" . $Tutor['Gender'] . "</td>";
                            echo "<td>" . $Tutor['Grade Year'] . "</td>";
                            echo "<td>" . $Tutor['UID'] . "</td>";
                            echo "<td>" . $Tutor['Phone Number'] . "</td>";
                            echo "<td>" . $Tutor['Apply Date'] . "</td>";
                            echo "<td>" . $Tutor['Course Focus 1'] . "</td>";
                            echo "<td>" . $Tutor['Course Grade 1'] . "</td>";
                            echo "<td>" . $Tutor['Course Focus 2'] . "</td>";
                            echo "<td>" . $Tutor['Course Grade 2'] . "</td>";
                            echo "<td>" . $Tutor['Application Status'] . "</td>";

                            echo "</tr>";
                        }

                        ?>
                    </table>
                    <?php
                    } else {
                        echo "<p>No tutors found.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

