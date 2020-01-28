<?php
require_once 'config.php';

$conn = my_connect_on();

if (isset($_POST['submit']) && !empty($_POST['task'])) {
    $task = $_POST['task'];
    $task = trim($task);
    $task = htmlspecialchars($task);
    $task = mb_strtolower($task);
    $task = ucfirst($task);
    my_insert($conn, $task);
    header('Location: /');
}

$id = $_GET['id'];

if (isset($id)) {
    my_delete ($conn, $id);
    header('Location: /');
}

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список дел</title>
</head>
<body>
<form action="index.php" method="post">
    <p>Список дел на сегодня:</p>
    <input type="text" name="task" placeholder="Введите задачу">
    <input type="submit" name="submit" value="Добавить">
</form>
<br>
<?php

my_select($conn);

mysqli_close($conn);

?>
</body>
</html>