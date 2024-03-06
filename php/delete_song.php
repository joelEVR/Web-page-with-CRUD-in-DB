<?php
include 'database.php';

if (isset($_GET['id'])) {
    $conn = connectDB();

    $id = $_GET['id'];


    $sql = "DELETE FROM songs WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Song deleted successfully";
    } else {
        echo "Error deleting song: " . $conn->error;
    }

    $conn->close();
}
?>
