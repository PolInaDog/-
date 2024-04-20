<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заметки</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ojuju:wght@200..800&family=Yanone+Kaffeesatz:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Добавить заметку</h1>
    <form action="display_notes.php" method="post">
        <label>
            <span class="title-input">Название</span>
            <input type="text" id="name" name="name" required>
        </label>
        <label>
            <span class="title-input">Категория</span>
            <select name="category" id="category">
                <option value="Книга">Книга</option>
                <option value="Мультфильм">Мультфильм</option>
                <option value="Фильм">Фильм</option>
            </select> <br>
        </label>
        <button class="btn" type="submit">Добавить</button>
    </form>
    <form action="display_notes.php" method="post">
        <button lass='btn' type='submit' name='remove'> Удалить</button>
    </form>
    <h2>Заметки</h2>
    <table class="table">
        <tr class="table_header">
            <th>Название</th>
            <th>Категория</th>
        </tr>
        <?php include 'display_notes.php' ?>
    </table>
    <script src="js/script.js"></script>
</body>

</html>