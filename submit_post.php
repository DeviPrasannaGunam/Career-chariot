<?php
session_start();
?>
<?php
// Database connection details
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "careerc";

// Create a new PDO instance
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the user_id from the session
  $user_id = $_SESSION['user_id'];
  $content = $_POST["content"];

  // Prepare and execute the SQL statement to insert a new post
  $stmt = $conn->prepare("INSERT INTO posts (user_id, content) VALUES (:user_id, :content)");
  $stmt->bindParam(':user_id', $user_id);
  $stmt->bindParam(':content', $content);
  $stmt->execute();

  // Redirect back to the forum page after submission
  header("Location: forum.php");
  exit();
}

// Retrieve existing posts from the database
$stmt = $conn->query("SELECT * FROM posts ORDER BY post_id DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
