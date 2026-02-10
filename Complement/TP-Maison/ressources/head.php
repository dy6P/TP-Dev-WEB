<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TP PHP - Semestre 4</title>
    <link rel="stylesheet" href="ressources/style.css">
</head>
<body>

<header>
    <h1>TP PHP - semestre 4</h1>
</header>

<nav>
    <?php
    if (isset($_SESSION["user"])) {
        echo '<a href="index.php">Accueil</a>';
        echo '<a href="admin.php">Admin</a>';
        echo '<a href="produitsJSON.php">Produits (JSON)</a>';
        echo '<a href="produitsXML.php">Produits (XML)</a>';
        echo '<a href="produitsCSV.php">Produits (CSV)</a>';
        echo '<a href="action_deconnexion.php">Déconnexion</a>';
        }
    else {
        echo '<a href="index.php">Accueil</a>';
        echo '<a href="connexion.php">Connexion</a>';
    }
    ?>
</nav>