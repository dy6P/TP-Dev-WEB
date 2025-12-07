<?php
$chaineJSON = file_get_contents("php://input");
$headers = getallheaders();
if ($headers["Content-Type"] === "application/json") {
    $_POST = ["ok"];
    json_decode($chaineJSON);
    if (json_last_error() === JSON_ERROR_NONE) {
        file_put_contents("/Projet_Transat/JSON/Route_du_Cafe_2025.json", $chaineJSON);
        echo "Enregistrement JSON effectué";
    }
    else {
        echo "Erreur dans le format JSON";
    }
}
