<?php

$dom = new DOMDocument();
$dom -> encoding = 'utf-8';
$dom -> formatOutput = true;
$racine = $dom -> createElement("voiliers");
$racine -> setAttribute("transat", "Café 2025");
$dom -> appendChild($racine);

$fichier_csv = fopen("Données/voiliers.csv", "r");
$delimiter = ",";
fgetcsv($fichier_csv, 1500, $delimiter);

$i = 1;
while ($champs = fgetcsv($fichier_csv, 1500, $delimiter)) {
    echo $i++." - ".$champs[1]."<br/>";
    $voilier = $dom -> createElement("voilier");
    $voilier -> setAttribute("classe", $champs[2]);
    $voilier -> setAttribute("annee", $champs[3]);
    $nom_voilier = $dom -> createElement("nom");
    $nom_voilier -> textContent = $champs[1];
    $photo = $dom -> createElement("photo");
    $photo -> textContent = $champs[4];
    $skipper1 = $dom -> createElement("skipper");
    $skipper1 -> setAttribute("age", $champs[6]);
    $origine1 = $dom -> createElement("origine");
    $origine1 -> textContent = $champs[7];
    $nom1 = $dom -> createElement("nom");
    $nom1 -> textContent = $champs[5];
    $skipper2 = $dom -> createElement("skipper");
    $skipper2 -> setAttribute("age", $champs[9]);
    $origine2 = $dom -> createElement("origine");
    $origine2 -> textContent = $champs[10];
    $nom2 = $dom -> createElement("nom");
    $nom2 -> textContent = $champs[8];
    $voilier -> appendChild($nom_voilier);
    $voilier -> appendChild($photo);
    $skipper1 -> appendChild($origine1);
    $skipper1 -> appendChild($nom1);
    $voilier -> appendChild($skipper1);
    $skipper2 -> appendChild($origine2);
    $skipper2 -> appendChild($nom2);
    $voilier -> appendChild($skipper2);
    $racine -> appendChild($voilier);
}
fclose($fichier_csv);
$dom -> save("voiliers.xml") or die ("Erreur dans la création de voiliers.xml");


