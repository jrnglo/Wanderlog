<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Social Media Page</title>
<link rel="stylesheet" href="https://bootswatch.com/5/sandstone/bootstrap.min.css">
<style>
    body {
        background-color: #f7efed;
        font-family: Arial, sans-serif;
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
        color: #2d7487;
        cursor: pointer;
        outline: none;
    }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Social Media</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Explore</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Notifications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Messages</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Settings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <div class="post">
        <img src="https://via.placeholder.com/800x800" alt="Post Image">
        <div class="caption">
            <h3>Post Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
            <p>Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.</p>
        </div>
        <div class="likes">
            <button>❤️ Like</button>
            <span>120 likes</span>
        </div>
    </div>
    <div class="post">
        <img src="https://via.placeholder.com/800x800" alt="Post Image">
        <div class="caption">
            <h3>Another Post Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
            <p>Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.</p>
        </div>
        <div class="likes">
            <button>❤️ Like</button>
            <span>85 likes</span>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
