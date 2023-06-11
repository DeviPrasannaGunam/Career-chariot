<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .admin-login {
            width: 300px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .admin-login h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .admin-login input[type="text"],
        .admin-login input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .admin-login button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .admin-login button[type="submit"]:hover {
            background-color: #45a049;
        }

        .admin-login input[type="text"]:last-child,
        .admin-login input[type="password"]:last-child {
            margin-bottom: 20px;
        }
        body{
    background-color: #d9c5df;}
    </style>
</head>
<body>
    <div class="admin-login">
        <h2>Admin Login</h2>
        <div id="Error" class="error"></div>
        <form action="admin-login.php" method="post">
        
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
