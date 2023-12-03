<?php
// Get the ID from the AJAX request


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
$id = $_POST['delcour'];
// Delete the data with the specified ID from the 'datatable' table
$sql = "DELETE FROM subject WHERE id = $id";

if ($conn->query($sql) === TRUE) {
  // Deletion successful
  $successMessage= "Data deleted successfully";
} else {
  // Deletion failed
  $errorMessage = "Error inserting data: " . $conn->error;
}


$redirectUrl = urldecode($_GET['prev']);

$conn->close();
if (isset($successMessage)) {
  $redirectUrl .= strpos($redirectUrl, '?') !== false ? '&' : '?'; // Check if there are existing query parameters
  $redirectUrl .= 'success=1&message=' . urlencode($successMessage); // Add the success query parameter and message
} elseif (isset($errorMessage)) {
  $redirectUrl .= strpos($redirectUrl, '?') !== false ? '&' : '?'; // Check if there are existing query parameters
  $redirectUrl .= 'success=0&message=' . urlencode($errorMessage); // Add the error query parameter and message
}
header("Location: $redirectUrl")
?>
