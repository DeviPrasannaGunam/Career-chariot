<?php
// Get the form data
$heading = $_POST['heading'];
$image = $_POST['image'];

// Perform database insertion using PHP and SQL

// Example code for inserting into a database table named 'depts'
// Replace the following code with your actual insertion logic

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
if (isset($_GET['id'])) {
  $buttonId = $_GET['id'];
} else {
  $buttonId = 0; 
}
// Insert the form data into the 'depts' table
$sql = "INSERT INTO depts (heading, image,choice_id) VALUES ('$heading', '$image','$buttonId')";

if ($conn->query($sql) === TRUE) {
    // Insertion successful
    $successMessage = "Data inserted successfully";
} else {
    // Insertion failed
    $errorMessage = "Error inserting data: " . $conn->error;
}

$conn->close();

// Redirect to the form page with success/error message
$redirectUrl = $_SERVER['HTTP_REFERER']; // Get the URL of the previous page

// Append the query parameter to the redirect URL based on success/error status
if (isset($successMessage)) {
    $redirectUrl .= strpos($redirectUrl, '?') !== false ? '&' : '?'; // Check if there are existing query parameters
    $redirectUrl .= 'success=1&message=' . urlencode($successMessage); // Add the success query parameter and message
} elseif (isset($errorMessage)) {
    $redirectUrl .= strpos($redirectUrl, '?') !== false ? '&' : '?'; // Check if there are existing query parameters
    $redirectUrl .= 'success=0&message=' . urlencode($errorMessage); // Add the error query parameter and message
}

// Perform the redirect
header("Location: $redirectUrl");
exit();
?>
