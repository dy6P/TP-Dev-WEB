<?php
session_start();
if (!isset($_SESSION["user"])) {
    header('Location: action_deconnexion.php');
}
include('ressources/head.php');
?>
<main>
    <h2>XML</h2>
    <h3>Liste des produits</h3>
    <table>
        <thead>
            <tr>
                <th>nom</th>
                <th>origine</th>
                <th>prix_unitaire</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $xml = simplexml_load_file('data/commerce.xml');
            foreach ($xml->children() as $categorie) {
                foreach ($categorie->children() as $produit) {
                    echo "<tr>";
                    echo "<td>" . $produit->nom . "</td>";
                    echo "<td>" . $produit->origine . "</td>";
                    echo "<td>" . $produit->prix_unitaire . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</main>
<?php include('ressources/footer.html'); ?>
