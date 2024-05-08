<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}

$server = "localhost";
$username = "root";
$password = "";
$database = "wanderlog";

// Create connection
$connection = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to select user data based on the email
$email = $_SESSION['email'];
$userQuery = "SELECT * FROM users WHERE email='$email'";
$userResult = mysqli_query($connection, $userQuery);

// Check if there is exactly one result (since email should be unique)
if (mysqli_num_rows($userResult) === 1) {
  // Fetch the user data
  $userData = mysqli_fetch_assoc($userResult);
} else {
  // Handle the case where no user is found or multiple users with the same email
  $userData = null;
}

// Check if $userData is not null before accessing its elements
if ($userData !== null) {
  // SQL query to select posts for the logged-in user
  $postQuery = "SELECT * FROM post WHERE email = '{$userData['email']}'";
  $postResult = mysqli_query($connection, $postQuery);

  // Initialize an array to store posts data
  $postsData = [];

  // Fetch posts data
  if (mysqli_num_rows($postResult) > 0) {
      while ($row = mysqli_fetch_assoc($postResult)) {
          $postsData[] = $row;
      }
  }
} else {
  // Handle the case where $userData is null (no user found)
  $postsData = [];
}

// Close connection
mysqli_close($connection);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Social Media Page</title>
<link rel="stylesheet" href="https://bootswatch.com/5/sandstone/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    body {
        background-color: #f7efed;
        color: #f7efed;
        font-weight: ;
        font-family: roboto;
    }
    .container {
        max-width: 800px;
        margin: 50px auto;
    }
    .post {
        margin-bottom: 30px;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .post img {
        width: 100%;
        display: block;
    }
    .post .caption {
        padding: 20px;
    }
    .post .caption h3 {
        margin-top: 0;
        font-weight: bold;
    }
    .post .caption p {
        margin-bottom: 0;
        line-height: 1.5;
    }
    .post .likes {
        padding: 10px 20px;
        border-top: 1px solid #eee;
    }
    .post .likes button {
        background-color: transparent;
        border: none;
        color: #2D7487;
        cursor: pointer;
        outline: none;
    }
    i{
      margin-right: 5px;
    }
    h3, p, span{
      color: #333;
    }
    .nav-item{
      float: right;
    }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-color" data-bs-theme="dark" style="background-color: #2D7487;">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">Wanderlog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#"><i class="bi bi-house"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-calendar-event"></i>Plans</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-person"></i>Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-gear"></i>Settings</a>
        </li>
        <li class="nav-item">
        <form action="logout.php" method="post">
                <button class="nav-link" type="submit" name="logout"><i class="bi bi-box-arrow-left"></i><a >Logout</a></button>
            </form>
        </li>
      </ul>
      <form class="d-flex">
      <?php echo $_SESSION['email']; ?>
      </form>
    </div>
  </div>
</nav>

<div class="container">
        <?php foreach ($postsData as $post): ?>
            <div class="post">
                <img src="uploads/<?php echo $post['photo']; ?>" alt="Post Image">
                <div class="caption">
                    <h3><?php echo $post['title']; ?></h3>
                    <p><?php echo $post['caption']; ?></p>
                    <p><?php echo $post['location']; ?></p>
                </div>
                <div class="likes">
                    <button><i class="bi bi-heart"></i></button>
                    <button><i class="bi bi-pin-angle"></i></button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
</body>
</html>
