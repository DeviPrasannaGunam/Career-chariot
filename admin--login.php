<?php
session_start();

$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "careerc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password']; // Assuming the password field name is 'password' in your HTML form

$stmt = $conn->prepare("SELECT * FROM user WHERE name = ?");
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($password == '1234a') {
        $_SESSION['username'] = $username;
        echo 'success';
    } else {
        echo 'Invalid password';
    }
} else {
    echo "Invalid username";
}

$stmt->close();
$conn->close();
?>
