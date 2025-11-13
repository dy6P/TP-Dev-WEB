<?php

$dom = new DOMDocument();
$dom -> encoding = 'utf-8';
$dom -> formatOutput = true;
$racine = $dom -> createElement("voiliers");
$racine -> setAttribute("transat", "Café 2025");
$dom -> appendChild($racine);

$fichier_csv = fopen("../Données/voiliers.csv", "r");
$delimiter = ",";
fgetcsv($fichier_csv, 1500, $delimiter);

$i = 1;
while ($champs = fgetcsv($fichier_csv, 1500, $delimiter)) {
    $categorie = $dom -> createElement("categorie");
    $voilier = $dom -> createElement("voilier");
    $nom_voilier = $dom -> createElement("nom");
    $photo = $dom -> createElement("photo");
    $skipper1 = $dom -> createElement("skipper");
    $origine1 = $dom -> createElement("origine");
    $nom1 = $dom -> createElement("nom");
    $skipper2 = $dom -> createElement("skipper");
    $origine2 = $dom -> createElement("origine");
    $nom2 = $dom -> createElement("nom");


    $categorie -> setAttribute("cat", $champs[2]);
    $voilier -> setAttribute("annee", $champs[3]);
    $skipper1 -> setAttribute("age", $champs[6]);
    $skipper2 -> setAttribute("age", $champs[9]);


    $nom_voilier -> textContent = $champs[1];
    $photo -> textContent = $champs[4];
    $origine1 -> textContent = $champs[7];
    $nom1 -> textContent = $champs[5];
    $origine2 -> textContent = $champs[10];
    $nom2 -> textContent = $champs[8];


    $voilier -> appendChild($nom_voilier);
    $voilier -> appendChild($photo);
    $skipper1 -> appendChild($origine1);
    $skipper1 -> appendChild($nom1);
    $voilier -> appendChild($skipper1);
    $skipper2 -> appendChild($origine2);
    $skipper2 -> appendChild($nom2);
    $voilier -> appendChild($skipper2);
    //$categorie -> appendChild($voilier);
    $racine -> appendChild($categorie);
}
fclose($fichier_csv);
$dom -> save("voiliers_catégories.xml") or die ("Erreur dans la création de voiliers_catégories.xml");



