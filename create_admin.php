<?php
// Database connection details
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "careerc";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the submitted form data
  $name = $_POST["name"];
  $email = $_POST["email"];

  // Prepare and execute the SQL statement to insert a new admin
  $stmt = $conn->prepare("INSERT INTO user (name, email) VALUES (?, ?)");
  $stmt->bind_param("ss", $name, $email);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    // Redirect back to the same page with a success message
    header("Location: ".$_SERVER['PHP_SELF']."?success=true");
    exit;
  } else {
    echo "Failed to create admin.";
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title> Website - Admins</title>
  <style>
    /* Add your desired CSS styles here */
  </style>
</head>
<body>
  <h1>Create Admin</h1>
  <?php
  // Display success message if redirected with success parameter
  if (isset($_GET['success']) && $_GET['success'] == "true") {
    echo "<p>Admin created successfully.</p>";
  }
  ?>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required><br><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br><br>
    <input type="submit" value="Create Admin">
  </form>

  <?php
  // Existing PHP code here...
  ?>
</body>
</html>
