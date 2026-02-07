<?php
session_start();
require_once('Utilisateur.php');

if (isset($_SESSION["user"])) {
    $user = unserialize($_SESSION["user"]);
    echo "{$user->information()}";
}