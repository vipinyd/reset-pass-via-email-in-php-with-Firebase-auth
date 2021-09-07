<?php
session_start(); ?>
<!DOCTYPE html>
<html>
<!-- html template to for showing user who succesfully logged in -->
<head>
    <title>FireBase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="indexcss.css">
</head>

<body>
    <div class="main-w3layouts wrapper">
        <h1>Firebase authentication User</h1> <br>
        <hr>
        <?php
        if (isset($_SESSION['status'])) {
            echo $_SESSION['status'];
            unset($_SESSION['status']);
        } 
        ?>
        <br>
        <a class="button rounded" href="logout.php">Logout</a> <br> <br> <br>
        <h1> WELCOME!! <?php echo $_SESSION['user'] ?> </h1> <br> <br>
    </div>
</body>
</html>