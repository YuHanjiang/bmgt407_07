<?php
require_once('dbhelper.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$username = $_SESSION['username'];
$appointments = getRows("SELECT * FROM appointment where tutor = '$username' or student = '$username'");

if (isset($_POST['delete'])) {
    $toDelete = $_POST['delete'];
    runQuery("DELETE from appointment where id = '$toDelete'");

    header("Location: upcoming-app.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/page-dim.css">
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
    <title>Upcoming Sessions</title>
    <script src="assets/js/daypilot/daypilot-all.min.js"></script>

</head>

<body>

<?php require_once('nav-bar.php') ?>

<div class="container">
    <div class="p-3">
        <h4>Upcoming Sessions: </h4>
        <form action="upcoming-app.php" method="post">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Tutor</th>
                    <th scope="col">Student</th>
                    <th scope="col">Comments</th>
                    <th scope="col">File</th>
                    <?php
                    if ($_SESSION['accountType'] != 'student') {
                        echo '<th scope="col">Action</th>';
                    }
                    ?>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($appointments as $appointment) {
                    echo "<tr>";
                    echo "<td>" . $appointment['date'] . "</td>";
                    echo "<td>" . $appointment['time'] . "</td>";
                    echo "<td>" . $appointment['tutor'] . "</td>";
                    echo "<td>" . $appointment['student'] . "</td>";
                    echo "<td style=\"word-wrap: break-word;min-width: 100px;max-width: 100px;\">" .
                        $appointment['comments'] . "</td>";
                    echo "<td><a class='btn btn-danger btn-block' href=" . $appointment['fileURL'] . ">File" . "</a></td>";
                    if ($_SESSION['accountType'] != 'student') {
                        echo "<td><button class='btn btn-danger btn-block' 
                                    value=" . $appointment['id'] . " name='delete' 
                                    type='submit'>" . '<svg xmlns="http://www.w3.org/2000/svg" 
                                    width="16" height="16" fill="currentColor" class="bi bi-check" 
                                    viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 
                                    4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 
                                    3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>' . "</button>" . "</td>";
                    }
                    echo "</tr>";

                }
                ?>
                </tbody>
            </table>
        </form>
    </div>
</div>
</body>
</html>
