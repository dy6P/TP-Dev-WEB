<?php include 'res/header.html'; ?>
<title>Test BD</title>
</head>
<body>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "student";
$connect = mysqli_connect($host, $user, $pass);
if (!$connect) {
    echo "erreur";
}
else {
    $base = mysqli_select_db($connect, $db);
    if (!$base) {
        echo "erreur";
    }
    else {
        echo "ok bd<br><br>";
        $sql = "SELECT * FROM users";
        $result = mysqli_query($connect, $sql);
        echo "<table>";
        echo "<tr>";
        echo "<th>login</th>";
        echo "<th>password</th>";
        echo "<th>bureau</th>";
        echo "</tr>";
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row["login"]."</td>";
                echo "<td>".$row["password"]."</td>";
                echo "<td>".$row["bureau"]."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }
}

mysqli_close($connect);

include 'res/footer.html'; ?>

