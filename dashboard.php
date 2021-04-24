<?php
require_once('dbhelper.php');
session_start();

$username = $_SESSION['username'];
$Tutor = getRows("SELECT * FROM Tutor");
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
                            name: 'Ratting',
                            data: [{
                                name: 'Above Average',
                                y: 13,
                                color: Highcharts.getOptions().colors[0]
                            },
                                {
                                    name: 'Average',
                                    y: 23,
                                    color: Highcharts.getOptions().colors[1]
                                },
                                {
                                    name: 'Below Average',
                                    y: 19,
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
                <h4>View Feedback Forms</h4>
                <form action="dashboard.php" method="Post">     
            <table class="table">
                    <thead>
                <tr>
                    <th scope="col">UID</th>
                    <th scope="col">Tutor Name</th>
                    <th scope="col">Link</th>
                </tr>
                    </thead>
                <tbody>
                <?php
                foreach ($Tutor as $Tutor) {
                    echo "<tr>";                              
                    echo "<td>" . $Tutor['UID'] . "</td>";
                    echo "<td>" . $Tutor['FirstName'] ."</td>";
                    echo "<td>" . "<a class='btn btn-danger' href='feedback-form.php'>Feedback Form </a>" ."</td>";

                    }
                    echo "</tr>";
                ?>

                </tbody>
            </table>


        </div>
    </div>
</div>
</body>
</html>
