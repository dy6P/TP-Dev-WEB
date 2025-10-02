<?php
include("res/header.html");
include("res/login.html");
if (isset($_GET['error'])) {
    echo "<p>Vous n'êtes pas connecté.</p>";
}
include("res/footer.html");