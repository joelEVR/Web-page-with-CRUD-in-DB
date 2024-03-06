<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = connectDB();

    $table = $_POST['table'];
    $name = $_POST['name'];
    $description = $_POST['description'];


    $sql = "INSERT INTO $table (name, description) VALUES ('$name', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
