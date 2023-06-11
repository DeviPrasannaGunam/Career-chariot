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
    <div class="card">
        <img src="image1.jpg" alt="Field 1">
        <div>
            <h3>Field 1</h3>
            <p>Description of Field 1.</p>
        </div>
        <button>Learn More</button>
    </div>
    <div class="card">
        <img src="image2.jpg" alt="Field 2">
        <div>
            <h3>Field 2</h3>
            <p>Description of Field 2.</p>
        </div>
        <button>Learn More</button>
    </div>
    <div class="card">
        <img src="image3.jpg" alt="Field 3">
        <div>
            <h3>Field 3</h3>
            <p>Description of Field 3.</p>
        </div>
        <button>Learn More</button>
    </div>
    <div class="card">
        <img src="image4.jpg" alt="Field 4">
        <div>
            <h3>Field 4</h3>
            <p>Description of Field 4.</p>
        </div>
        <button>Learn More</button>
    </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
