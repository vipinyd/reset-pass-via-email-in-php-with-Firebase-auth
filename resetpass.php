<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="indexcss.css">
</head>

<?php
session_start();
include('dbconn.php');

if (isset($_POST["submit"])) {

    $email = $_POST["email"];

    $auth->sendPasswordResetLink($email);

    echo "<script>alert('Reset link sent to your email id')</script>";

}
?>

<body>
    <div class="main-w3layouts wrapper">
        <h1>Reset Password!!</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form method="post">

                    <input class="text-email" type="email" name="email" placeholder="Email"> <br>

                    <input type="submit" name="submit" value="Send reset link">
                </form>

            </div>
        </div>
    </div>
</body>
</html>