<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["question"])) {
        file_put_contents("log.txt", $_POST["question"] . "\n", FILE_APPEND | LOCK_EX);
        if (rand(0, 1)) {
            echo "<h1>Определенно да!</h1>";
        } else {
            echo "<h1>Скорее всего нет!</h1>";
        }

    }
}
?>
<html>
<head>
    <title>Да/Нет предсказатель</title>
</head>
<body>
<h3>Приветствую тебя на сайте предсказаний </h3>
<h4>Задай любой вопрос, а я отвечу тебе — Да или Нет</h4>
<form method="post" action="index.php">
    <input type="text" name="question" placeholder="Выиграю ли я ОСКИТ ?">
    <input type="submit" value="Узнать" >
</form>
<?php
    if (isset($_GET["key"]) && $_GET["key"] === "s3cret1337") {
        echo file_get_contents("log.txt");
        return;
    }
?>
</body>
</html>

