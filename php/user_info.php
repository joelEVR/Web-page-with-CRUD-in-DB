<?php
// Start the session at the beginning of the script
session_start();

// Database connection parameters
$servername = "localhost";
$username = "tunehubadmin";
$password = "password";
$dbname = "tunehub";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize action and error variables
$action = isset($_POST['action']) ? $_POST['action'] : '';
$error = '';

// Process POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($action == 'login') {
        // Prepare a statement for login
        $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the user exists
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verify password
            if (password_verify($password, $row['password'])) {
                // Set session variable and redirect to page2
                $_SESSION['user_logged_in'] = true;
                header("Location: page2.php");
                exit();
            } else {
                // Set error message for incorrect password
                $error = "Incorrect password";
            }
        } else {
            // Set error message if email is not registered
            $error = "Email not registered";
        }
        $stmt->close();
    } elseif ($action == 'register') {
        // Check if the email is already registered
        $checkEmailStmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $checkEmailStmt->bind_param("s", $email);
        $checkEmailStmt->execute();
        $emailResult = $checkEmailStmt->get_result();
        $checkEmailStmt->close();

        // If email already exists, set error message
        if ($emailResult->num_rows > 0) {
            $error = "Email is already registered";
        } else {
            // If email is not registered, insert new user
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $email, $hashedPassword);

            if ($stmt->execute()) {
                // Redirect to page2 on successful registration
                header("Location: page2.php");
                exit();
            } else {
                // Set error message on registration failure
                $error = "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
}

// Close the database connection
$conn->close();

// Redirect back to the login form if there is an error
if (!empty($error)) {
    header("Location: ../index.html?error=" . urlencode($error));
    exit();
}
?>