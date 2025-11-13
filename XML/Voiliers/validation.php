<?php
$dom = new DOMDocument();
$dom -> load("voiliers.xml");
if ($dom -> validate()) {
    echo "Ce document XML est valide !";
}
