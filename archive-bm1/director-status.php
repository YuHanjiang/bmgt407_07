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
            <a class="nav-link" href="director-dashboard.html">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="director-status.html">Application Status</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="director-app-decision.html">Submitted Applications</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">Sign Out</a>
        </li>
    </ul>
</nav>

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
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Grade Year</th>
                            <th>Student ID</th>
                            <th>Phone Number</th>
                            <th>Apply Date</th>
                            <th>Course Focus 1</th>
                            <th>Course Grade 1</th>
                            <th>Course Focus 2</th>
                            <th>Course Grade 2</th>
                            <th>Application Status</th>
                        </tr>
                        <tr>
                            <td>Tutor1</td>
                            <td>tutor1@terpmail.umd.edu</td>
                            <td>Female</td>
                            <td>Junior</td>
                            <td>16400000</td>
                            <td>2400000000</td>
                            <td>03122021</td>
                            <td>BMGT220</td>
                            <td>A</td>
                            <td>BMGT233</td>
                            <td>A+</td>
                            <td>In Processing</td>
                        </tr>
                        <tr>
                            <td>Tutor2</td>
                            <td>tutor2@terpmail.umd.edu</td>
                            <td>Male</td>
                            <td>Freshman</td>
                            <td>16980000</td>
                            <td>3030000000</td>
                            <td>03182021</td>
                            <td>BMGT330</td>
                            <td>A</td>
                            <td>BMGT230</td>
                            <td>A+</td>
                            <td>Reject</td>
                        </tr>
                        <tr>
                            <td>Tutor3</td>
                            <td>tutor3@terpmail.umd.edu</td>
                            <td>Female</td>
                            <td>Junior</td>
                            <td>16780000</td>
                            <td>3300000000</td>
                            <td>10222020</td>
                            <td>ECON201</td>
                            <td>A</td>
                            <td>ECON330</td>
                            <td>A+</td>
                            <td>Accept</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

