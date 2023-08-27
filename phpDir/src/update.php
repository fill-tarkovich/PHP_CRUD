<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM books WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo 'Book not found.';
        exit();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];

    $sql = "UPDATE books SET title = '$title', author = '$author' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: index.php');
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Book</title>
</head>

<body>
    <div class="container">
        <h1>Edit Book</h1>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="title" placeholder="Title" value="<?php echo $row['title']; ?>" required>
            <input type="text" name="author" placeholder="Author" value="<?php echo $row['author']; ?>" required>
            <button type="submit">Update Book</button>
        </form>
    </div>
</body>

</html>