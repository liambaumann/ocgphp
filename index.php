<?php
include 'db.php';

$sql = "SELECT id, title, author, year_published FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Library</title>
</head>
<body>
    <h2>Book Library</h2>
    <a href="add_book.php">Add a new book</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year Published</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["title"]. "</td><td>" . $row["author"]. "</td><td>" . $row["year_published"]. "</td><td><a href='update_book.php?id=" . $row["id"]. "'>Edit</a> | <a href='delete_book.php?id=" . $row["id"]. "'>Delete</a></td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No books found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
