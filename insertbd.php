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

    echo "<form action='' method='post'>
        <label for='login'>login</label>
        <input type='text' name='login' id='login'>
        <label for='password'>password</label>
        <input type='password' name='password' id='password'>
        <label for='bureau'>bureau</label>
        <input type='text' name='bureau' id='bureau'>
        <input type='submit' value='Valider'>
      </form><br><br>";

    if(isset($_POST['login'], $_POST['bureau'], $_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $bureau = $_POST['bureau'];
        $base = mysqli_select_db($connect, $db);
        if (!$base) {
            echo "erreur";
        } else {
            echo "ok bd<br>";
            $sql = "insert into users (login, password, bureau) values (?,?,?)";
            $stmt = mysqli_prepare($connect, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $login, $password, $bureau);
            if (mysqli_stmt_execute($stmt)) {
                echo "insertion ok<br>";
            }
            else {
                echo "erreur";
            }
        }
    }
}