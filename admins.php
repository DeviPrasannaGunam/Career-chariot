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
  <title>Career Chariot - Admins</title>
  <style>
    /* Add your desired CSS styles here */
    body {
      background-color: #d9c5df;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h1 {
      color: #333;
      font-size: 24px;
      margin-bottom: 20px;
    }

    p {
      color: #008000;
      font-size: 16px;
    }

    form {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="submit"] {
      padding: 5px;
      font-size: 14px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #008000;
      color: #fff;
      text-decoration: none;
      font-size: 16px;
      border-radius: 4px;
    }
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
  <a href="home-admin.php" class="button">Go to Home Page</a>

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

  // Fetch all admins from the datatable
  $sql = "SELECT * FROM user";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Display the admins in a table
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Action</th></tr>";

    while ($row = $result->fetch_assoc()) {
      $id = $row["id"];
      $name = $row["name"];
      $email = $row["email"];

      echo "<tr>";
      echo "<td>$id</td>";
      echo "<td>$name</td>";
      echo "<td>$email</td>";
      echo "<td><a href='edit_user.php?id=$id'>Edit</a> | <a href='delete_user.php?id=$id'>Delete</a></td>";
      echo "</tr>";
    }

    echo "</table>";
  } else {
    echo "No admins found.";
  }

  $conn->close();
  ?>
</body>
</html>
