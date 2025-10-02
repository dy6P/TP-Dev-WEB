<?php
session_start();

if ($_SESSION['Login'] == "admin") {
    echo "bonjour admin";
    echo "<br>";
    echo "<a href=../logout.php>Logout</a>";
}
else {
    header('Location: ../login.php?error');
}