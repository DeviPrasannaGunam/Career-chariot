<?php
session_start();
$_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];

$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "careerc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if($_SERVER['REQUEST_METHOD'] && isset($_POST['deletebutton'])){
  $id=$_POST['deletebutton'];
  $sql = "DELETE FROM depts WHERE id = $id";

if ($conn->query($sql) === TRUE) {
  // Deletion successful
  $successMessage= "Data deleted successfully";
} else {
  // Deletion failed
  $errorMessage = "Error inserting data: " . $conn->error;
}
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
