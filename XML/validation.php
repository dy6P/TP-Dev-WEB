<?php
$dome = new DOMDocument();
$dome -> load("voiliers.xml");
if ($dome -> validate()) {
    echo "Ce document XML n'est pas valide !";
}
