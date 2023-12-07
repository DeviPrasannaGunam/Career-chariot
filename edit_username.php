<?php
session_start();

// Your database connection code
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "careerc";

// Create a new PDO instance
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Retrieve user information from the database based on the session user_id
$user_id = $_SESSION['user_id'];
$userStmt = $conn->prepare("SELECT * FROM users WHERE user_id = :user_id");
$userStmt->bindParam(':user_id', $user_id);
$userStmt->execute();
$user = $userStmt->fetch(PDO::FETCH_ASSOC);

// Retrieve the new username from the form
$newUsername = $_POST['newUsername'];

// Check if the new username already exists in the database
$checkUsernameStmt = $conn->prepare("SELECT * FROM users WHERE username = :newUsername AND user_id != :user_id");
$checkUsernameStmt->bindParam(':newUsername', $newUsername);
$checkUsernameStmt->bindParam(':user_id', $user_id);
$checkUsernameStmt->execute();

if ($checkUsernameStmt->rowCount() > 0) {
    // The new username already exists
    echo 'Username already exists. Please choose a different one.';
} else {
    // Update the username in the database
    $updateStmt = $conn->prepare("UPDATE users SET username = :newUsername WHERE user_id = :user_id");
    $updateStmt->bindParam(':newUsername', $newUsername);
    $updateStmt->bindParam(':user_id', $user_id);
    $updateStmt->execute();

    echo 'Username updated successfully.';
}
$_SESSION['username']=$newUsername;

// Close the database connection
$conn = null;
?>
