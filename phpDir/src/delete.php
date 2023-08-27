<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM books WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: index.php');
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }

    mysqli_close($conn);
}
