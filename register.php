<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="indexcss.css">
</head>
<body>

    <?php
    session_start();
    include('dbconn.php');
    if (isset($_POST['submit'])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $cpass = $_POST["cpass"];
        //
        $userProperties = [
            'displayName' => $name,
            'email' => $email,
            'emailVerified' => false,
            'password' => $pass,
        ];
        // firebase query to create a user in remote database of fire base  
        $createdUser = $auth->createUser($userProperties);
        if ($createdUser) {
            echo "<script>alert('Registration success!!')</script>";
        } else {
        
            echo "<script>alert('user not created created')</script>";
        }
    }
    ?>
  <!-- html template for registrtion for -->
    <div class="main-w3layouts wrapper">
        <h1>Firebase Register user</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="" method="post">
                
                    <input class="text" type="text" name="name" placeholder="User Name" required=""><br>

                    <input class="text email" type="email" name="email" placeholder="User Email" required="">

                    <input class="text" type="password" name="password" placeholder="Password" required="">
                    <input class="text w3lpass" type="password" name="cpass" placeholder="Confirm Password" required="">
                    <div class="wthree-text">
                        <div class="clear"> </div>
                    </div>
                    <input type="submit" name="submit" value="SIGNUP">
                </form>
                <p>Already have Account? <a href="login.php"> Login Now!</a></p>
            </div>
        </div>
    </div>
</body>
</html>