<?php
require_once('dbhelper.php');

session_start();

if ($_SESSION['accountType'] != 'tutor' and $_SESSION['accountType'] != 'director') {
    header("Location: index.php");
}
if ($_SESSION['accountType'] == 'tutor') {
    $currentEmail = $_SESSION['username'];
    $tutors = getRows("SELECT DISTINCT tutor from feedback where tutor = '$currentEmail'");
    $tutorShow = $currentEmail;
} else {
    $tutors = getRows("SELECT DISTINCT tutor FROM feedback");
    $tutorShow = 'all';
}
$all_average = getOneRow("SELECT COUNT(*) as 'average' FROM feedback WHERE rating = 'Average'");
$all_below_average = getOneRow("SELECT COUNT(*) as 'belowAverage' FROM feedback WHERE rating = 'Below Average'");
$all_above_average = getOneRow("SELECT COUNT(*) as 'aboveAverage' FROM feedback WHERE rating = 'Above average'");

if (isset($_POST['submit'])) {
    $tutorShow = $_POST['tutorSelect'];
    if ($tutorShow != 'all') {
        $all_average = getOneRow("SELECT COUNT(*) as 'average' FROM feedback WHERE rating = 'Average' and 
                                                                                  tutor = '$tutorShow'");
        $all_below_average = getOneRow("SELECT COUNT(*) as 'belowAverage' FROM feedback 
                                        WHERE rating = 'Below Average' and tutor = '$tutorShow'");
        $all_above_average = getOneRow("SELECT COUNT(*) as 'aboveAverage' FROM feedback 
                                            WHERE rating = 'Above average' and tutor = '$tutorShow'");
    } else {
        $all_average = getOneRow("SELECT COUNT(*) as 'average' FROM feedback WHERE rating = 'Average'");
        $all_below_average = getOneRow("SELECT COUNT(*) as 'belowAverage' FROM feedback WHERE rating = 'Below Average'");
        $all_above_average = getOneRow("SELECT COUNT(*) as 'aboveAverage' FROM feedback WHERE rating = 'Above average'");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Feedback Form</title>
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
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
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
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="p-5">
                            <div class="text-center">
                                <div class="text-center">
                                    <h3>Feedback Form</h3>
                                    <form action="feedback-form.php" method="post">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th scope="col">Email</th>
                                                <th scope="col">First Name</th>
                                                <th scope="col">Above Average</th>
                                                <th scope="col">Average</th>
                                                <th scope="col">Below Average</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($tutors as $tutor) {
                                                echo "<tr>";
                                                $tutorEmail = $tutor['tutor'];
                                                $tutorInfo = getOneRow("SELECT firstName FROM users 
                                                                                WHERE email = '$tutorEmail'");
                                                echo "<td>" . $tutorEmail . "</td>";
                                                echo "<td>" . $tutorInfo['firstName'];
                                                $average = getOneRow("SELECT COUNT(*) as 'average' FROM feedback 
                                                                            WHERE rating = 'Average' and 
                                                                                  tutor = '$tutorEmail'");
                                                $below_average = getOneRow("SELECT COUNT(*) as 'belowAverage'
                                                                                    FROM feedback 
                                                                                    WHERE rating = 'Below Average' and
                                                                                    tutor = '$tutorEmail'");
                                                $above_average = getOneRow("SELECT COUNT(*) as 'aboveAverage' 
                                                                                    FROM feedback 
                                                                                    WHERE rating = 'Above average' and
                                                                                    tutor = '$tutorEmail'");
                                                echo "<td>" . $above_average['aboveAverage'] . "</td>";
                                                echo "<td>" . $average['average'] . "</td>";
                                                echo "<td>" . $below_average['belowAverage'] . "</td>";

                                            }
                                            echo "</tr>";
                                            ?>

                                            </tbody>
                                        </table>
                                </div>
                            </div>
                            <div class="p-2">
                                <a href="dashboard.php" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="feedback-form.php" method="post">
                    <div class="form-group">
                        <label for="tutorSelect">Select a Tutor: </label>
                        <select id="tutorSelect" class="form-control-sm" name="tutorSelect">
                            <?php
                            if ($_SESSION['accountType'] == 'director' or $_SESSION['accountType'] == 'tutor') {
                                echo "<option value='all'";
                                if ($tutorShow == 'all') {
                                    echo "selected='selected'>";
                                } else {
                                    echo ">";
                                }
                                echo "Show All";
                                echo "</option>";
                            }
                            foreach ($tutors as $tutor) {
                                $tutorEmail = $tutor['tutor'];
                                $tutorInfo = getOneRow("SELECT firstName, lastName FROM users 
                                                                                WHERE email = '$tutorEmail'");
                                $tutorName = $tutorInfo['firstName'] . " " . $tutorInfo['lastName'];
                                echo "<option value=" . $tutorEmail . " ";
                                if ($tutorShow == $tutorEmail) {
                                    echo "selected='selected'";
                                }
                                echo ">" . $tutorName . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" name="submit">Select</button>
                    </div>
                </form>
                <div id="container" style="width: 550px; height: 400px; margin: 0 auto"></div>
                <script>
                    $(document).ready(function () {
                        const chart = {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false
                        };
                        const title = {
                            text: "Visualization of Students' Rating for Tutors"
                        };
                        const tooltip = {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        };
                        const plotOptions = {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}%</b>: {point.percentage:.1f} %',
                                    style: {
                                        color: 'black'
                                    }
                                }
                            }
                        };
                        const series = [{
                            type: 'pie',
                            name: 'Browser share',
                            data: [
                                ['Above Average', <?php
                                    echo intval($all_above_average['aboveAverage']);
                                    ?>
                                ],
                                {
                                    name: 'Average',
                                    y: <?php
                                    echo intval($all_average['average']);
                                    ?>,
                                    sliced: true,
                                    selected: true
                                },
                                ['Below Average', <?php echo intval($all_below_average['belowAverage']) ?>],

                            ]
                        }];

                        const json = {};
                        json.chart = chart;
                        json.title = title;
                        json.tooltip = tooltip;
                        json.series = series;
                        json.plotOptions = plotOptions;
                        $('#container').highcharts(json);

                    });
                </script>
            </div>
        </div>
    </div>
</div>

</body>
</html>