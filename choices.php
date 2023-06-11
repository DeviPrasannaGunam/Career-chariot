
<!DOCTYPE html>
<html>
<head>
    <title>Educational Fields</title>
    <style>
        .body1 {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .card {
            width: 400px;
            height: 500px;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin: 20px; /* Added margin for gap between cards */
        }
        
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            margin-bottom: 10px;
        }
        
        .card h3 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        
        .card p {
            margin: 0;
            color: #666;
        }
        
        .card button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
    
</head>
<body>
<?php include('log1.php'); ?>
<div class="body1">
    <?php
        // Assuming you have a database connection, retrieve data from the table
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

        // Fetch data from the database table
        $sql = "SELECT * FROM education";
        $result = $conn->query($sql);
        if (!$result) {
            echo "Error: " . $conn->error;
        }
        // Display the data in cards
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $image = $row['image'];
                $heading = $row['heading'];
                
                $buttonId = $row['id'];
                $url = "a.php?id=" . $buttonId;
                echo '<div class="card">';
                echo '<img src="' . $image . '" alt="' . $heading . '">';
                echo '<div>';
                echo '<h3 style="color:black;">' . $heading . '</h3>';
             
                echo '</div>';
                echo '<button onclick="window.location.href=\''. $url .'\'">Learn More</button>';
                echo '</div>';
            }
        } else {
            echo "No data found.";
        }

        // Close the database connection
        $conn->close();
    ?>
    
</div>
<?php include('footer.php'); ?>
</body>
</html>
