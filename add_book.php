<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year_published = $_POST['year_published'];

    $sql = "INSERT INTO books (title, author, year_published) VALUES ('$title', '$author', '$year_published')";

    if ($conn->query($sql) === TRUE) {
        echo "New book added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h2>Add a new book</h2>
    <form method="post" action="add_book.php">
        Title: <input type="text" name="title"><br>
        Author: <input type="text" name="author"><br>
        Year Published: <input type="text" name="year_published"><br>
        <input type="submit" value="Add Book">
    </form>
    <a href="index.php">Back</a>
</body>
</html>
