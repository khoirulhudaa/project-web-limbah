<?php
include 'config.php';
session_start();

$username = "";
$password = "";
$errorPasswordKosong = "";
$errorSalah = "";
$errorUsernameKosong = "";

if(isset($_POST['kirim'])) {
    $_SESSION['username3_value'] = $_POST['username'];
    $_SESSION['password3_value'] = $_POST['password'];

    if($_POST['username'] == "") {
        $errorUsernameKosong = "Username tidak boleh kosong!";
    }else if($_POST['password'] == "") {
        $errorPasswordKosong = "Password tidak boleh kosong!";
    }else {
        $sql = mysqli_query($conn, "select * from user where username = '$_POST[username]' and password = '$_POST[password] ' ");
        $cek = mysqli_num_rows($sql);
        if($cek > 0) {
            $_SESSION['username_admin'] = $_POST['username'];
            $_SESSION['role_admin'] = "admin";
            header('location: home.php');
        }else {
            $errorSalah = "Username atau password salah!";
       }
    }

}
 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/style.css" rel="stylesheet">
    <title>Login</title>
    <style>
        .error {
            text-align: center;
            margin-top: -30px;
            margin-bottom: 10px;
            display: flex;
            justify-content: center;
            color: red;
        }
    </style>
</head>
<body class="login" style="background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url('assets/img/bg\ login.jpg');">
    <div class="container">
        <form action="" method="POST" class="login-email">
            <?php 
                if($errorSalah != "") {
                ?>
                <br>
                <span class="error bg-danger"><?php echo $errorSalah ?></span>
                <?php
                }
            ?>
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
            <input type="username" class="form-control" id="username" placeholder="Username" aria-describedby="username" name="username" required>
            <?php 
                if($errorUsernameKosong != "") {
                ?>
                <br>
                <span class="error bg-danger"><?php echo $errorUsernameKosong ?></span>
                <?php
                }
            ?>
            </div>
            <div class="input-group">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            <?php 
                if($errorPasswordKosong != "") {
                ?>
                <br>
                <span class="error bg-danger"><?php echo $errorPasswordKosong ?></span>
                <?php
                }
            ?>
            </div>
            
            <div class="input-group">
                <button type="submit" class="btn" name="kirim">Login</button>
            </div>
            <a href="forgot-password.php"><p class="login-register-text">Lupa Password ? </a></p>
        </form>
    </div>
</body>
</html>