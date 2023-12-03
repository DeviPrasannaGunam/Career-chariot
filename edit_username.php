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

  // Retrieve the admin's details from the datatable
  $sql = "SELECT * FROM user WHERE id = $id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row["name"];
    $email = $row["email"];

    // Display the admin's details in a form for editing
    echo "<h1>Edit User</h1>";
    echo "<form action='update_user.php' method='POST'>";
    echo "<input type='hidden' name='id' value='$id'>";
    echo "Name: <input type='text' name='name' value='$name'><br>";
    echo "Email: <input type='email' name='email' value='$email'><br>";
    echo "<input type='submit' value='Update'>";
    echo "</form>";
  } else {
    echo "Admin not found.";
  }

  $conn->close();
} else {
  echo "Invalid admin ID.";
}
?>
