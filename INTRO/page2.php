<?php
$a = 5;
$b = "5";
if ($a == $b){
    echo "<p>valeurs égales</p>";
} else {
    echo "<p>inégales</p>";
}

if ($a === $b){
    echo "<p>valeur et type égaux</p>";
} else {
    echo "<p>inégaux</p>";
}
