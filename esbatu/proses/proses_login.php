<?php
session_start();
$user = $_POST['username'];
$pass = $_POST['password'];
if ($user == "admin" && $pass == "admin") {
    $_SESSION['admin'] = $user;
    header("Location: ../dashboard.php");
} else {
    echo "Login gagal. <a href='../index.php'>Coba lagi</a>";
}
?>