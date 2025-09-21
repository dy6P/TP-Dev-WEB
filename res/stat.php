<?php

function moyenne ($x, $n) {
    $somme1 = 0;
    $somme2 = 0;
    for ($i = 0; $i < count($x); $i++) {
        $somme1 += $x[$i] * $n[$i];
        $somme2 += $n[$i];
    }
    return $somme1 / $somme2;
}

function variance($x, $n) {
    $x_carre = [];
    for ($i = 0; $i < count($x); $i++) {
        $x_carre[$i] = $x[$i] ** 2;
    }
    return moyenne($x_carre, $n) - (moyenne($x, $n) ** 2);
}

function ecart_type($x, $n) {
    return sqrt(variance($x, $n));
}
