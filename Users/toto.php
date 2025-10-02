<?php
session_start();
if ($_SESSION['Login'] == "toto") {
    echo "bonjour toto";
    echo "<br>";
    echo "<a href=../logout.php>Logout</a>";
}
else {
    header('location: login.php?error');
}