<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submitted Applications</title>
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

<div class="container">
    <div class="row justify-content-center">
        <div class="p-5">
            <div class="text-center">
                <picture>
                    <img src="assets/img/logo.png" alt="ASTS Logo">
                </picture>
                <div class="p-2">
                </div>

                <div class="text-center">
                    <h3>Submitted Applications</h3>
                    <div class="text-left">
                    </div>
                    <table>
                        <tr>
                            <th>First Name</th>
                            <td>Last Name</td>
                            <td>Gender</td>
                            <td>Desired Course to Tutor</td>
                            <td>Email</td>
                            <td>Phone Number</td>
                            <td>Resume File</td>
                            <td> Accept</td>
                            <td> Reject</td>
                            <td> Hold</td>
                        </tr>
                        <tr>
                            <td>Bob</td>
                            <td>Jones</td>
                            <td>Female</td>
                            <td>BMGT340</td>
                            <td>bjones@umd.edu</td>
                            <td> 123-456-7890</td>
                            <td> Bob's Resume</td>
                            <td>
                                <button type="submit" class="btn btn-danger">Accpt</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger">Hold</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenny</td>
                            <td>Gerge</td>
                            <td>Male</td>
                            <td>BMGT220</td>
                            <td>Jgergo@umd.edu</td>
                            <td> 123-456-7890</td>
                            <td> Jenny's Resume</td>
                            <td>
                                <button type="submit" class="btn btn-danger">Accpt</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger">Hold</button>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
