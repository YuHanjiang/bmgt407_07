<?php
require_once('dbhelper.php');

session_start();

$username = $_SESSION['username'];
$average = getOneRow("SELECT COUNT(*) FROM feedback WHERE rating = "Average"
")
$below_average = getOneRow("SELECT COUNT(*) FROM feedback WHERE rating = "Below Average"
")
$above_average = getOneRow("SELECT COUNT(*) FROM feedback WHERE rating = "Above average"
")
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
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">UID</th>
                                                <th scope="col">First Name</th>
                                                <th scope="col">Above Average</th>
                                                <th scope="col">Average</th>
                                                <th scope="col">Below Average</th>
                                            </tr>    
                                            </thead>
                                        <tbody>
                                        <?php
                                        foreach ($Rating as $Rating) {
                                            echo "<tr>";                              
                                            echo "<td>" . $Rating['UID'] . "</td>";
                                            echo "<td>" . $Rating['FirstName'];
                                            echo "<td>" . $Rating['Above Average'] . "</td>";
                                            echo "<td>" . $average['rating'] . "</td>";
                                            echo "<td>" . $Rating['Below Average'] . "</td>";

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

                <div id="container" style="width: 550px; height: 400px; margin: 0 auto"></div>
                <script>
                    $(document).ready(function () {
                        const chart = {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false
                        };
                        const title = {
                            text: "Visualization of Students' Ratting for Tutor"
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
                                ['Above Average', 
                                19 ],
                                {
                                    name: 'Average',
                                    y: 23,
                                    sliced: true,
                                    selected: true
                                },
                                ['Below Average', 17],

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