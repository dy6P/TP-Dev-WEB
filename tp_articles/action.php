<?php
$login = $_POST['Login'];
$password = $_POST['Password'];
$host = "localhost";
$user = "root";
$pass = "";
$db = "produits";
$connect = mysqli_connect($host, $user, $pass);
if (!$connect) {
    echo "erreur";
}
else {
    $base = mysqli_select_db($connect, $db);
    if (!$base) {
        echo "erreur";
    } else {
        $sql = "SELECT * FROM users";
        $result = mysqli_query($connect, $sql);
        $bool = false;
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['username'] == $login && $row['password'] == $password) {
                    $bool = true;
                }
            }
        }
        if ($bool) {
            if ($login == "admin") {
                session_start();
                $_SESSION['Login'] = $login;
                header('Location: accueil.php');
            }
            else if ($login == "client") {
                session_start();
                $_SESSION['Login'] = $login;
                header('Location: accueil.php');
            }
        }
    }
}