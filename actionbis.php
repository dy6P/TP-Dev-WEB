<?php
$login = $_POST['Login'];
$password = $_POST['Password'];

if ($login == "admin" && $password == "admin") {
    session_start();
    $_SESSION['login'] = $login;
    header('Location: admin.php');
}
else {
    header('Location: login.php?error');
}
