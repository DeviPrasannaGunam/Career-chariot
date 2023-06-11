<!DOCTYPE html>
<html>
<head>
  <title>Career Chariot</title>
  <style>
    /* Styling for the form */body{
    background-color: #d9c5df;}
    .form-container {
      max-width: 400px;
      margin: 20px auto;
      padding: 20px;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      background-color: #fff;
      border-radius: 5px;
    }

    .form-container h2 {
      text-align: center;
    }
    .navbar {
      background-color: #f1f1f1;
      overflow: hidden;
    }

    .navbar a {
      float: left;
      display: block;
      color: #333;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .navbar a:last-child {
      float: right;
    }

    .navbar a:hover {
      background-color: #ddd;
    }

    .form-container input[type="text"],
    .form-container textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      resize: none;
    }

    .form-container button {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin-top: 10px;
      cursor: pointer;
      border-radius: 3px;
      transition: background-color 0.3s;
    }

    .form-container button:hover {
      background-color: #45a049;
    }
    body{
    background-color: #d9c5df;}
  </style>
</head>
<body>
<div class="navbar">
    <a href="home-admin.php">Career Chariot</a>
    <a href="home.php" style="float: right;">Logout</a>
  </div><?php
  if (isset($_GET['success'])) {
  $successMessage = $_GET['success'];
  echo '<p style="color: green;">' . $successMessage . '</p>';
}

// Check if an error message is present in the query parameter
if (isset($_GET['error'])) {
  $errorMessage = $_GET['error'];
  echo '<p style="color: red;">' . $errorMessage . '</p>';
}
?>
  <!-- Form Section -->
  <div class="form-container">
    <h2>Form</h2>
    <form action="insert_data.php" method="POST">
    <label for="image">Image Link:</label>
    <input type="text" id="image" name="image" required>
      <label for="heading">Eductional Qualification:</label>
      <input type="text" id="heading" name="heading" required>

      



      <button type="submit">Submit</button>
    </form>
    
  </div>
   <button onclick="window.location.href='home-admin.php'">Back</button>

</body>
</html>
