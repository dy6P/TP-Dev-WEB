<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="../res/tableau.css" rel="stylesheet">
    <title>Statistiques</title>
</head>
<body>

<form method="post" action="">
    <label for="lignes">Nombre de lignes :</label>
    <input type="number" name="lignes" id="lignes" min="1" required>

    <label for="colonnes">Nombre de colonnes :</label>
    <input type="number" name="colonnes" id="colonnes" min="1" required>

    <h3>Choisir la cellule à colorer :</h3>
    <label for="ligne_couleur">Ligne :</label>
    <input type="number" name="ligne_couleur" id="ligne_couleur" min="1">

    <label for="colonne_couleur">Colonne :</label>
    <input type="number" name="colonne_couleur" id="colonne_couleur" min="1">

    <label for="couleur">Couleur :</label>
    <input type="color" name="couleur" id="couleur" value="#ff0000">

    <input type="submit" value="Valider">
</form>

<?php
if (isset($_POST['lignes'], $_POST['colonnes'])) {

    $lignes = $_POST['lignes'];
    $colonnes = $_POST['colonnes'];

    if (!empty($_POST['couleur'])) {
        $couleur = $_POST['couleur'];
    } else {
        $couleur = "#ff0000";
    }

    if (!empty($_POST['ligne_couleur'])) {
        $ligne_couleur = (int)$_POST['ligne_couleur'] - 1;
    } else {
        $ligne_couleur = -1;
    }

    if (!empty($_POST['colonne_couleur'])) {
        $colonne_couleur = (int)$_POST['colonne_couleur'] - 1;
    } else {
        $colonne_couleur = -1;
    }

    echo "<h3>Tableau</h3>";
    echo "<table>";

    for ($i = 0; $i < $lignes; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $colonnes; $j++) {
            $style = "";
            if ($i === $ligne_couleur && $j === $colonne_couleur) {
                $style = " style='background-color:$couleur'";
            }
            echo "<td$style>($i, $j)</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>

</body>
</html>