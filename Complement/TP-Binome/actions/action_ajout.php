<?php
session_start();
include ("../classes/GestionSalle.php");
include ("../classes/Salle.php");

if (isset($_POST['nom'], $_POST['capacite'], $_POST['localisation'])) {

    $json_data = file_get_contents('data/json-data-salle.json');
    $salles_array = json_decode($json_data, true);

    $gestion = unserialize($_SESSION['gestion']);

    if ($gestion->verifierSalle($_POST['nom'])) {
        header('Location: ../index.php');
        exit();
    }

    $s = new Salle($_POST['nom'], $_POST['capacite'], $_POST['localisation'], "oui");
    $gestion->ajouterSalle($s);
    $_SESSION['gestion'] = serialize($gestion);

    $nouvelle_salle = [
        "nom" => $_POST['nom'],
        "capacité" => $_POST['capacite'],
        "localisation" => $_POST['localisation'],
        "disponible" => "oui"
    ];

    $salles_array[] = $nouvelle_salle;
    file_put_contents(
        'data/json-data-salle.json',
        json_encode($salles_array)
    );

    header('Location: ../index.php');
    exit();
}
