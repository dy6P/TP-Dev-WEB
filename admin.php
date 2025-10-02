<?php
session_start();
if ($_SESSION['login'] == "admin") {
    echo "bonjour";
    echo "<br>";
    echo "<a href=logout.php>Logout</a>";
}
else {
    header('Location: login.php?error');
}