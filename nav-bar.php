<nav class="navbar navbar-expand-sm bg-danger navbar-dark">
    <ul class="navbar-nav">
        <?php
        if (isset($_SESSION['username'])) {
            echo '<li> <a class="navbar-link" href="directory.php"> Directory</a> </li>';
            echo '<li> <a class="navbar-link" href="register_admin.php"> Create New User</a> </li>';
            echo '<li> <a class="navbar-link" href="logout.php"> Logout </a> </li>';
            //else, meaning if I am not logged in
        } else {
            echo '<a class="navbar-brand"><img src="assets/img/logo.png" alt="Logo" style="height:30px;"></a>';
            echo '<li class="nav-item"> <a class="nav-link" href="index.php">Home</a> </li>';
            echo '<li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" href = "#" id = "login-dropdown" data-toggle = "dropdown" 
                    aria-haspopup = "true"
                    aria-expanded = "false"> Login </a>
                    <div class="dropdown-menu" aria-labelledby = "navbarDropdownMenuLink" >
                        <a class="dropdown-item" href = "student-login.php" > Student Login </a>
                        <a class="dropdown-item" href = "tutor-login.php" > Tutor Login </a>
                        <a class="dropdown-item" href = "director-login.php" > Director Login </a>
                    </div>
                    </li>';
            echo '<li class="nav-item"><a class="nav-link" href = "public-hire.php"> Become a Tutor </a>
        </li > ';
        }
        ?>
    </ul>

</nav>