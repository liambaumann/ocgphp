<?php

include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year_published = $_POST['year_published'];

    $sql = "UPDATE books SET title='$title', author='$author', year_published='$year_published' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Book updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Book</title>
</head>
<body>
    <h2>Update Book</h2>
    <form method="post" action="update_book.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Title: <input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
        Author: <input type="text" name="author" value="<?php echo $row['author']; ?>"><br>
        Year Published: <input type="text" name="year_published" value="<?php echo $row['year_published']; ?>"><br>
        <input type="submit" value="Update Book">
    </form>
    <a href="index.php">Back</a>
</body>
</html>
