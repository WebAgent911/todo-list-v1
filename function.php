<?php

function debug ($str) {
    echo '<pre>';
    var_dump($str);
    echo '</pre>';
    exit();
}

function my_connect_on () {
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
    if (!$conn) {
        exit('Ошибка подключения: ' . mysqli_connect_error());
    }
    return $conn;
}

function my_insert ($conn, $task) {
    $sql = "INSERT INTO `todo` (task) VALUES ('$task')";
    $result = mysqli_query($conn, $sql);
}

function my_select ($conn) {
    $sql = "SELECT * FROM `todo`";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $i++;
            echo $i . ' ' . $row['task'] . ' ';
            echo "<a href='?id=".$row['id']."'>Удалить</a>";
            echo '<br>';
        }
    }
    else {
        echo 'Список задач пуст';
    }
}

function my_delete ($conn, $id) {
    $sql = "DELETE FROM `todo` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
}