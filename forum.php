
<?php
// Database connection details
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "careerc";
// Create a new PDO instance
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Retrieve existing posts from the database
$stmt = $conn->query("SELECT * FROM posts ORDER BY id DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Discussion Forum</title>
 <style>
  /* styles.css */

/* Overall styles */
.body1 {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 20px;
}

h1 {
  color: #333;
  text-align: center;
}

h2 {
  color: #555;
}

/* Form styles */
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

/* Forum container styles */
#forum-container {
  margin-top: 20px;
}

/* Post styles */
.post {
  background-color: #f5f5f5;
  border-radius: 5px;
  padding: 10px;
  margin-bottom: 20px;
}

.post h3 {
  margin-top: 0;
}

/* Reply styles */
.reply {
  background-color: #e5e5e5;
  border-radius: 5px;
  padding: 10px;
  margin-bottom: 10px;
}

.reply h4 {
  margin-top: 0;
}
.content{
  min-height:400px;
}

  </style>

</head>
<body>

<?php include('log1.php'); ?>
<div class=container>
<div class=content>
<div class=body1>
  <h1>Discussion Forum</h1>
  <h2>Add a New Post</h2>
  <form action="submit_post.php" method="POST">
    
    <textarea name="content" placeholder="Post Content" required></textarea>
    <button type="submit">Submit Post</button>
  </form>

  <div id="forum-container">
    <?php foreach ($posts as $post): ?>
      <div class="post">
        <h3 style="color:black;"><?php echo $post['author']; ?></h3>
        <p style="color:black;"><?php echo $post['content']; ?></p>

        <!-- Display replies for each post -->
        <?php
        $postId = $post['id'];
        $stmt = $conn->query("SELECT * FROM replies WHERE post_id = $postId ORDER BY id DESC");
        $replies = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php foreach ($replies as $reply): ?>
          <div class="reply">
            <h4 style="color:black;"><?php echo $reply['author']; ?></h4>
            <p style="color:black;"><?php echo $reply['content']; ?></p>
          </div>
        <?php endforeach; ?>

        <!-- Form to submit a reply for the current post -->
        <form action="submit_reply.php" method="POST">
          <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
          
          <textarea name="content" placeholder="Reply Content" required></textarea>
          <button type="submit">Submit Reply</button>
        </form>
      </div>
    <?php endforeach; ?>
  </div>
        </div>
        </div></div>
  <?php include('footer.php'); ?>
 
  
</body>
</html>
