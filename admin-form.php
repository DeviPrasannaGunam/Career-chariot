<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        body{
    background-color: #d9c5df;}
        
        h2 {
            color: #333;
        }
        
        .error {
            color: red;
            margin-bottom: 10px;
        }
        
        .form-container {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        .form-container label,
        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container input[type="submit"] {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
        
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Admin Login</h2>
        <div class="error" id="Error"></div>
        <form method="POST" id="log">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <input type="submit" value="Login">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#log').submit(function(e) {
                e.preventDefault(); // Prevent form from submitting

                // Perform client-side validation
                var username = $('#username').val();
                var password = $('#password').val();

                if (username === '' || password === '') {
                    $('#Error').text('Please enter username and password');
                    return;
                }

                // Clear previous error messages
                $('#Error').text('');

                // Perform AJAX request to handle login
                $.ajax({
                    type: 'POST',
                    url: 'admin--login.php', // Replace with the actual PHP file handling login
                    data: $(this).serialize(),
                    success: function(response) {
                        // Handle the response from the server
                        if (response.trim() === 'success') {
                            window.location.href = 'home-admin.php';
                        } else {
                            // Login failed
                            $('#Error').text(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX request error
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
