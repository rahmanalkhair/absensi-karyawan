<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = $conn->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
    if ($cek->num_rows > 0) {
    $user = $cek->fetch_assoc();
    $_SESSION['login'] = true;
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];
    header("Location: dashboard.php");
}
}
?>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="styles.css">
    </head>
<body>
   <div class="container">
    <h2>Login Karyawan</h2>
    <form method="post">
        <input name="username" type="text" placeholder="Username"><br>
        <input name="password" type="password" placeholder="Password"><br>
        <button type="submit">Login</button>
    </form>
</div>
</body>
