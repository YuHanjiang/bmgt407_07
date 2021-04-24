<?php
session_start();
require_once('dbhelper.php');

if ($_SESSION['accountType'] != 'director') {
    header("Location: index.php");
}

$Tutors = getRows("select * From Tutor");

if (isset($_POST['accept'])) {
    $id = $_POST['accept'];
    $tutor = getOneRow("SELECT firstName, lastName, TutorEmail, ApplicationStatus from Tutor where UID = '$id'");
    $status = $tutor['ApplicationStatus'];
    if ($status != 'Accept' and $status != 'Reject') {
        runQuery("UPDATE Tutor SET ApplicationStatus = 'Accept' WHERE UID = '$id'");
        $email = $tutor['TutorEmail'];
        $firstName = $tutor['firstName'];
        $lastName = $tutor['lastName'];
        $course = $_POST['course'];
        $pwd = password_hash($email, PASSWORD_DEFAULT);

        if (getOneRow("SELECT * from users where email = '$email'")) {
            runQuery("UPDATE users SET accountType = 1 WHERE email = '$email'");
        } else {
            runQuery("INSERT INTO users (email, password, firstName, lastName, accountType) 
                    VALUES ('$email', '$pwd', '$firstName', '$lastName', 1)");
        }
        runQuery("UPDATE course SET tutor = '$email' WHERE courseName = '$course'");
        header("Location: app-decision.php");
    } else {
        echo "<script>alert('Decision has been made!')</script>";
    }
} else if (isset($_POST['reject'])) {
    $id = $_POST['reject'];
    $tutor = getOneRow("SELECT firstName, lastName, TutorEmail, ApplicationStatus from Tutor where UID = '$id'");
    $status = $tutor['ApplicationStatus'];
    if ($status != 'Accept' and $status != 'Reject') {
        runQuery("UPDATE Tutor SET ApplicationStatus = 'Reject' WHERE UID = '$id'");
        header("Location: app-decision.php");
    } else {
        echo "<script>alert('Decision has been made!')</script>";
    }
} else if (isset($_POST['hold'])) {
    $id = $_POST['hold'];
    $tutor = getOneRow("SELECT firstName, lastName, TutorEmail, ApplicationStatus from Tutor where UID = '$id'");
    $status = $tutor['ApplicationStatus'];
    if ($status == 'In Process') {
        runQuery("UPDATE Tutor SET ApplicationStatus = 'On Hold' WHERE UID = '$id'");
        header("Location: app-decision.php");
    } else {
        echo "<script>alert('Decision has been made!')</script>";
    }
} else if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    runQuery("DELETE FROM Tutor WHERE UID = '$id'");
    header("Location: app-decision.php");
}
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
                    <form action="app-decision.php" method="POST">
                        <table>
                            <tr>
                                <th>First Name</th>
                                <td>Last Name</td>
                                <td>Gender</td>
                                <td>Course</td>
                                <td>Email</td>
                                <td>Phone Number</td>
                                <td>Status</td>
                                <td>Resume File</td>
                                <td>Accept</td>
                                <td>Reject</td>
                                <td>Hold</td>
                                <td>Delete</td>
                            </tr>
                            <?php
                            //Begin loop through uploads
                            foreach ($Tutors as $Tutor) {
                                echo "<tr>";
                                echo "<td>" . $Tutor['FirstName'] . "</td>";
                                echo "<td>" . $Tutor['LastName'] . "</td>";
                                echo "<td>" . $Tutor['Gender'] . "</td>";
                                echo "<td><select class='form-control' name='course' style='width: 120px'>";
                                echo "<option>" . $Tutor['Course1'] . "</option>";
                                if ($Tutor['Course2']) {
                                    echo "<option>" . $Tutor['Course2'] . "</option>";
                                }
                                if ($Tutor['Course3']) {
                                    echo "<option>" . $Tutor['Course3'] . "</option>";
                                }
                                echo "</select></td>";
                                echo "<td>" . $Tutor['TutorEmail'] . "</td>";
                                echo "<td>" . $Tutor['Phone'] . "</td>";
                                echo "<td>" . $Tutor['ApplicationStatus'] . "</td>";
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
                                echo "<td><button class='btn btn-danger btn-block' 
                                    value=" . $Tutor['UID'] . " name='delete' 
                                    type='submit'>" . 'Delete' . "</button>" . "</td>";
                                echo "</tr>";
                            }

                            ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
