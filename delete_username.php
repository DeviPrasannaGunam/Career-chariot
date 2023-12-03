<?php
// Database connection details
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "careerc";

// Check if the admin ID is provided in the URL parameter
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Create a database connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Delete the admin from the datatable
  $sql = "DELETE FROM user WHERE id = $id";
  if ($conn->query($sql) === TRUE) {
    echo "Admin deleted successfully.";
  } else {
    echo "Error deleting admin: " . $conn->error;
  }

  $conn->close();
} else {
  echo "Invalid admin ID.";
}
?>
