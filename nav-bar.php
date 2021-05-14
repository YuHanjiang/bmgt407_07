<nav class="navbar navbar-expand-sm bg-danger navbar-dark">
    <ul class="navbar-nav">
        <?php
        if (isset($_SESSION['username'])) {
            if ($_SESSION['accountType'] == 'director') {
                echo '<a class="navbar-brand">
                        <img src="assets/img/logo.png" alt="Logo" style="height:30px;">
                    </a>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="schedule.php">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calendar.php">Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="upcoming-app.php">Sessions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="app-decision.php">Submitted Applications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="status.php">Tutor Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sign-out.php">Sign Out</a>
                    </li>
                    ';
            } else if ($_SESSION['accountType'] == 'student') {
                echo '<a class="navbar-brand">
                        <img src="assets/img/logo.png" alt="Logo" style="height:30px;">
                    </a>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="schedule.php">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="upcoming-app.php">Sessions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedback-form-input.php">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hire.php">Become a Tutor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sign-out.php">Sign Out</a>
                    </li>';
            } else if ($_SESSION['accountType'] == 'tutor') {
                echo '<a class="navbar-brand">
                        <img src="assets/img/logo.png" alt="Logo" style="height:30px;">
                    </a>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calendar.php">Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="upcoming-app.php">Sessions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sign-out.php">Sign Out</a>
                    </li>';
            }
            //else, meaning if I am not logged in
        } else {
            echo '<a class="navbar-brand"><img src="assets/img/logo.png" alt="Logo" style="height:30px;"></a>';
            echo '<li class="nav-item"> <a class="nav-link" href="index.php">Home</a> </li>';
            echo '<li class="nav-item"> <a class="nav-link" href="login.php">Login</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="register.php">Registration</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href = "hire.php">Become a Tutor</a></li>';
        }
        ?>
    </ul>

</nav>