<!DOCTYPE html>
<html>
<head>
  <title>Your Website</title>
  <style>
    /* Styling for the cards */
    .card {
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      max-width: 300px;
      margin: 20px;
      text-align: center;
      font-family: Arial, sans-serif;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
    }

    /* Styling for the buttons */
    .card-button {
      font-size: 18px;
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: block;
      width: 100%;
      margin-top: 20px;
      cursor: pointer;
      border-radius: 3px;
      transition: background-color 0.3s;
    }

    .card-button:hover {
      background-color: #45a049;
    }.navbar {
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
    body{
    background-color: #d9c5df;}
  </style>
</head>
<body>
    <div class="navbar">
    <a href="#">Career Chariot</a>
    <a href="admin-form.php" style="float: right;">Logout</a>
  </div>
  <!-- Edit Courses Card --><center>
  <div class="card">
    <h2>Edit Courses</h2>
    <p>Manage and update courses</p>
    <button class="card-button" onclick="window.location.href='admin1.php'">Edit Courses</button>
  </div>

  <!-- Add/Delete User Card -->
  <div class="card">
    <h2>Add/Delete Admin</h2>
    <button class="card-button" onclick="window.location.href='admins.php'">Add Admin</button>
  </div></center>

</body>
</html>
