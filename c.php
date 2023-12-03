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
    }.plus-button {
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
    body{
    background-color: #d9c5df;}
    .card img {
    max-width: 100%;
    height: 200px; /* Adjust this value as needed */
    object-fit: cover; /* Ensure the image covers the entire space */
    border-radius: 5px;
  }
  </style>
</head>
<body>
  <!-- Navigation Bar -->
  <div class="navbar">
    <a href="home-admin.php">Career Chariot</a>
    <a href="home.php" style="float: right;">Logout</a>
  </div>

  <!-- Card Section -->
  <div class="card">
    <button class="plus-button" onclick="openNewPage1()">&#43; Add values</button>
  </div>  
  <div class="card-container">
    <!-- Card 1 -->
    <?php
            // Assuming you have a database connection, retrieve data from the tables
            // Adjust the database connection details as per your setup
            $currentUrl = $_SERVER['REQUEST_URI'];
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

          if (isset($_GET['success'])) {
            if ($_GET['success'] == 1) {
                // Success message
                echo '<p style="color: green;">' . $_GET['message'] . '</p>';
            } elseif ($_GET['success'] == 0) {
                // Error message
                echo '<p style="color: red;">' . $_GET['message'] . '</p>';
            }
        }

            // Fetch data from the 'depts' table based on matching choice_id
            $deptsSql = "SELECT * FROM depts WHERE choice_id = '$buttonId'";
            $deptsResult = $conn->query($deptsSql);

            // Display the data in cards
            if ($deptsResult->num_rows > 0) {
                while($deptRow = $deptsResult->fetch_assoc()) {
                    $heading = $deptRow['heading'];
                    $id=$deptRow['id'];
                    $image = $deptRow['image']; // Assuming you have a 'image' column in the 'depts' table
                    
                    $url = "c1.php?id=" . $id;
                    
                    echo '<div class="card">';
                    
                    echo '<img src="' . $image . '" alt="Card Image" height:400px>';
                    
                    echo '<h2 style="color:black;">' . $heading . '</h2>';
                    echo '<div class="card-button-container">';
                    echo '<form method="POST" action="delete_data1.php?prev=' . urlencode($currentUrl) . '">';
                   echo ' <button class="card-button" name="deletebutton" value="' . $id . '" >Delete</button>';
                   echo '</form>';
                    echo '<button class="card-button" onclick="window.location.href=\'' . $url . '\'">Go to subjects</button>';
                 echo '</div>';
                    
                    echo '</div>';
                    
                }
            } else {
                echo "No data" ;
            }

            // Close the database connection
            $conn->close();
        ?>
    
  </div>

</body>
<script>
   document.getElementById("sub").addEventListener("click", function() {
        window.location.href = "' . $url . '";
    });
  function openNewPage() {
    // Specify the URL of the new page you want to open
   

    // Open the new page in a new window or tab
    window.location.href = "c1.php";
  }
    function openNewPage1() {
    // Specify the URL of the new page you want to open
    <?php  if (isset($_GET['id'])) {
              $buttonId = $_GET['id'];
          } else {
              $buttonId = 0; 
          }
          $currentUrl = $_SERVER['REQUEST_URI'];
          $url = "adddept.php?id=" . $buttonId . "&prev=".$currentUrl;
    // Open the new page in a new window or tab
   echo 'window.location.href = \''. $url .'\'';?>
  }
</script>

</html>
