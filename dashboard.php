<?php
require_once('dbhelper.php');

session_start();

if ($_SESSION['accountType'] != 'tutor' and $_SESSION['accountType'] != 'director') {
    header("Location: index.php");
}

$all_average = getOneRow("SELECT COUNT(*) as 'average' FROM feedback WHERE rating = 'Average'");
$all_below_average = getOneRow("SELECT COUNT(*) as 'belowAverage' FROM feedback WHERE rating = 'Below Average'");
$all_above_average = getOneRow("SELECT COUNT(*) as 'aboveAverage' FROM feedback WHERE rating = 'Above average'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DashBoard</title>
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
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

<div class="row">
    <div class="col-8">
        <div class="p-3">
            <div class="text-center">
                <picture>
                    <img src="assets/img/logo.png" alt="ASTS Logo">
                </picture>
                <div class="p-2">
                    <div class="text-center">
                    </div>
                </div>
                <div>
                    <h3>Tutor Performance</h3>
                </div>
                <div id="container" style="width: 750px; height: 500px; margin: 0 auto"></div>
                <script>
                    $(document).ready(function () {
                        const title = {
                            text: 'Trending'
                        };
                        const xAxis = {
                            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5']
                        };
                        const labels = {
                            items: [{
                                html: 'Rating',
                                style: {
                                    left: '50px',
                                    top: '18px',
                                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                                }
                            }]
                        };
                        const series = [{
                            type: 'spline',
                            name: 'Tutoring Session',
                            data: [7, 10, 13, 9, 15]
                        }, {
                            type: 'spline',
                            name: 'Student Grade',
                            data: [60, 75, 90, 85, 95],
                            marker: {
                                lineWidth: 2,
                                lineColor: Highcharts.getOptions().colors[3],
                                fillColor: 'white'
                            }
                        }, {
                            type: 'pie',
                            name: 'Rating',
                            data: [{
                                name: 'Above Average',
                                y: <?php
                                    echo intval($all_above_average['aboveAverage']);
                                    ?>,
                                color: Highcharts.getOptions().colors[0]
                            },
                                {
                                    name: 'Average',
                                    y: <?php
                                    echo intval($all_average['average']);
                                    ?>,
                                    color: Highcharts.getOptions().colors[1]
                                },
                                {
                                    name: 'Below Average',
                                    y: <?php echo intval($all_below_average['belowAverage']) ?>,
                                    color: Highcharts.getOptions().colors[2]
                                }],
                            center: [100, 80],
                            size: 100,
                            showInLegend: false,
                            dataLabels: {
                                enabled: false
                            }
                        }
                        ];

                        const json = {};
                        json.title = title;
                        json.xAxis = xAxis;
                        json.labels = labels;
                        json.series = series;
                        $('#container').highcharts(json);
                    });
                </script>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="p-3">
            <div class="text-center">
                <h4>Tutor List</h4>
                <form action="dashboard.php" method="Post">     
            <table class="table">
                    <thead>
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Tutor Name</th>
                </tr>
                    </thead>
                <tbody>
                <?php
                $tutors = getRows("SELECT DISTINCT tutor FROM feedback");
                foreach ($tutors as $tutor) {
                    echo "<tr>";  
                    $tutorEmail = $tutor['tutor'];
                    $tutorInfo = getOneRow("SELECT firstName FROM users WHERE email = '$tutorEmail'");  
                    echo "<td>" . $tutorEmail . "</td>";
                    echo "<td>" . $tutorInfo['firstName'];                          
                    }
                    echo "</tr>";
                ?>

                </tbody>
            </table>
            <div>
        <td> <a class='btn btn-danger' href='feedback-form.php'>Feedback Form details </a> </td>

            </div>


        </div>
    </div>
</div>
</body>
</html>
