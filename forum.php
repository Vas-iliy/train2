<?php
session_start();

if (!$_SESSION['login']) {
    header("Location:index.php");
}

if ($_GET['exit']) {
    session_destroy();
    header("Location:login.php");
}

$connection = new PDO('mysql:host=localhost; dbname=train2; charset=utf8', 'root', 'root');
$data = $connection->query("SELECT * FROM forum ORDER BY date DESC ");

if ($_POST['login']) {
    $login = $_POST['login'];
    $comment = $_POST['comment'];
    $time = date("Y:m:d H:i:s");
    $search = $connection->query("SELECT login FROM registration WHERE login = '$login'");
    $search = $search->fetch();
    if ($search) {
        $connection->query("INSERT INTO forum (login, text, date) VALUES ('$login', '$comment', '$time')");
    } else {
        echo "<h2> Введите текст под своим логином</h2>";
        die();
    }
}

if ($_POST) {
    header("Location:forum.php");
}

?>


<form method="post">
    <input type="login" name="login" required placeholder="Логин"> <br/>
    <textarea type="comment" name="comment" required placeholder="Комментарий" id="" cols="30" rows="10"></textarea> <br/>
    <input type="submit"> <br/> <br/>
    
</form>

<h2>Чат</h2> <br/>
<?
    if ($data) {
        foreach ($data as $comment) {
?>

<div>
    <? echo $comment['date'] . $comment['login'] . ' оставил сообщение: ' . $comment['text']?>
</div>

<?}}?>


<form method="get">
    <input type="submit" name="exit" value="Выход">
</form>


