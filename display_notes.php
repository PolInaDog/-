<?php
// параметры подключения к базе данных 
$host = "localhost"; //хост базы данных
$username = "root"; //Имя пользователя БД
$password = ""; //Пароль пользователя БД
$database = "notes"; //Имя базы данных

// создать подключение к базеданных

$mySQL = new mysqli($host, $username, $password, $database);

// Проверка на ошибки подключения
if ($mySQL->connect_error) {
    die("Ошибка подключения :" . $mySQL->connect_error);
}

// обработка добавления данных

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    $name = $_POST['name'];
    $category = $_POST['category'];
    // Вставить данные в таблицу
    $query = "INSERT INTO test (name, category) VALUES (? , ?)";

    // ПОдготовка запроса 
    $str = $mySQL->prepare($query);

    // Привязка переменных
    $str->bind_param("ss", $name, $category);

    // Выполнгение подготовленнного запроса 
    if ($str->execute()) {
        echo "Добавленно!";
        header("Location: index.php");
        exit();
    } else {
        echo "Ошибка добавления:" . $str->error;
    }
    $mySQL->close();
}

// вывод данных из таблицы 
$query = "SELECT id, name, category FROM test";
$result = $mySQL->query($query);

// если что-то сохранено в таблице БД - выодим

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["category"] . "</td>";
        echo "<td>
          <form action='delete_notes.php' method = 'GET'>
           <button class = 'btn' type = 'submit' name = 'remove'> Удалить </button>
         </form>
         </td>";
        echo "</tr>";
    }
}
