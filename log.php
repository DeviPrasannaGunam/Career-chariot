
<?php
session_start();

// Check if the user has set a mode preference
if (isset($_SESSION['mode'])) {
    $mode = $_SESSION['mode'];
} else {
    // Default mode is light mode
    $mode = 'light';
}

// Check if the mode preference has been updated
if (isset($_GET['mode']) && in_array($_GET['mode'], ['light', 'dark'])) {
    $mode = $_GET['mode'];
    $_SESSION['mode'] = $mode;
}

// Function to generate the appropriate CSS class based on the selected mode
function getThemeClass($mode)
{
    return ($mode === 'dark') ? 'dark-mode' : '';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Career Chariot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="style2.css" rel="stylesheet">
    <style>
        /* Your custom styles here */
        .navbar-dark .navbar-toggler {
  padding: 1rem; /* Increase the padding to increase the height */
}

.navbar-dark .navbar-collapse {
    
  background-color: #343a40; /* Set the desired background color */
  transition: height 0.3s; /* Add a transition effect */
}

@media (max-width: 300.98px) {
  .navbar-dark .navbar-collapse {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    overflow-y: auto;
    padding-top: 56px; /* Adjust the value to match the height of the collapsed navbar */
    background-color: #343a40; /* Set the desired background color */
    transition: transform 0.3s;
    transform: translateX(-100%);
    left: 0;
    right: 0;
  }
  .navbar-dark .navbar-toggler {
    z-index: 99999;
  }
  .navbar-dark .navbar-collapse.show + .navbar-toggler {
    background-color: transparent;
    border-color: transparent;
  }
  .navbar-dark .navbar-collapse.collapsing,
  .navbar-dark .navbar-collapse.show {
    transform: translateX(0%);
    background-color: #343a40;
  }

  /* Additional styles to move the body content down */
  body {
    padding-top: 56px; /* Adjust the value to match the height of the collapsed navbar */
    transition: padding-top 0.3s;
  }

  body.navbar-open {
    padding-top: 100px; /* Adjust the value to move the content further down */
  }
}

        body.dark-mode {
            background-color: #333;
            color: #fff;
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
        }
        
        .search-input.dark-mode::placeholder {
            color: #000;
        }
        
        .form-switch {
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
                    <a class="nav-link" data-toggle="modal" data-target="#loginModal">Educational qualifications<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hell.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#loginModal">Discussion forum</a>
                </li>
            </ul>
            <div class="navbar-center">
                <div class="form-switch ml-2">
                    <input type="checkbox" class="form-check-input" id="darkModeSwitch">
                    <label class="form-check-label" for="darkModeSwitch"></label>
                </div>
                
            </div>
            <!-- Display the user icon -->
            <button type="button" class="btn btn-outline-light login-signup-btn" data-toggle="modal"  data-target="#loginModal">Login / Sign Up</button>
        </div>
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

        
    </script>
</body>
</html>
