<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="../res/tableau.css" rel="stylesheet">
    <title>Statistiques</title>
</head>
<body>

<?php
require("res/stat.php");

$x = [1, 3, 4, 7, 9, 10];
$n = [2, 4, 1, 3, 5, 1];

$liste = [
        "x" => $x,
        "n" => $n
];
?>

<h2>Dylan PERONI</h2>

<table>
    <?php foreach ($liste as $label => $serie): ?>
        <tr>
            <th><?= htmlspecialchars($label) ?></th>
            <?php foreach ($serie as $value): ?>
                <td><?= $value ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>

<br>

<form action="" method="post">
    <label for="calculs">Choisir : </label>
    <select name="calculs" id="calculs">
        <option value="Moyenne">Moyenne</option>
        <option value="Variance">Variance</option>
        <option value="EcartType">Ecart type</option>
    </select>
    <input type="submit" value="Valider">
</form>

</body>
</html>

<?php
if(isset($_POST['calculs'])) {
    if($_POST['calculs'] == "Moyenne") {
        echo "Résultat : ".moyenne($x, $n);
    }
    if($_POST['calculs'] == "Variance") {
        echo "Résultat : ".variance($x, $n);
    }
    if($_POST['calculs'] == "EcartType") {
        echo "Résultat : ".ecart_type($x, $n);
    }
}
?>
