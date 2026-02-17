<?php
session_start();
include('ressources/head.html');
include('actions/action_affichage.php');
?>
<main>
    <fieldset>
        <legend>Ajouter une salle</legend>
        <?php include('ressources/ajout.html'); ?>
    </fieldset>
    <fieldset>
        <legend>Modifier une salle</legend>
        <?php include('ressources/modification.html'); ?>
    </fieldset>
    <fieldset>
        <legend>Supprimer une salle</legend>
        <?php include('ressources/suppression.html'); ?>
    </fieldset>
</main>
<?php
include('ressources/footer.html');
