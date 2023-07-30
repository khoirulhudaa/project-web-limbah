<?php
include 'config.php';
session_start();

$password = "";
$errorSalah = "";
$errorpasswordKosong = "";

if(isset($_POST['kirim'])) {
    if($_POST['password'] == "") {
        $errorpasswordKosong = "password tidak boleh kosong!";
    }else {
        $sql = mysqli_query($conn, "UPDATE user SET password='$_POST[password]' where username = '$_SESSION[username_reset]' ");
        if($sql) {
            header('location: success-reset.php');
        }else {
            $errorSalah = "password salah!";
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
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Change password</p>
            <div class="input-group">
            <input type="password" class="form-control" id="password" placeholder="New password" aria-describedby="password" name="password" required>
            <?php 
                if($errorpasswordKosong != "") {
                ?>
                <br>
                <span class="error bg-danger"><?php echo $errorpasswordKosong ?></span>
                <?php
                }
            ?>
            </div>
            
            <div class="input-group">
                <button type="submit" class="btn" name="kirim">Reset password</button>
            </div>
        </form>
    </div>
</body>
</html>