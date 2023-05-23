<?php
//обработка запроса об удалении таска
if (isset($_POST['delete_task'])) {
    $task_id = $_POST['delete_task'];
    $delete_sql = "DELETE FROM task WHERE id = $task_id";
    $delete_result = $conn->query($delete_sql);
    
    if ($delete_result) {
        echo "<p>Задание успешно удалено.</p>";
        header("Location: profile.php");
    } else {
        echo "<p>Ошибка при удалении задания: " . $conn->error . "</p>";
    }
}
?>