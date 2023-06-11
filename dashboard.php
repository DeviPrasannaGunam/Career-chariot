<!DOCTYPE html>
<html>
<head>
  <style>
    .container1 {
      
     padding:10px;
      height: 800px; /* Adjust the height value as desired */
      display: flex;
      flex-direction: column;
     margin-bottom:200px;
      
    }
h1{
    font-size:5em;
}
    .container1 h2 {
      margin-top: 0;
      margin-bottom: 10px;
      text-align: center;
    }

    .container1 img {
      max-width: 100%;
      height: 100%;
    }

    .services-container {
      display: flex;
      align-items: flex-start;
      
      height: 500px; /* Adjust the height value as desired */
    }

    .services-container .picture {
      flex: 1;
      margin-right: 20px;
      float:right;
      flex-basis: 40%
    }

    .services-container .services {
        display: flex;
  align-items: center;
  justify-content: center
    }

    .game-container {
    
      padding:20px;
    }

    .game-container iframe {
      border: none;
      width: 100%;
      height: 500px;
      padding:10px;
    }
  </style>
</head>
<body>
  <?php include('log1.php'); ?>
  <div class="container1">
    
  <img src="cc.jpg" alt="Your Picture" style="background-size:contain" quality=100>
  
  </div>

  <div class="container1 services-container">
  <div class="container">
    <div class="row">
        <div class="col-md-6 text-left">
            <img src="https://www.shutterstock.com/image-illustration/cute-anime-girl-doing-homeworkstudying-260nw-1733960345.jpg" alt="Your Image">
        </div>
        <div class="col-md-6 text-left">
            <h1 >What to expect?</h1><br>
            <p>Introducing Career chariot, a comprehensive educational app designed to gather and present all the information about diverse education opportunities in one place. With EduConnect, users gain access to a vast repository of educational programs, courses, scholarships, and learning resources from around the world.<br><br>

Discover a wide range of educational opportunities tailored to your interests, career goals, and preferred learning style. Whether you're seeking undergraduate or graduate programs, vocational courses, or professional certifications, EduConnect has you covered. The app provides detailed descriptions, admission requirements, faculty profiles, and student reviews to help you make informed decisions.</p>
        </div>
    </div>
</div>
  </div>

  <div class="container game-container">
    <h2>Game Time with Some Riddles</h2>
    <!-- Add your game HTML code here -->
    <iframe src="riddle/projectfinal/project/first.html" width="100%" height="500px"></iframe>
  </div>

  <?php include('footer.php'); ?>
</body>
</html>
