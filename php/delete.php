<?php
include 'database.php';

if (isset($_GET['table']) && isset($_GET['id'])) {
    $conn = connectDB();

    $table = $_GET['table'];
    $id = $_GET['id'];


    $sql = "DELETE FROM $table WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
?>
