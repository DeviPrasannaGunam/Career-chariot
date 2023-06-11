<?php
// Get the ID from the AJAX request
$id = $_POST['id'];

// Perform the deletion in the database using PHP and SQL

// Example code for deleting from a database table named 'datatable'
// Replace the following code with your actual deletion logic

// Create a database connection
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "careerc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Delete the data with the specified ID from the 'datatable' table
$sql = "DELETE FROM depts WHERE id = $id";

if ($conn->query($sql) === TRUE) {
  // Deletion successful
  echo "Data deleted successfully";
} else {
  // Deletion failed
  echo "Error deleting data: " . $conn->error;
}

$conn->close();
?>
