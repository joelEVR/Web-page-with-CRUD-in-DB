<?php
// Function to establish database connection
function connectDB()
{
    $servername = "localhost";
    $username = "tunehubadmin";
    $password = "password";
    $dbname = "tunehub";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Function to fetch data from a table
function fetchData($table)
{
    $conn = connectDB();

    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);
    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();
    return $data;
}
?>