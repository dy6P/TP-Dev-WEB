<?php
session_start();
if (!isset($_SESSION["user"])) {
    header('Location: action_deconnexion.php');
}
include('ressources/head.php');
?>
<main>
    <h2>CSV</h2>
    <h3>Liste des produits</h3>
    <table>
        <?php
        $lignes = file('data/produits.csv');
        $compteur = 0;
        foreach ($lignes as $ligne) {
            $colonnes = str_getcsv($ligne);
            echo "<tr>";
            foreach ($colonnes as $info) {
                if ($compteur == 0) {
                    echo "<th>" . $info . "</th>";
                } else {
                    echo "<td>" . $info . "</td>";
                }
            }
            echo "</tr>";
            $compteur++;
        }
        ?>
    </table>
</main>
<?php include('ressources/footer.html'); ?>