<?php

$error = '';

include "koneksi.php";

if (isset($_POST['submit'])) {
    $username   = $_POST['username'];
    $password   = md5($_POST['password']);
    $level      = $_POST['level'];

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($query) == 0) {
        $error = "Username or Password is invalid";
    } else {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['alamat'] = $row['alamat'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['foto'] = $row['foto'];

        if ($row['level'] == "Super Admin" && $level == "0") {
            header("Location: adminindex.php");
        } else if ($row['level'] == "Admin Instansi" && $level == "1") {
            header("Location: adminindex.php");
        } else if ($row['level'] == "User" && $level == "2") {
            header("Location: akun.php");
        } else {
            $error = "Failed Login";
        }
    }
}
