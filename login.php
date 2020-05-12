<?php
session_start();
$connection = new PDO('mysql:host=localhost; dbname=train2; charset=utf8', 'root', 'root');

if ($_POST['login']) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $arr = [];
    $add = $connection->query("SELECT * FROM registration");
    foreach ($add as $value) {
        if ($value['login'] == $login and $value['password'] == $password) {
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            header("Location:forum.php");
        } //тут идет проверка на логин и пароль
        else {
            array_push($arr, 0);
        }
    }

    //тут идет проверка на логин и пароль
    $arr1 = array_fill(0, count($arr), 0);
    $result = array_diff($arr, $arr1);
    if (!$result) {
        echo "<h2 style='color: red'>Неверный логин или пароль</h2>";
    }

}

?>


<form method="post">
    <input type="login" name="login" required placeholder="Логин"> </br>
    <input type="password" name="password" required placeholder="Пароль"> </br>
    <input type="submit"> </br>
</form>
