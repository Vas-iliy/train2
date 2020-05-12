<?php
$connection = new PDO('mysql:host=localhost; dbname=train2', 'root', 'root');

if ($_POST['login']) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $add = $connection->query("INSERT INTO registration (login, password) VALUES ('$login', '$password')");

    if ($add) {
        echo "<h2 style='color:green'>Войдите на сайт</h2>";
    } else {
        echo "<h2 style='color: crimson'>Такой логин уже существует</h2>";
    }
}

if ($_POST) {
    header("Locations:index.php");
}

if ($_GET['go']) {
    header("Locations:login.php");
}

?>


<form method="post">
    <input type="login" name="login" required placeholder="Логин"> <br>
    <input type="password" name="password" required placeholder="Пароль"> <br/>
    <input type="submit" value="Зарегестрироваться"> <br>
</form>

<form method="get">
    <input type="submit" name="go" value="Войти">
</form>