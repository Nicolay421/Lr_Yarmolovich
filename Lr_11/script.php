<?php
$servername = "localhost";
$username = "ваш_ім'я_користувача";
$password = "ваш_пароль";
$dbname = "books_database";

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}

// Вибірка всіх книг з бази даних
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Список книг</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Назва</th><th>Автор</th><th>Рік видання</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["title"]."</td><td>".$row["author"]."</td><td>".$row["published_year"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "У базі даних немає жодної книги";
}

$conn->close();
?>
