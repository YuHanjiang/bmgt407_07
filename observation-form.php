<?php
session_start()

?>

<html lang="en">

<head>
    <title>Observation Form</title>
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
    <meta charset="UTF-8">
</head>

<body>

<?php require_once('nav-bar.php') ?>
<div class="container">
    <div class="row justify-content-center">
        <form action="observation-form.php" method="POST">
            <div class="form-group">
                <div class="p-4">
                    <h4>Observation Form</h4>
                </div>
            </div>
            <div class="form-group">
                <label>
                    Observer Name:
                        <input class="form-control" name="observer-name">
                </label>
            </div>
        </form>
    </div>
</div>

</body>
</html>
