<?php include('homeq.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Career Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .first-card {
            margin-top: 20px;
        }

        .option-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card-text {
            margin-bottom: 15px;
        }

        .btn-left {
            float: left;
            margin-right: 10px;
        }

        .btn-right {
            float: right;
        }

        .content {
            min-height: 400px;
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            background-image: url('https://gstatic.com/classroom/themes/img_graduation.jpg');
            background-size: contain;
            background-position: center center;
            background-repeat: no-repeat;
            width: 800px;
            height: 300px;
            margin-top: 20px;
            margin-bottom: 20px;
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
    </style>
</head>
<body>

<main class="container">
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
    $lsSql1 = "SELECT * FROM depts WHERE id = '$buttonId'";
    $lsResult1 = $conn->query($lsSql1);
    if ($lsResult1->num_rows > 0) {
        $row1 = $lsResult1->fetch_assoc();
        $dh = $row1['heading'];
    }
    echo '<center><div  class="header">
            <h1>' . $dh . '</h1>
          </div></center>';
    echo '   <div class="content">';

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
    $lsSql = "SELECT * FROM subject WHERE choice_id = '$buttonId'";
    $lsResult = $conn->query($lsSql);

    // Display the data in cards
    if ($lsResult->num_rows > 0) {
        $firstCard = true;
        while ($row = $lsResult->fetch_assoc()) {
            $heading = $row['heading'];
            $certify = $row['certify'];
            $id = $row['id'];
            $url = "topics.php?id=" . $id;

            echo '<div class="row">';
            echo '<div class="col-md-12">';
            $cardClass = $firstCard ? 'option-card first-card' : 'option-card';

            echo '<div class="card ' . $cardClass . '">';
            echo '<div class="card-body">';
            echo '<h5 style="color:black;" class="card-title">' . $heading . '</h5>';
            echo '<a href="' . $url . '" class="btn btn-primary btn-left">topics</a>';
            echo '<a href="' . $certify . '" class="btn btn-primary btn-right">Certification</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            $firstCard = false;
        }
    } else {
        echo "No data found for choice ID: ";
    }

    // Close the database connection
    $conn->close();
    ?>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
<?php include('footer.php'); ?>
</html>
