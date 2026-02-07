<?php
session_start();
require_once('Utilisateur.php');

include('ressources/head.html');

if (isset($_SESSION["user"])) {
    $user = unserialize($_SESSION["user"]);
    echo "{$user->information()}";
}

include('ressources/footer.html');