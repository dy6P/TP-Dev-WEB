<?php
session_start();
if (!isset($_SESSION["user"])) {
    header('Location: action_deconnexion.php');
}
include('ressources/head.php');
?>
<main>
    <h2>JSON</h2>
    <h3>Liste des produits</h3>
    <table>
        <tbody>
        <?php
        $json_data = file_get_contents('data/data.json');
        $produits_array = json_decode($json_data, true);
        $categories = array_keys($produits_array);
        foreach ($categories as $categorie) {
            $liste_produits = $produits_array[$categorie];
            echo "<tr>";
            echo "<th colspan='3'>" . $categorie . "</th>";
            echo "</tr>";
            echo "<tr class='sub-header'>";
            echo "<th>Nom</th>";
            echo "<th>Origine</th>";
            echo "<th>Prix</th>";
            echo "</tr>";
            foreach ($liste_produits as $produit) {
                echo "<tr>";
                echo "<td>" . $produit['nom'] . "</td>";
                echo "<td>" . $produit['origine'] . "</td>";
                echo "<td>" . $produit['prix_unitaire'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
</main>
<aside>
    <fieldset>
        <legend>Ajouter un produit</legend>
        <?php include('ressources/ajout.html'); ?>
    </fieldset>
</aside>
<?php include('ressources/footer.html'); ?>

