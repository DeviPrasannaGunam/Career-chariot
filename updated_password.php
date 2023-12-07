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

// Retrieve the current and new passwords from the form
$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];

// Verify the current password
if (!password_verify($currentPassword, $user['password'])) {
    // Current password is incorrect
    echo 'Incorrect current password. Please try again.';
} else {
    // Check the validity of the new password
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $newPassword)) {
        // Password does not meet criteria (at least 8 characters, one uppercase letter, one lowercase letter, and one number)
        echo 'Invalid password. Please choose a password with at least 8 characters, including at least one uppercase letter, one lowercase letter, and one number.';
    } else {
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the hashed password in the database
        $updateStmt = $conn->prepare("UPDATE users SET password = :hashedPassword WHERE user_id = :user_id");
        $updateStmt->bindParam(':hashedPassword', $hashedPassword);
        $updateStmt->bindParam(':user_id', $user_id);
        $updateStmt->execute();

        echo 'Password updated successfully.';
    }
}

// Close the database connection
$conn = null;
?>
