<?php
$host = "db";
$user = "lionUser";
$pass = "lionPass";
$dbname = "lionDB";

$conn = mysqli_connect($host, $user, $pass);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create the database if it doesn't exist
$query = "CREATE DATABASE IF NOT EXISTS lionDB";
if (mysqli_query($conn, $query)) {
    mysqli_select_db($conn, "lionDB");
    $query = "CREATE TABLE IF NOT EXISTS books (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        author VARCHAR(255) NOT NULL
    )";

    if (!mysqli_query($conn, $query)) {
        echo "Error creating table: " . mysqli_error($conn) . "<br>";
    }
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}
