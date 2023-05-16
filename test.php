<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Tactical and strategic</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>Тактическо-стратегический редактор для PW</header>
        <nav>
            <ul>
                <li>Здесь осуществляется составление задач</li>
            </ul>
            <button id="search">Найти задачу</button>
        </nav>
        <main>
            <h1>Составьте свою задачу</h1>
            <form action="create-task.php" method="post">
                <label for="title">Название:</label><br>
                <input type="text" id="title" name="title"><br>
                <label for="description">Описание:</label><br>
                <textarea id="description" name="description"></textarea><br>
                <label for="assigned_to">Автор:</label><br>
                <input type="text" id="assigned_to" name="assigned_to"><br>
                <label for="due_date">Дата:</label><br>
                <input type="date" id="due_date" name="due_date"><br><br>
                <input type="submit" value="Создать задачу">
            </form>    
        </main>
        <footer>by kit 2023</footer>
    </body>
</html>