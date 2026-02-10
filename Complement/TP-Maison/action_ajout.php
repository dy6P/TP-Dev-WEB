<?php

use function Sodium\add;

session_start();

if (isset($_POST['categorie'], $_POST['name'], $_POST['price'], $_POST['origine'])) {
    $json_data = file_get_contents('data/data.json');
    $produits_array = json_decode($json_data, true);
    $categories = array_keys($produits_array);
    foreach ($categories as $categorie) {
        $liste_produits = $produits_array[$categorie];
        foreach ($liste_produits as $produit) {
            if ($produit['name'] == $_POST['name']) {
                header('Location: produitsJSON.php');
            }
        }
    }
    $produits_array[$_POST['categorie']].add();
    //dezfefz
}

