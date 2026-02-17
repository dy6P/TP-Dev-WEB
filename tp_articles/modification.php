<?php
include 'res/header.html';
?>
</head>
<title>Articles</title>
<body>
<a href="connexion.php">Connexion</a><br><br>

<a href="accueil.php">Acceuil</a><br><br>

<a href="modification.php">Liste</a><br><br>

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
                echo sprintf("<td><a href='action_modification.php?ref=%s'>Modifier</td>", $row["ref"]);
                echo "</tr>";
            }
        }
        echo "</table>";

        if (isset($_GET['ref'])) {
            echo "<br>";
            echo "<form action='' method='post'>
            <label for='prixu'>Prix unitaire</label>
            <input type='number' name='prixu' id='prixu' step='0.01' min='0'>
            <label for='quantite'>Quantité</label>
            <input type='number' name='quantite' id='quantite'>
            <input type='submit' name='valider' id='valider' value='Modifier'>
            </form><br><br>";
            if (isset($_POST['valider'])) {
                $sql = "update article set prixu = " . $_POST['prixu'] . ", quantite = " . $_POST['quantite'] . " where ref = " . $_GET["ref"];
                $stmt = mysqli_prepare($connect, $sql);
                mysqli_stmt_bind_param($stmt, "dii", $_POST['prixu'], $_POST['quantite'], $_GET["ref"]);
                mysqli_stmt_execute($stmt);
                header("location:action_modification.php");
            }
        }
    }
}

mysqli_close($connect);

include 'res/footer.html'; ?>


