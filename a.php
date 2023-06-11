<!DOCTYPE html>
<html>
<head>
    <style>
        
    
        .header {
            display: flex;
    
    align-items: center;
    position: relative;
    background-image: url('https://gstatic.com/classroom/themes/img_breakfast.jpg');
    background-size: contain;
    background-position: center center;
    background-repeat: no-repeat;
    width: 800px;
    height: 300px;
    margin-top:20px;
    margin-bottom:20px;
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
    
    .card1-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 20px;
    }
    
    .card1 {
      width: 800px;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      text-align: center;
      margin-bottom: 20px;
    }
    
    .card1 h2 {
      margin-top: 0;
      margin-bottom: 10px;
    }
    
    .card1 a {
      text-decoration: none;
      color: blue;
    }
    
    .card1-divider {
      margin-bottom: 10px;
      border-bottom: 1px solid #ccc;
    }
        .card {
            max-width: 300px; /* Adjust width as needed */
            border: 1px solid #ccc;
            padding: 10px;
            margin-right: 10px;
            margin-bottom: 20px; /* Add margin to create distance between cards */
            background-color: #f5f5f5;
        }

        .card h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .card img {
            max-width: 100%;
            height: 150px; /* Adjust the height as needed */
            object-fit: cover; /* Maintain aspect ratio and fill the space */
            margin-bottom: 10px;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-top: 10px;
            cursor: pointer;
        }

        /* Add margin and padding to the included content */
        .content {
            margin-bottom: 20px;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Display four cards per row */
            grid-gap: 20px; /* Add gap between cards */
        }

        /* Set minimum size for the content area */
        .content-wrapper {
            min-height: 400px; /* Adjust the value as needed */
        }
    </style>
</head>
<body>
<?php include('log1.php'); ?>
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
    $lsSql1 = "SELECT * FROM education WHERE id = '$buttonId'";
    $lsResult1 = $conn->query($lsSql1);
    if ($lsResult1->num_rows > 0) {
      $row1 = $lsResult1->fetch_assoc();
      $dh=$row1['heading'];
    }
    echo '<center><div  class="header">
            <h1>' . $dh . '</h1>
          </div></center>';
echo '<div class="content-wrapper">
    <div class="content">';
        
            // Assuming you have a database connection, retrieve data from the tables
         
            // Check the connection


            // Display the data in cards
            if (isset($_GET['id'])) {
                $buttonId = $_GET['id'];
            } else {
                $buttonId = 0; 
            }

            // Fetch data from the 'depts' table based on matching choice_id
            $deptsSql = "SELECT * FROM depts WHERE choice_id = '$buttonId'";
            $deptsResult = $conn->query($deptsSql);

            // Display the data in cards
            if ($deptsResult->num_rows > 0) {
                while($deptRow = $deptsResult->fetch_assoc()) {
                    $heading = $deptRow['heading'];
                    
                    $image = $deptRow['image']; // Assuming you have a 'image' column in the 'depts' table
                    $id=$deptRow['id'];
                    $url = "m.php?id=" . $id;
                    echo '<div class="card">';
                    echo '<img src="' . $image . '" alt="Card Image" height:400px>';
                    echo '<h2 style="color:black;">' . $heading . '</h2>';
                   
                    echo '<button class="button" onclick="window.location.href=\''. $url .'\'">Learn more</button>';
                    echo '</div>';
                }
            } else {
                echo "No data found for choice ID: " ;
            }

            // Close the database connection
            $conn->close();
        
 echo '   </div>
</div>';

include('footer.php'); ?>
</body>
</html>
