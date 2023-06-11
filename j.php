<html>
<head>
  <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      height: 100vh;
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
      
      margin-bottom: 30px;
    }
    
    .card h2 {
      margin-top: 0;
      margin-bottom: 10px;
    }
    
    .card a {
      text-decoration: none;
      color: #0645ad;
    }
    
    .card-divider {
      margin-bottom: 10px;
      border-bottom: 1px solid #ccc;
    }
  </style>
</head>
<body>
  <div class="header">
    <h1>Welcome to My Website</h1>
  </div>
  
  <div class="card-container">
    <div class="card">
      <h2>Subject 1</h2>
      <div class="card-divider"></div>
      <a href="https://example.com/subject1">Link 1</a>
    </div>
    <div class="card">
      <h2>Subject 2</h2>
      <div class="card-divider"></div>
      <a href="https://example.com/subject2">Link 2</a>
    </div>
    <div class="card">
      <h2>Subject 3</h2>
      <div class="card-divider"></div>
      <a href="https://example.com/subject3">Link 3</a>
    </div>
  </div>
</body>
</html>
