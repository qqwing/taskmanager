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
                //подключение к файлу заполнения форм данными из бд
                require 'filling-out-forms-strategy.php';
                $conn->close();
                ?>
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
                    //подключение к файлу заполнения форм данными из бд
                    require 'filling-out-forms-tactics.php';
                    $conn->close();
                    ?>
                </article>
            </div>
        </main>
        <footer>picwars 2023</footer>
    </body>
</html>