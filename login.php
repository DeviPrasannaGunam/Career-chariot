<?php
session_start();

    
// Assuming you have a MySQL database setup with appropriate credentials
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "careerc";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the submitted username and password from the form
$username = $_POST['loginUsername'];
$password = $_POST['loginPassword'];

// Prepare a SQL statement to check if the username and password match a record in the database
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

// Fetch the result
$result = $stmt->get_result();

// Check if a row is returned, indicating a successful login
if ($result->num_rows == 1) {
    // Login successful// ...
    
    $_SESSION['username'] = $username;
    $_SESSION['initial'] = strtoupper(substr($username, 0, 1));
    echo 'success';

} else {
    // Login failed
    echo "Invalid username or password";
}

// Close the database connection
$stmt->close();
$conn->close();
?>
