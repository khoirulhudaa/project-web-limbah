<?php
include 'config.php';
session_start();

$username = "";
$errorSalah = "";
$errorUsernameKosong = "";

if(isset($_POST['kirim'])) {
    $_SESSION['username_reset'] = $_POST['username'];

    if($_POST['username'] == "") {
        $errorUsernameKosong = "Username tidak boleh kosong!";
    }else {
        $sql = mysqli_query($conn, "select * from user where username = '$_POST[username]' ");
        $cek = mysqli_num_rows($sql);
        if($cek > 0) {
            header('location: reset-password.php');
        }else {
            $errorSalah = "Username salah!";
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
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Forgot password</p>
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
                <button type="submit" class="btn" name="kirim">Kirim</button>
            </div>
        </form>
    </div>
</body>
</html>