<?php

$dom = new DOMDocument();
$dom -> encoding = 'utf-8';
$dom -> formatOutput = true;
$racine = $dom -> createElement("voiliers");
$racine -> setAttribute("transat", "Café 2025");
$dom -> appendChild($racine);

$fichier_csv = fopen($_GET["csv"], "r");
$delimiter = ",";
fgetcsv($fichier_csv, $delimiter);

$i = 1;
while ($champs = fgetcsv($fichier_csv, $delimiter)) {
    echo $i++."- ".$champs[1]."<br/>";

}
fclose($fichier_csv);
$dom -> save("voiliers.xml") or die ("Erreur dans la création de voiliers.xml");


