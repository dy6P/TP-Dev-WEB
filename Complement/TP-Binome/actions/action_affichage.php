<?php
include ("classes/GestionSalle.php");
include ("classes/Salle.php");

$gestion = isset($_SESSION['gestion']) ? $_SESSION['gestion'] : null;
if(!$gestion==null){
    $gestionSalle = unserialize($gestion);
}

$json = file_get_contents('data/json-data-salle.json');
if($json === false){
    die("erreur de json");
}

$data = json_decode($json, true);
if($data === null){
    die("erreur de json data");
}

if($gestion==null){
    $gestionSalle = new GestionSalle();

    foreach ($data as $elements) {

        $salle = new Salle($elements['nom'], $elements['capacité'], $elements['localisation'], $elements['disponible']);
        $gestionSalle->ajouterSalle($salle);
    }

    $_SESSION['gestion'] = serialize($gestionSalle);
}

$gestionSalle->afficherToutesSalles();