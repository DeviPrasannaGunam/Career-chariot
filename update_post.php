<?php
include('homeq.php');

// Your database connection code (you can reuse the existing connection code)
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "careerc";

// Create a new PDO instance
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST["postId"];
    $content = $_POST["updatedContent"];

    // Prepare and execute the SQL statement to update the post
    $stmt = $conn->prepare("UPDATE posts SET content = :content WHERE id = :post_id");
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':post_id', $post_id);
    $stmt->execute();

    // Redirect back to the forum page after updating
    header("Location: profile.php");
    exit();
}
?>
