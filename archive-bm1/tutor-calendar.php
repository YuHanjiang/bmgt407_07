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
    <title>Calendar</title>

</head>

<body>

<nav class="navbar navbar-expand-sm bg-danger navbar-dark">
    <ul class="navbar-nav">
        <a class="navbar-brand">
            <img src="assets/img/logo.png" alt="Logo" style="height:30px;">
        </a>
        <li class="nav-item">
            <a class="nav-link" href="tutor-homepage.html">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="tutor-calendar.html">Calendar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tutor-dashboard.html">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">Sign Out</a>
        </li>
    </ul>
</nav>

<br>

<div class="container">
    <div class="row">
        <div class="col">
            <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=America%2FNew_York&amp;src=Y19lbWQ3YzA0aGptdHZjcDdua2c0MWlsNmIxc0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;color=%237CB342&amp;showTitle=0&amp;showNav=0&amp;showDate=0&amp;showTz=1&amp;showCalendars=0&amp;showTabs=1&amp;showPrint=0&amp;mode=WEEK"
                    style="border-width:0" width="600" height="600"></iframe>
        </div>
        <div class="col">
            <div class="row justify-content-center">
                <a class="btn btn-danger btn-lg" href="https://calendar.google.com">Edit Calendar</a>
            </div>
            <div class="p-3">
                <h4>Upcoming Sessions: </h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Student</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mar. 25</td>
                        <td>15:00</td>
                        <td>Student1</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Mar. 26</td>
                        <td>10:00</td>
                        <td>Student2</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


</body>
</html>