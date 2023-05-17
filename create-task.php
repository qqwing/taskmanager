<?php
// подключение к бд
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "task_field";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// получение данных из формы создания задания
$category = $_POST['category'];
$title = $_POST['title'];
$description = $_POST['description'];
$assigned_to = $_POST['assigned_to'];
$move = $_POST['move'];
//$due_date = $_POST['due_date'];

// проверка данных на валидность
if (empty($category) || empty($title) || empty($description) || empty($assigned_to) || empty($move)) {
    echo "All fields are required";
    exit;
}

// вставка данных в таблицу заданий
$sql = "INSERT INTO task (category, title, description, assigned_to, move)
        VALUES ('$category', '$title', '$description', '$assigned_to', '$move')";
if (mysqli_query($conn, $sql)) {
    echo "Task created successfully";
} else {
    echo "Error creating task: " . mysqli_error($conn);
}

// закрытие соединения с базой данных
mysqli_close($conn);
?>
