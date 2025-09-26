<?php
$fp = fopen("../data/data.csv", 'a');
if(isset($_POST['FirstName'], $_POST['Name'], $_POST['Mail'])) {
    $firstName = $_POST['FirstName'];
    $name = $_POST['Name'];
    $mail = $_POST['Mail'];
    if(!($firstName == '' || $name == '' || $mail == '')) {
        fputcsv($fp, array($firstName, $name, $mail));
    }
    fclose($fp);
}
header("location:../lecture.php");
