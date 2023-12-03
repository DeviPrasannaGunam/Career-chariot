<?php
// Process the form submission and insert the data into the database

// Assuming you have a database connection, insert the data into the table
// Replace the following code with your actual insertion logic

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

// Retrieve the form data
$image = $_POST['image'];
$heading = $_POST['heading'];

// Insert the data into the table
$sql = "INSERT INTO education (image, heading) VALUES ('$image', '$heading')";

if ($conn->query($sql) === TRUE) {
  // Insertion successful
  $successMessage = "Data inserted successfully.";
  // Redirect back to the form page with the success message
  header("Location: addchoices.php?success=" . urlencode($successMessage));
  exit;
} else {
  // Insertion failed
  $errorMessage = "Error inserting data: " . $conn->error;
  // Redirect back to the form page with the error message
  header("Location: addchoices.php?error=" . urlencode($errorMessage));
  exit;
}

$conn->close();
?>
