<!DOCTYPE html>
<html>
<head>
  <title>Career Chariot</title>
  <style>
    /* Styling for the navigation bar */
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

    .card img {
      max-width: 100%;
      height: auto;
    }

    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    /* Styling for the card buttons */
    .card-button {
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

    .card-button:hover {
      background-color: #45a049;
    }

    .card-button-container {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .card-button-container button {
      margin-right: 10px;
    }

    body {
      background-color: #d9c5df;
    }

    .plus-button {
      font-size: 24px;
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      cursor: pointer;
      border-radius: 50%;
      transition: background-color 0.3s;
    }

    .plus-button:hover {
      background-color: #45a049;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      text-decoration: none;
      background-color: #4CAF50;
      color: white;
      border-radius: 3px;
      transition: background-color 0.3s;
    }

    .button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <!-- Navigation Bar -->
  <div class="navbar">
    <a href="home-admin.php">Career Chariot</a>
    <a href="home.php" style="float: right;">Logout</a>
  </div>
  <?php
// Your form page

// Check if the success query parameter is present
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<p style="color: green;">Form submitted successfully!</p>';
}
?>
  <!-- Card Section -->
  <div class="card">
    <button class="plus-button" onclick="openNewPage1()">&#43; Add values</button>
  </div>  <a href="home-admin.php" class="button">Go to Home Page</a>
  <div class="card-container">
    <!-- Card 1 -->
    <?php
            // Assuming you have a database connection, retrieve data from the tables
            // Adjust the database connection details as per your setup
            $servername = "localhost:3308";
            $username = "root";
            $password = "";
            $dbname = "careerc";

            // Create a connection
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

            // Fetch data from the 'depts' table based on matching choice_id
            $deptsSql = "SELECT * FROM topics WHERE choice_id = '$buttonId'";
            $deptsResult = $conn->query($deptsSql);

            // Display the data in cards
            if ($deptsResult->num_rows > 0) {
                while($deptRow = $deptsResult->fetch_assoc()) {
                    $heading = $deptRow['heading'];
                    $id=$deptRow['id'];
        
                    $link = $deptRow['link'];
                     // Assuming you have a 'image' column in the 'depts' table
                    
                   
                    echo '<div class="card">';
                    
                    echo '<h2 style="color:black;">' . $heading . '</h2>';
                    echo '<a href="'  . $link . '">' . $link . '</a>';
                    echo '<div class="card-button-container">';
                   echo ' <button class="card-button" id="' . $id . '" onclick="deleteData(this.id)">Delete</button>';
                   
                 echo '</div>';
                    
                    echo '</div>';
                }
            } else {
                echo "No data found for choice ID: " ;
            }

            // Close the database connection
            $conn->close();
        ?>
    
    <!-- Card 3 -->
    
  </div>

</body>
<script>
  function deleteData(buttonId) {
    // Send an AJAX request to delete the data in the database
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        // Display a success message or perform any other actions
        alert("Data with ID " + buttonId + " has been deleted.");
      }
    };
    xhttp.open("POST", "delete_data3.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id=" + buttonId);
  }

  
    // Specify the URL of the new page you want to open
    function openNewPage1() {
    // Specify the URL of the new page you want to open
   <?php  if (isset($_GET['id'])) {
              $buttonId = $_GET['id'];
          } else {
              $buttonId = 0; 
          }
          $url = "addtopics.php?id=" . $buttonId;
    // Open the new page in a new window or tab
   echo 'window.location.href = \''. $url .'\'';?>
  }
  
</script>

</html>
