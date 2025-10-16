<?php include '../res/header.html'; ?>
</head>
<title>Articles</title>
<body>

<a href="accueil.html">Acceuil</a><br><br>

<a href="liste_articles.php">Liste</a><br><br>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "produits";
$connect = mysqli_connect($host, $user, $pass);
if (!$connect) {
    echo "erreur";
}
else {
    $base = mysqli_select_db($connect, $db);
    if (!$base) {
        echo "erreur";
    }
    else {
        $sql = "SELECT * FROM article";
        $result = mysqli_query($connect, $sql);
        echo "<table>";
        echo "<tr>";
        echo "<th>Nom</th>";
        echo "<th>Prix unitaire</th>";
        echo "<th>Quantité</th>";
        echo "<th>Référence</th>";
        echo "<td></td>";
        echo "</tr>";
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row["nom"]."</td>";
                echo "<td>".$row["prixu"]."</td>";
                echo "<td>".$row["quantite"]."</td>";
                echo "<td>".$row["ref"]."</td>";
                echo "<td><form action='' method='get'><input type='submit' name='modifier' id='modifier' value='Modifier'></form></td>";
                echo "</tr>";
            }
        }
        echo "</table>";

        if (isset($_GET['modifier'])) {
            echo "<br>";
            echo "<form action='' method='get'>
            <label for='prixu'>Prix unitaire</label>
            <input type='number' name='prixu' id='prixu'>
            <label for='quantite'>Quantité</label>
            <input type='number' name='quantite' id='quantite'>
            <input type='submit' name='valider' id='valider' value='Modifier'>
            </form><br><br>";
            if (isset($_GET['valider'])) {
                $pu = $_GET['prixu'];
                $qu = $_GET['quantite'];
                if (($pu >= 0 && $qu >= 0) && (is_int($qu))){
                    $requete = "UPDATE article SET " . $row["prixu"] . " = " . $pu . ", " . $row["quantite"] . " = " . $qu . " WHERE " . $row["ref"] . "=12348;";
                    mysqli_query($connect, $requete);
                    header("location:liste_articles.php");
                }
                else {
                    header("location:liste_articles.php");
                }
            }
        }
    }
}

mysqli_close($connect);

include '../res/footer.html'; ?>


