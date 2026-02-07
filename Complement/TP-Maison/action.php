<?php

require_once("Utilisateur.php");
session_start();

function verification($login, $password){
    $xml = simplexml_load_file('data/utilisateurs.xml');
    foreach ($xml->user as $user) {
        if ((string) $user->login == $login && (string) $user->password == md5($password)) {
            return true;
        }
    }
    return false;
}

if (isset($_POST["login"], $_POST["password"])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if (verification($login, $password)) {
        $user = new Utilisateur($login, $password);
        $_SESSION['user'] = serialize($user);
        header("Location: admin.php");
        exit(0);
    }
    else {
        header("Location: index.php");
        exit(1);
    }
}
