<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Tactical and strategic</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        session_start();
        // проверка, есть ли сообщение об успешной отправке в переменной сессии
        if (isset($_SESSION['success_message'])) {
          // если есть, вывод сообщения и удаления переменной сессии
          echo "<p>" . $_SESSION['success_message'] . "</p>";
          unset($_SESSION['success_message']);
        }
        ?>

        <header>Тактическо-стратегический редактор для PW</header>
        <nav>
            <ul>
                <li><a href="index.html">Добавить задачу</a></li>
                <li>Здесь находятся уже составленные задачи с загруженной картой и пикчами</li>
            </ul>
            <button id="search">Найти задачу</button>
        </nav>
        <main>
            <article id="strategy_block">
                <section class="task_title">Постановка стретегических задач</section>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "task_field";
                $conn = mysqli_connect($servername, $username, $password, $dbname);

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

                    if ($category == "1"){
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
                $conn->close();
                ?>
                <!--
                <section class="task_title">Постановка стретегических задач</section>
                <section class="task">Первая задача</section>
                <section class="task">Вторая задача</section>
                <section class="task">Третья задача</section>
                <section class="task">Четвертая задача</section>
                <section class="task">Пятая задача</section>
                -->
            </article>
            <div id="map_tactics_pics_div">
                <aside>блок виджета загрузки карты</aside>
                <div id="picture_div">
                    <img src="img/picture-human.jpg" width="120" height="170" alt="human">
                    <img src="img/picture-lfy.jpg" width="120" height="170" alt="lfy">
                    <img src="img/picture-mech.jpg" width="120" height="170" alt="mech">
                </div>
                <article id="tactics_block">
                    <section class="task_title">Постановка тактических задач</section>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "root";
                    $dbname = "task_field";
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
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
                    $conn->close();
                    ?>
                    <!--
                    <section class="task">Первая задача</section>
                    <section class="task">Вторая задача</section>
                    <section class="task">Третья задача</section>
                    -->
                </article>
            </div>
        </main>
        <footer>by kit 2023</footer>
    </body>
</html>