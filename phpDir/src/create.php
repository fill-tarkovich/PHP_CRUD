<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];

    $sql = "INSERT INTO books (title, author) VALUES ('$title', '$author')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: index.php');
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }

    mysqli_close($conn);
}
