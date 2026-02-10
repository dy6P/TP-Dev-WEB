<?php
session_start();
if (!isset($_SESSION["user"])) {
    header('Location: action_deconnexion.php');
}
require_once('Utilisateur.php');

include('ressources/head.php');

if (isset($_SESSION["user"])) {
    $user = unserialize($_SESSION["user"]);
    echo "{$user->information()}";
}
include('ressources/footer.html');