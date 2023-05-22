<?php
require 'connect-db.php';
$sql = "SELECT * FROM task";
$result = $conn->query($sql);

// вывод списка заданий
while ($row = $result->fetch_assoc()) {
    // заполнение полей формы значениями из бд
    $category = $row['category'];
    $title = $row['title'];
    $description = $row['description'];
    $assigned_to = $row['assigned_to'];
    $move = $row['move'];
    if ($category == "2"){
        echo "
            <form class='task'>
                <label for='category'>Категория:</label>
                <input type='text' name='category' value='$category' disabled>
                <br>
                <label for='title'>Название:</label>
                <input type='text' name='title' value='$title' disabled>
                <br>
                <label for='description'>Описание:</label>
                <textarea name='description' disabled>$description</textarea>
                <br>
                <label for='assigned_to'>Каким юнитом:</label>
                <input type='text' name='assigned_to' value='$assigned_to' disabled>
                <br>
                <label for='move'>На какой ход:</label>
                <input type='text' name='move' value='$move' disabled>
                <br>
            </form>
            <hr>
        ";
    }
}
?>