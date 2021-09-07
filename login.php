<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" media="all" />

    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="indexcss.css">

</head>
<?php
session_start();
include('dbconn.php'); 

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $clearTextPassword =  $_POST["password"];

    try {

        $user = $auth->getUserByEmail("$email"); // check user by email exist in remote databse or not

        $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
        $idTokenString = $signInResult->idToken();
        $data = $signInResult->data(); // fetching all data of user in $data
        try {
            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
            $uid = $verifiedIdToken->claims()->get('sub'); 

            $_SESSION['verified_user_id'] = $uid;
            $_SESSION['status'] = "you are logged in succesfully";
            $_SESSION['user'] = $data['displayName'];// storing user name in session
            header('location:user.php');
            exit();
        } catch (InvalidToken $e) {
            echo 'The token is invalid: ' . $e->getMessage();
        } catch (\InvalidArgumentException $e) {
            echo 'The token could not be parsed: ' . $e->getMessage();
        }
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        // echo $e->getMessage();
        $_SESSION['status'] = "no email found";
        header('location:login.php');
        exit();
    }
}

?>

 <!-- html template for login -->
<body>
    <div class="main-w3layouts wrapper">
        <h1>Login here!!</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form method="post">
                    <?php
                    if (isset($_SESSION['status'])) {
                        echo $_SESSION['status'];
                        unset($_SESSION['status']);
                    }
                    ?>

                    <input class="text-email" type="email" name="email" placeholder="Email"> <br>

                    <input class="text-email" type="password" name="password" placeholder="Password"> <br>

                    <p>Forgot password? <a href="resetpass.php"> Reset NOW!</a></p>


                    <input type="submit" name="login" value="LOGIN">
                </form>
                <p>Don't have Account? <a href="register.php"> Signup Now!</a></p>
            </div>
        </div>
    </div>
</body>

</html>