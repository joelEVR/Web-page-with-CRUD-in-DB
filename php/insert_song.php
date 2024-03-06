<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = connectDB();

    $title = $_POST['title'];
    $artist_id = $_POST['artist_id'];
    $genre_id = $_POST['genre_id'];


    $sql = "INSERT INTO songs (title, artist_id, genre_id) VALUES ('$title', '$artist_id', '$genre_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New song created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
