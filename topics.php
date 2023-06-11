<!DOCTYPE html>
<html>
<head>
    <title>Career Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
       .body1 {
      display: flex;
      flex-direction: column;
      align-items: center;
      
      margin: 0;
      padding: 0;
    }
    
    .header {
      position: relative;
      background-image: url('https://gstatic.com/classroom/themes/img_reachout.jpg');
      background-size: contain;
      background-position: center center;
      background-repeat: no-repeat;
      width: 800px;
      height: 300px;
    }
    
    .header h1 {
      text-align: center;
      color: white;
      font-size: 30px;
      padding: 20px;
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: rgba(0, 0, 0, 0.7);
      margin: 0;
    }
    
    .card-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 20px;
    }
    
    .card {
      width: 800px;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      text-align: center;
      margin-bottom: 20px;
    }
    
    .card h2 {
      margin-top: 0;
      margin-bottom: 10px;
    }
    
    .card a {
      text-decoration: none;
      color: blue;
    }
    
    .card-divider {
      margin-bottom: 10px;
      border-bottom: 1px solid #ccc;
    }.content{
            min-height:400px;
        }
       
    </style>
</head>
<body>
<?php include('log1.php'); ?>
<div class="body1">
<div class="content">
  <div class="card-container">
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
    $lsSql1 = "SELECT * FROM subject WHERE id = '$buttonId'";
    $lsResult1 = $conn->query($lsSql1);
    if ($lsResult1->num_rows > 0) {
      $row1 = $lsResult1->fetch_assoc();
      $dh=$row1['heading'];
    }
    echo '<div class="header">
            <h1>' . $dh . '</h1>
          </div>';

    // Fetch data from the 'topics' table based on matching choice_id
    $lsSql = "SELECT * FROM topics WHERE choice_id = '$buttonId'";
    $lsResult = $conn->query($lsSql);

    // Start output buffering
    ob_start();

    // Display the data in cards
    if ($lsResult->num_rows > 0) {
        $firstCard = true;
        while($row = $lsResult->fetch_assoc()) {
            $heading = $row['heading'];
            $link = $row['link'];

            echo '<div class="card">';
            echo '<h2 style="color:black">' . $heading . '</h2>';
            echo '<div class="card-divider"></div>';
            echo '<span>Course: <a href="' . $link . '">' . $link . '</a></span>';
            echo '</div>';
        }
    } else {
        echo "No data found for choice ID: $buttonId";
    }

    // End output buffering and save the output
    $output = ob_get_clean();

    // Close the database connection
    $conn->close();

    // Print the output
    echo $output;
    ?>
  </div>
</div></div>
</body>
<?php include('footer.php'); ?>
</html>
