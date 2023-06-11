
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
  $author =$_SESSION['username'];
  $content = $_POST["content"];

  // Prepare and execute the SQL statement to insert a new post
  $stmt = $conn->prepare("INSERT INTO posts (author, content) VALUES (:author, :content)");
  $stmt->bindParam(':author', $author);
  $stmt->bindParam(':content', $content);
  $stmt->execute();

  // Redirect back to the forum page after submission
  header("Location: forum.php");
  exit();
}

// Retrieve existing posts from the database
$stmt = $conn->query("SELECT * FROM posts ORDER BY id DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

