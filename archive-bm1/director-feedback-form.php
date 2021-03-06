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
    <link rel="stylesheet" type="text/css" href="assets/css/table-style.css">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-danger navbar-dark">
    <ul class="navbar-nav">
        <a class="navbar-brand">
            <img src="assets/img/logo.png" alt="Logo" style="height:30px;">
        </a>
        <li class="nav-item">
            <a class="nav-link" href="director-homepage.html">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="director-schedule.html">Schedule</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="director-calendar.html">Calendar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="director-dashboard.html">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="director-status.html">Application Status</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="director-app-decision.html">Submitted Applications</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">Sign Out</a>
        </li>
    </ul>
</nav>

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
                                    <div class="text-left text-bold">
                                    </div>
                                    <div class="text-left">
                                        <label>Tutor Name: Tutor 01</label>
                                    </div>

                                    <div class="text-left">
                                        <label>Session Number: 01</label>
                                    </div>
                                    <table>
                                        <tr>
                                            <th></th>
                                            <th>Above Average</th>
                                            <th>Average</th>
                                            <th>Below Average</th>
                                        </tr>
                                        <tr>
                                            <th>Count</th>
                                            <td>19</td>
                                            <td>23</td>
                                            <td>13</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="p-2">
                                <a href="director-dashboard.html" class="btn btn-danger">Back</a>
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
                            text: "Visualization of Students' Ratting for Tutor 01"
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
                                ['Above Average', 13],
                                {
                                    name: 'Average',
                                    y: 23,
                                    sliced: true,
                                    selected: true
                                },
                                ['Below Average', 19],

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