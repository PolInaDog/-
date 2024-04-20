<?php
// параметры подключения к базе данных 
$host = "localhost"; //хост базы данных
$username = "root"; //Имя пользователя БД
$password = ""; //Пароль пользователя БД
$database = "test"; //Имя базы данных

// создать подключение к базеданных

$mySQL = new mysqli($host, $username, $password, $database);

// Проверка на ошибки подключения
if ($mySQL->connect_error) {
    die("Ошибка подключения :" . $mySQL->connect_error);
}

// проверяем если в массиве есть данные с ключом id то 
// экранируем данные хранящиеся под ключом id
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    // создаём заппрос на удаление
    $query = "DELETE FROM tas WHERE id = '$id'";
    // проверяем что запрос выполнен успешно
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo 'Задача удалена';
    }
}

// закрываем соединение
mysqli_close($connection);
