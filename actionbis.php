<?php
$login = $_POST['Login'];
$password = $_POST['Password'];
$filename = "data/connexions.csv";
$fp = fopen($filename, "r");

while ($row = fgetcsv($fp)) {
    if ($login == $row[0] && $password == $row[1]) {
        session_start();
        $_SESSION['Login'] = $login;
        header("location: Users/".$login.".php");
        exit(0);
    }
}
header("location: login.php?error");
fclose($fp);


