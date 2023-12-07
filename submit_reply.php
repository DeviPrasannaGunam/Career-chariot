
<?php
session_start();
?>
<?php
// ... (database connection code, similar to submit_post.php)
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "careerc";

// Create a new PDO instance
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST["post_id"];
    $author = $_SESSION['user_id'];
    $content = $_POST["content"];
  
    // Prepare and execute the SQL statement to insert a new reply
    $stmt = $conn->prepare("INSERT INTO replies (post_id, user_id, content) VALUES (:post_id, :author, :content)");
    $stmt->bindParam(':post_id', $post_id);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':content', $content);
    $stmt->execute();
  
    // Redirect back to the forum page after submission
    header("Location: forum.php");
    exit();
  }
  ?>