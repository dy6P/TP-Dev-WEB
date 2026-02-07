<?php

use Complement\INTRO\Utilisateur;

require_once("Utilisateur.php");
session_start();

function verification($login, $password){
    $json = json_decode(file_get_contents('data/data2.json'), true);
    if($json['login'] == $login && $json['password'] == md5($password)){
        return true;
    }
    return false;
}
function verification2($login, $password){
    $xml = simplexml_load_file('data/data2.xml');
    if ($xml === false) {
        return false;
    }
    foreach ($xml->user as $user) {
        if ((string) $user->login === $login && (string) $user->password === md5($password)) {
            return true;
        }
    }
    return false;
}

if (isset($_POST["Login"], $_POST["Password"])) {
    $login = $_POST['Login'];
    $password = $_POST['Password'];
    if (verification($login, $password)) {
        $user = new Utilisateur($login, $password);
        $_SESSION['user'] = serialize($user);
        header("Location: admin.php");
        exit(0);
    }
    else {
        header("Location: accueil.php");
        exit(1);
    }
}
