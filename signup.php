<?php
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

// Retrieve the submitted form data
$name = $_POST['signupName'];
$username = $_POST['signupUsername'];
$phoneNumber = $_POST['signupPhoneNumber'];
$email = $_POST['signupEmail'];
$password = $_POST['signupPassword'];

// Validate if the username and email are unique
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Username or email already exists
    echo "Username or email already exists";
    exit;
}

// Prepare a SQL statement to insert the new user into the database
$stmt = $conn->prepare("INSERT INTO users (name, username, phone, email, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $username, $phoneNumber, $email, $password);
$stmt->execute();

// Check if the insertion was successful
if ($stmt->affected_rows > 0) {
    // Signup successful
    $_SESSION['username'] = $username;
    $_SESSION['initial'] = strtoupper(substr($username, 0, 1));
    echo 'success';

} else {
    // Signup failed
    echo "Signup failed";
}

// Close the database connection
$stmt->close();
$conn->close();
?>
