<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CRUD App</title>
</head>

<body>
    <div class="container">
        <h1>CRUD App</h1>
        <form action="create.php" method="POST">
            <input type="text" name="title" placeholder="Title" required>
            <input type="text" name="author" placeholder="Author" required>
            <button type="submit">Add Book</button>
        </form>
        <hr>
        <h2>Book List</h2>
        <?php include 'read.php'; ?>
    </div>
</body>

</html>