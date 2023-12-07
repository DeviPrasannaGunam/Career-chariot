<?php include('homeq.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>About</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/icon.jpeg" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <link href="style2.css" rel="stylesheet">
    <style>
    .member {
        text-align: center;
        margin-bottom: 30px;
    }
  
    .member .pic {
        width: 150px;
        height: 200px;
        border-radius: 50%;
        overflow: hidden;
        margin: 30px auto;
        margin-bottom:10px;
    }

    .member .pic img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .team .member span::after {
  content: '';
        position: absolute;
        bottom: -5px; /* Adjust the value as needed to center the line */
        left: 50%;
        transform: translateX(-50%);
        width: 50px; /* Adjust the width of the line */
        height: 2px; /* Adjust the height of the line */
        background-color: #000; /* Adjust the color of the line */
}   body.dark-mode {
        background-color: #000;
        color: #fff;
    }

    body.dark-mode section {
        background-color: #000;
        color: #fff;
    }
    body.dark-mode #footer .footer-newsletter {
    background-color: #000;
    color: #fff;
}
body.dark-mode #footer .footer-top{
  background-color: #000;
    color: #fff;
}


    body.dark-mode .section-title h2 {
        color: #fff;
    }

    body.dark-mode .row.content {
        color: #fff;
    }
    body.dark-mode .member-info{
      color:black;
    }
    
    body.dark-mode #footer {
        background-color: #000;
        color: #fff;
    }
    body.dark-mode footer{
      background-color:black;
    }
    .member-info {
      text-align: center; 
        margin-bottom:30px;
        position: relative;
        margin-top:0px;
    }
 
    
    .member-info h4 {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .member-info span {
        display: block;
        font-size: 14px;
        font-weight: 400;
        margin-bottom: 10px;
    }

    .member-info p {
        font-size: 14px;
        font-weight: 400;
        line-height: 1.5;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    
    <main id="main">
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>About</h2>
                </div>
                <div class="row content">
                    <div class="col-lg-12">
                        <p>
                            Career Chariot is a revolutionary app dedicated to helping individuals navigate their career paths and achieve professional success. We provide a comprehensive platform that offers career resources, personalized guidance, and valuable insights to empower users in making informed decisions about their careers.
                        </p>

                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Team Profile</h2>
                    <p>This was our Team, Who developed this idea of Career Chariot on a web page</p>
                </div>
                <div class="row">
                <div class="col-lg-4">
    <div class="member" data-aos="zoom-in" data-aos-delay="100">
        <div class="pic">
            <img src="prasanna.jpg" class="img-fluid" alt="">
        </div>
        <div class="member-info">
            <h4>Gunam Devi Prasanna</h4>
            <span>Team Lead</span>
            <p>Front and Backend Developer</p>
        </div>
    </div>
</div>
<div class="col-lg-4">

<div class="member" data-aos="zoom-in" data-aos-delay="100">
        <div class="pic">
            <img src="jyonitha.jpg" class="img-fluid" alt="">
        </div>
        <div class="member-info">
                                <h4>Pamu Jyonitha Sree</h4>
                                <span>Team Member</span>
                                <p>Backend Developer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
        <div class="pic">
            <img src="manasa.jpg" class="img-fluid" alt="">
        </div>
        <div class="member-info">
                                <h4>Alla Manasa</h4>
                                <span>Team Member</span>
                                <p>Front Developer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include('footer.php'); ?>

</body>
</html>
