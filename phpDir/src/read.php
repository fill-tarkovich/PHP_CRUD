<?php
include 'db_config.php';

$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo 'Error fetching data: ' . mysqli_error($conn);
} else {
    if (mysqli_num_rows($result) > 0) {
        echo '<ul>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li>';
            echo '<strong>Title:</strong> ' . $row['title'] . ', <strong>Author:</strong> ' . $row['author'];
            echo ' <a href="update.php?id=' . $row['id'] . '">Edit</a>';
            echo ' <a href="delete.php?id=' . $row['id'] . '">Delete</a>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo 'No books found.';
    }
}

mysqli_close($conn);
