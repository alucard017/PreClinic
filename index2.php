<?php
require 'connection.php';
require 'function.inc.php';
if(isset($_POST['login'])) { // check if login form submitted
    $email = $_POST['email'];
    $password = $_POST['password'];

    // escape special characters in email and password to prevent SQL injection
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    // query MySQL database to check if email and password match
    $query = "SELECT * FROM `register` WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) == 1) {
        // login successful, redirect to dashboard or home page
        $_SESSION['email'] = $email;
        alert("Login Sucessful!");
        redirect('dashboard.php');
        exit();
    } else {
        // login failed, show error message
        $error = "Invalid Email or password.";
        alert("Invalid Username or password");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form action="" method="post" class="form-signin">
                        <div class="account-logo">
                            <a href="#"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" autofocus="" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="login" class="btn btn-primary account-btn">Login</button>
                        </div>
                      <!-- <p>Don't have an account? <a href="register_form.php">register now</a></p>-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>