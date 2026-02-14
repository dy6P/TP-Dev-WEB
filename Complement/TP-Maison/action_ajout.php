<?php

if (isset($_POST['categorie'], $_POST['name'], $_POST['price'], $_POST['origine'])) {

    $json_data = file_get_contents('data/data.json');
    $produits_array = json_decode($json_data, true);

    foreach ($produits_array as $categorie => $liste_produits) {
        foreach ($liste_produits as $produit) {
            if ($produit['name'] == $_POST['name']) {
                header('Location: produitsJSON.php');
                exit();
            }
        }
    }

    $nouveau_produit = [
        "nom" => $_POST['name'],
        "prix_unitaire" => $_POST['price'],
        "origine" => $_POST['origine']
    ];

    $produits_array[$_POST['categorie']][] = $nouveau_produit;
    file_put_contents(
        'data/data.json',
        json_encode($produits_array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    );

    header('Location: produitsJSON.php');
    exit();
}
