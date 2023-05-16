<?php
// Подключаемся к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "task_field";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Получаем данные из формы создания задания
$title = $_POST['title'];
$description = $_POST['description'];
$assigned_to = $_POST['assigned_to'];
$due_date = $_POST['due_date'];

// Проверяем данные на валидность
if (empty($title) || empty($description) || empty($assigned_to) || empty($due_date)) {
    echo "All fields are required";
    exit;
}

// Вставляем данные в таблицу заданий
$sql = "INSERT INTO task (title, description, assigned_to, due_date)
        VALUES ('$title', '$description', '$assigned_to', '$due_date')";
if (mysqli_query($conn, $sql)) {
    echo "Task created successfully";
} else {
    echo "Error creating task: " . mysqli_error($conn);
}

// Закрываем соединение с базой данных
mysqli_close($conn);
?>
