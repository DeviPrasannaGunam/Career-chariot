<?php session_start();?>
<!DOCTYPE html>
<html>
        <head>
            <title>Career Chariot</title>
            <!-- Include your CSS and other head elements here -->
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="style2.css" rel="stylesheet">
    

    <style>
        @media (max-width: 300.98px) {
            body {
    padding-top: 56px; /* Adjust the value to match the height of the collapsed navbar */
    transition: padding-top 0.3s;
  }

  body.navbar-open {
    padding-top: 100px; /* Adjust the value to move the content further down */
  }
}
.dropdown-content {
            display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
  right: 0; /* Change "right" to "left" */
}

.dropdown-content a {
  color: #333;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: grey;
}

.show {
  display: block;
}       
        .search-input::placeholder {
            color: #000;
        }.form-switch {
            display: inline-flex;
            align-items: center;
        }

        .form-switch input {
            display: none;
        }

        .form-switch label {
            position: relative;
            display: inline-block;
            width: 38px;
            height: 20px;
            border-radius: 20px;
            background-color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
/* CSS to adjust the positioning of close button and login button */
.modal-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.float-left {
  float: left !important;
}

        .form-switch input:checked + label {
            background-color: #000;
        }

        .form-switch input:checked + label::before {
            left: calc(100% - 2px);
            transform: translateX(-100%);
        }

        .form-switch label::before {
            content: "";
            position: absolute;
            top: 2px;
            left: 2px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background-color: #fff;
            transition: transform 0.3s;
        }
        #forgotPasswordLink {
        color: #007bff; /* Blue color, you can adjust the color as needed */
        cursor: pointer;
        float:right;
    }

    #forgotPasswordLink:hover {
        text-decoration: underline;
    }
        .dark-mode-text {
            margin-left: 5px;
            margin-top: 5px;
            color: #aff;
        }

        .navbar-center {
            flex-grow: 1;
            display: flex;
            
        }
        .navbar {
            height: 80px;
        }
        .error-text {
        color: red;
    }

    .required {
        color: red;
        margin-left: 2px;
    }
    .user-icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #555;
    color: #fff;
    text-align: center;
    line-height: 40px;
    font-size: 18px;
}

        /* CSS for the input fields and button */
input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

.submit-btn {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  margin-top: 10px;
}

.submit-btn:hover {
  opacity: 0.8;
}

.left-link {
  float: left;
}

.right-link {
  float: right;
}

.button-container {
  overflow: hidden;
} 

    </style>
        
        </head>
        <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      
      <a class="navbar-brand" href="home.php">Career Chariot</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
              <a class="nav-link" <?php echo isset($_SESSION['username']) ? 'href="choices.php"' :'data-toggle="modal" data-target="#loginModal"' ; ?>>
    Educational qualifications<span class="sr-only">(current)</span>
</a>

              </li>
              <li class="nav-item">
                  <a class="nav-link" href="hell.php">About</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" <?php echo isset($_SESSION['username']) ? 'href="forum.php"' :'data-toggle="modal" data-target="#loginModal"' ; ?>>Discussion forum</a>
              </li>
          </ul>
                <?php
                if (isset($_SESSION['username'])) {
                echo '<div class="user-icon">
                    <span onclick="toggleDropdown()"> '.strtoupper(substr($_SESSION['username'], 0, 1)).' </span>
                    <div class="dropdown-content" id="dropdown">
    <a href="profile.php">Settings</a>
    <a href="home.php" onclick="logout()">Logout</a>
</div>

                </div>';}
                else{
                    echo '<button type="button" class="btn btn-outline-light login-signup-btn" data-toggle="modal" data-target="#loginModal">Login / Sign Up</button>';

                }?>
            </nav>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <script>
        // Dark mode toggle functionality
       
        
      
        function toggleDropdown() {
  var dropdown = document.getElementById("dropdown");
  dropdown.classList.toggle("show");
}

function logout() {

  $.ajax({
                type: "POST",
                url: "logout.php",
                success: function (response) {
                    // Reload the page after successful logout
                    location.reload();
                }
            });

  // Redirect to the desired page after logout
  
}

</script> <!-- Include your JavaScript and other body elements here -->
        </body>
        </html>

  