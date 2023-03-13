<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form action="" method="POST">
        <label>Username</label>
        <input type="text" name="username">
        <label>Password</label>
        <input type="password" name="password">
        <input type="submit" value="Login" name="submit">
    </form>
    <span>Sudah punya akun?</span>
    <a href="index.php">Login</a>
</body>

</html>

<?php
include '../public/connection.php';
@$username   = $_POST['username'];
@$password   = $_POST['password'];
@$submit     = $_POST['submit'];

if (isset($submit)) {
    $users = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($koneksi, $users);
    $userres = mysqli_fetch_assoc($result);
    if ($username == @$userres['username']) { ?>
        <script>
            alert("Username sudah terpakai")
        </script>
        <?php exit(); } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO admin (username, password) VALUES ( '$username', '$hash')";
        if (mysqli_query($koneksi, $query)) { ?>
            <script>
                alert("Berhasil membuat akun")
            </script>
<?php }
    }
}
