<?php

use Complement\Utilisateur;
require_once("Utilisateur.php");

function verification($login, $password){
    $json = json_decode(file_get_contents('data/data2.json'));
    if($json->login == $login && $json->password == md5($password)){
        return true;
    }
    return false;
}
function verification2($login, $password){
    $xml = simplexml_load_file('data/data2.xml');
    if($xml->login == $login && $xml->password == md5($password)){
        return true;
    }
    return false;
}

if (isset($_POST["Login"], $_POST["Password"])) {
    $login = $_POST['Login'];
    $password = $_POST['Password'];
    if (verification($login, $password)) {
        session_start();
        $user = new Utilisateur($login, $password);
        $_SESSION['user'] = serialize($user);
        header("location: admin.php");
        exit(0);
    }
    else {
        header("location: accueil.php");
        exit(1);
    }
}
