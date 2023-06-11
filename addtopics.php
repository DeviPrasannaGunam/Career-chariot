<!DOCTYPE html>
<html>
<head>
  <title>Career Chariot</title>
  <style>
    /* Styling for the form */
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
  </div>
  <?php
// Your form page

// Check if the success query parameter is present
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        // Success message
        echo '<p style="color: green;">' . $_GET['message'] . '</p>';
    } elseif ($_GET['success'] == 0) {
        // Error message
        echo '<p style="color: red;">' . $_GET['message'] . '</p>';
    }
}
?>

  <!-- Form Section -->
  <div class="form-container">
    <h2>Form</h2>
   <?php if (isset($_GET['id'])) {
  $buttonId = $_GET['id'];
} else {
  $buttonId = 0; 
} $url = "insert_data3.php?id=" . $buttonId;
   echo '<form action= \''. $url .'\'. method="POST">';?>
    
      <label for="heading">Topic:</label>
      <input type="text" id="heading" name="heading" required>
      <label for="heading">References:</label>
      <input type="text" id="link" name="link" required>
      
      <button type="submit">Submit</button>
    </form></div>
    

</body>
</html>
