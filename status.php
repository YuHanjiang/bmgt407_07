<?php
session_start();
require_once('dbhelper.php');

if ($_SESSION['accountType'] != 'director') {
    header("Location: index.php");
}

$Tutors = getRows("select * From users where accountType = 1");

if (isset($_POST['fire'])) {
    $fireEmail = $_POST['fire'];
    runQuery("DELETE from feedback where tutor = '$fireEmail'");
    runQuery("UPDATE course set tutor = null where tutor = '$fireEmail'");
    runQuery("UPDATE users set accountType = 2 where email = '$fireEmail'");
    runQuery("DELETE from appointment where tutor = '$fireEmail'");
    header("Location: status.php");
}
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
                        <h3>Tutor Information</h3>
                    </div>
                    <form action="status.php" method="post">
                        <table>
                            <tr>
                                <th>Tutor First Name</th>
                                <th>Tutor Last Name</th>
                                <th>Tutor Email</th>
                                <th>Course</th>
                                <th>Fire</th>
                            </tr>
                            <?php
                            //Begin loop through uploads
                            foreach ($Tutors as $Tutor) {
                                echo "<tr>";
                                echo "<td>" . $Tutor['firstName'] . "</td>";
                                echo "<td>" . $Tutor['lastName'] . "</td>";
                                echo "<td>" . $Tutor['email'] . "</td>";
                                $courseName = 'Not Assigned';
                                $tutorEmail = $Tutor['email'];
                                $courseInfo = getOneRow("Select courseName from course where tutor = '$tutorEmail'");
                                if ($courseInfo)
                                    $courseName = $courseInfo['courseName'];
                                echo "<td>" . $courseName . "</td>";
                                echo "<td><button class='btn btn-danger btn-block' 
                                    value=" . $Tutor['email'] . " name='fire' 
                                    type='submit'>" . 'Fire' . "</button>" . "</td>";
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

