<?php
// подключение к бд
require 'connect-db.php';

// получение данных из формы создания задания
$category = $_POST['category'];
$title = $_POST['title'];
$description = $_POST['description'];
$assigned_to = $_POST['assigned_to'];
$move = $_POST['move'];

// проверка данных на валидность
if (empty($category) || empty($title) || empty($description) || empty($assigned_to) || empty($move)) {
    echo "All fields are required";
    exit;
}

// вставка данных в таблицу заданий
$sql = "INSERT INTO task (category, title, description, assigned_to, move)
        VALUES ('$category', '$title', '$description', '$assigned_to', '$move')";

$result = $conn->query($sql);
if ($result) {
    //сохранение сообщения об успешной отправке в переменной сессии
    session_start();
    $_SESSION['success_message'] = "Task created successfully!";
    header("Location: profile.php");
    exit();
} else {
  echo "Error creating task: " . $conn->error;
}
 
// закрытие соединения с бд
mysqli_close($conn);
?>