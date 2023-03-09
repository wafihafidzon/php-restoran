<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">
        <h1 class="text-2xl">Username</h1> <br>
        <input type="text" name="username"> <br>
        <label>Password</label> <br>
        <input type="password" name="password"> <br>
        <button type="submit" name="submit">Login</button><br>
    </form>
    <span>Belom punya akun?</span>
    <a href="register.php">Registrasi</a>
</body>
</html>

<?php
session_start();
include '../connection.php';
@$username   = $_POST['username'];
@$password   = $_POST['password'];
@$submit     = $_POST['submit'];

if(isset($submit)){
    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);
    if ($hasil = mysqli_num_rows($result) === 1){
        $res = mysqli_fetch_assoc($result);
        if (password_verify($password, $res['password'])){
            $_SESSION['on'] = $username;
            header('Location: admin.php');
        } else { ?>
            <script>alert("Password atau username salah")</script>
        <?php }
    }
}
