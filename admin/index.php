<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
    <!-- <style>
        * {
            border: 1px solid red;
        }
    </style> -->
</head>

<body>
    <div class="grid min-w-full place-content-center h-screen bg-slate-300">
            <div id="card" class=" bg-white rounded-2xl p-8">
                <h1 class="font-extrabold text-indigo-800 text-2xl pb-4">Login Admin</h1>
                <form class="grid max-w-x place-items" action="" method="POST">
                    <label class="text-slate-700">Username</label>
                    <input class="border-2" type="text" name="username">
                    <label>Password</label>
                    <input class="border-2" type="password" name="password">
                    <input class="bg-indigo-800 text-white p-2 mt-3 rounded-md place-self-end" type="submit" value="Login" name="submit">
                </form>
            <div class="pt-6">
                <label>Belom punya akun?</label>
                <a href="register.php" class="w-20 text-center font-bold place-self-end text-indigo-800  p-1 rounded-md">Registrasi</a>
            </div>
            </div>
    </div>
</body>

</html>

<?php
session_start();
include '../public/connection.php';
@$username   = $_POST['username'];
@$password   = $_POST['password'];
@$submit     = $_POST['submit'];

if (isset($submit)) {
    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);
    if ($hasil = mysqli_num_rows($result) === 1) {
        $res = mysqli_fetch_assoc($result);
        if (password_verify($password, $res['password'])) {
            $_SESSION['on'] = $username;
            header('Location: admin.php');
        } else { ?>
            <script>
                alert("Password atau username salah")
            </script>
<?php }
    }
}
