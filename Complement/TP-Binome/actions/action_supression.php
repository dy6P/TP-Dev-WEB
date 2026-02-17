<?php
include ("../classes/GestionSalle.php");
include ("../classes/Salle.php");
session_start();
$gestion = isset($_SESSION['gestion']) ? $_SESSION['gestion'] : null;
if(!$gestion==null){
    $gestionSalle = unserialize($gestion);
}
$nom = $_POST['nom'];

$gestionSalle->supprimerSalle($nom);

$_SESSION['gestion'] = serialize($gestionSalle);

header('Location: ../index.php');


