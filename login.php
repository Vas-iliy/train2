<?php
session_start();
$connection = new PDO('mysql:host=localhost; dbname=train2', 'root', 'root');

if ($_POST['login']) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $add = $connection->query("SELECT * FROM registration");
    foreach ($add as $value) {
        if ($value['login'] == $login and $value['password'] == $password) {
            $_SESSION[''];
        } else {
            echo '';
        }
    }
}

?>


<form method="post">
    <input type="login" name="login" required placeholder="Логин"> </br>
    <input type="password" name="password" required placeholder="Пароль"> </br>
    <input type="submit"> </br>
</form>
