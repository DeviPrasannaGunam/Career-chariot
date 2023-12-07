<?php
include('homeq.php');

$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "careerc";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$username = $_SESSION['user_id'];
$userStmt = $conn->prepare("SELECT * FROM users WHERE user_id = :username");
$userStmt->bindParam(':username', $username);
$userStmt->execute();
$user = $userStmt->fetch(PDO::FETCH_ASSOC);

$userPostsStmt = $conn->prepare("SELECT * FROM posts WHERE user_id = :author ORDER BY id DESC");
$userPostsStmt->bindParam(':author', $username);
$userPostsStmt->execute();
$userPosts = $userPostsStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>User Profile</title>
    <style>
        /* Add your styles here */
        .body1 {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        h2 {
            margin-top: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
            padding: 5px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        #forum-container {
            margin-top: 20px;
        }

        .post, .reply {
            background-color: #f5f5f5;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .content {
            min-height: 400px;
        }

        #updatePasswordForm {
            margin-top: 20px;
            padding: 15px;
        }

        #updatePasswordStatus {
            margin-top: 10px;
            padding: 10px;
            color: green;
        }

        /* Edit Name styles */
        #editNameInput {
            width: 200px;
            padding: 5px;
            font-size: 14px;
        }

        #editNameButton {
            margin-top: 10px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>

<div class="body1">
    <h1>User Profile</h1>
    <h2>Welcome, <span id="username"><?php echo $user['username']; ?></span>!</h2>

    <!-- Update Username Section -->
    <h5 style="padding: 10px;">Edit Username</h5>
    <input type="text" id="editNameInput">
    <button id="editNameButton" onclick="submitEditedName()">Submit</button>

    <h2>Your Posts</h2>

    <?php foreach ($userPosts as $post): ?>
        <div class="post" id="post_<?php echo $post['id']; ?>">
            <!-- Display post content or input field for editing -->
            <div id="post_content_<?php echo $post['id']; ?>">
                <?php echo $post['content']; ?>
            </div>
            <button onclick="editPost(<?php echo $post['id']; ?>)">Edit Post</button>
        </div>
    <?php endforeach; ?>
</div>

<!-- Update Password Section -->
<h2>Update Password</h2>
<form id="updatePasswordForm">
    <label for="currentPassword">Current Password:</label>
    <input type="password" id="currentPassword" name="currentPassword" required>

    <label for="newPassword">New Password:</label>
    <input type="password" id="newPassword" name="newPassword" required>

    <label for="confirmPassword">Confirm New Password:</label>
    <input type="password" id="confirmPassword" name="confirmPassword" required>

    <button type="button" onclick="updatePassword()">Update Password</button>
</form>

<!-- Update Password Status -->
<div id="updatePasswordStatus"></div>

<script>
    function submitEditedName() {
        const newUsername = document.getElementById('editNameInput').value;

        fetch('edit_username.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `newUsername=${encodeURIComponent(newUsername)}`,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to update username');
            }
            return response.text();
        })
        .then(() => {
            // Update the username on the page
            document.getElementById('username').innerText = newUsername;
        })
        .catch(error => {
            alert(error.message);
        });
    }

    function editPost(postId) {
        const postContentDiv = document.getElementById(`post_content_${postId}`);

        // Replace post content with an input field
        const inputField = document.createElement('input');
        inputField.type = 'text';
        inputField.value = postContentDiv.innerText;
        postContentDiv.innerText = '';
        postContentDiv.appendChild(inputField);

        // Replace the "Edit Post" button with "Save" and "Cancel" buttons
        const saveButton = document.createElement('button');
        saveButton.textContent = 'Save';
        saveButton.addEventListener('click', () => saveEditedPost(postId, inputField.value));

        const cancelButton = document.createElement('button');
        cancelButton.textContent = 'Cancel';
        cancelButton.addEventListener('click', () => {
            postContentDiv.innerText = inputField.value;
            postContentDiv.appendChild(editButton);
        });

        // Append the buttons
        postContentDiv.appendChild(saveButton);
        postContentDiv.appendChild(cancelButton);
    }

    function saveEditedPost(postId, updatedContent) {
        fetch('update_post.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `postId=${postId}&updatedContent=${encodeURIComponent(updatedContent)}`,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to update post');
            }
            return response.text();
        })
        .then(() => {
            // Update the post content on the page
            document.getElementById(`post_content_${postId}`).innerText = updatedContent;
        })
        .catch(error => {
            alert(error.message);
        });
    }

    function updatePassword() {
        const currentPassword = document.getElementById('currentPassword').value;
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        if (!currentPassword || !newPassword || !confirmPassword) {
            alert('Please fill in all fields.');
            return;
        }

        if (newPassword !== confirmPassword) {
            alert('New password and confirm password do not match.');
            return;
        }

        fetch('update_password.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `currentPassword=${encodeURIComponent(currentPassword)}&newPassword=${encodeURIComponent(newPassword)}`,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to update password');
            }
            return response.text();
        })
        .then(result => {
            document.getElementById('updatePasswordStatus').innerHTML = result;
        })
        .catch(error => {
            alert(error.message);
        });
    }
</script>

</body>
</html>