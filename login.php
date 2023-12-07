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
$stmt = $conn->prepare("SELECT user_id, username FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

// Fetch the result
$result = $stmt->get_result();

// Check if a row is returned, indicating a successful login
if ($result->num_rows == 1) {
    // Login successful

    // Retrieve user_id and username from the result
    $row = $result->fetch_assoc();
    $user_id = $row['user_id'];
    $user_name = $row['username'];

    // Store user_id and user_name in session variables
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $user_name;
    $_SESSION['initial'] = strtoupper(substr($user_name, 0, 1));

    echo 'success';
} else {
    // Login failed
    echo "Invalid username or password";
}

// Close the database connection
$stmt->close();
$conn->close();
?>
