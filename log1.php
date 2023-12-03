

<?php
session_start();
if (isset($_POST['logout'])) {
  // Unset all session variables
  session_unset();

  // Destroy the session
  session_destroy();
}
?>
<head>
    <title>Career Chariot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="style2.css" rel="stylesheet">
    <style>
        



@media (max-width: 300.98px) {
  

  /* Additional styles to move the body content down */
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

        .search-input {
            background-color: #fff;
            background-image: url("data:image/jpeg;base64,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");
            background-repeat: no-repeat;
            background-position: 10px center;
            background-size: 18px;
            padding-left: 40px;
            color: #000;
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
        <a class="navbar-brand" href="dashboard.php">Career Chariot</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="choices.php">Educational qualifications<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="main.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="forum.php">Discussion forum</a>
                </li>
            </ul>
            
           <!-- Display the user icon -->
<div class="user-icon">
    <span onclick="toggleDropdown()"> <?php echo strtoupper(substr($_SESSION['username'], 0, 1));?> </span>
    <div class="dropdown-content" id="dropdown">
    
    <a href="home.php" onclick="logout()">Logout</a>
  </div>
</div>




        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <script>
        // Dark mode toggle functionality
        const darkModeSwitch = document.getElementById('darkModeSwitch');
        const body = document.body;
        const darkModeText = document.querySelector('.dark-mode-text');
        
        darkModeSwitch.addEventListener('change', function() {
            body.classList.toggle('dark-mode');
           
            if (darkModeSwitch.checked) {
                darkModeText.textContent = "Dark Mode";
            } else {
                darkModeText.textContent = "Light Mode";
            }
        });
        
        searchInput.addEventListener('keyup', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                // Perform search functionality here
                console.log('Searching for:', searchInput.value);
            }
        });
        
      
        function toggleDropdown() {
  var dropdown = document.getElementById("dropdown");
  dropdown.classList.toggle("show");
}

function logout() {
  // Perform any logout-related actions here (e.g., clearing session data)

  // Redirect to the desired page after logout
  window.location.href = "home.php";
}

  




</script>
</body>
