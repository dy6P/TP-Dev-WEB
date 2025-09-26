<?php include 'res/header.html'; ?>
<title>Lecture</title>
</head>
<body>

<?php

$filename = "data/data.csv";

echo "<form action='res/action.php' method='post'>
        <label for='FirstName'>First name</label>
        <input type='text' name='FirstName' id='FirstName'>
        <label for='Name'>Name</label>
        <input type='text' name='Name' id='Name'>
        <label for='Mail'>Mail</label>
        <input type='text' name='Mail' id='Mail'>
        <input type='submit' value='Valider'>
      </form><br><br>";

include_once('res/debug.php');
$fp = fopen($filename, 'r');
echo "<table>";
while($resultat=fgetcsv($fp, 1024, ",")) {
    echo "<tr>";
    foreach ($resultat as $value) {
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

fclose($fp);
include 'res/footer.html';
?>