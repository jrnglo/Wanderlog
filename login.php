<?php
session_start(); // Initialize session

$server = "localhost";
$username = "root";
$password = "";
$database = "wanderlog";

$connection = mysqli_connect($server, $username, $password, $database);
$success = '';
if ($connection) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Login successful, set session
            $_SESSION['email'] = $email;
            header("Location: media.php");
            exit();
        } else {
            $success = '<div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Invalid Credentials! </strong>Please check your email or password.
        </div>';
            // Handle invalid login credentials as per your requirement
        }
    }
    mysqli_close($connection);
} else {
    // Database connection failed
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Wanderlog | Login</title>
<link rel="stylesheet" href="https://bootswatch.com/5/sandstone/bootstrap.min.css">
<style>
    body {
        background-color: #f7efed;
        font-weight: ;
        font-family: roboto;
    }
    .container{
        position: absolute;
        top: 100px;
    }
    .card {
        background-color: #FBF3F2;
        padding: 20px;
        width: 95%;
        margin: 0 auto;
        color: #F7EFED;
    }
    .form-control{
        border:none;
        border-bottom: 0.5px solid #333;
        border-radius: 0;
    }
    h1{
        color: #2D7487;
        font-weight: 500;
        font-size:400%;
    }
    h2{
        color: #2D7487;
    }
    .btn {
        background-color: #2D7487;
        border: 1px #333;
        border-radius: 0;
    }
    a {
        color: #333;
        text-decoration: none;
        font-weight: 500;
    }
    p {
        text-align: center;
        margin-top: 180px;
    }
    label{
        color: #333;
    }
</style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <h1 class="text-center">Wanderlog</h1>
        <div class="col-md-6">
            <div class="card">
                    <h2 class="text-center">Log In</h2>
                <div class="card-body">
                    <form action="" method="post">
                    <?php echo $success; ?>
                        <div class="mb-3">
                        <label for="email">Email <span data-required="true" aria-hidden="true"></span></label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="mb-3">
                        <label for="password">Password <span data-required="true" aria-hidden="true"></span></label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="login">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <p>Didn't have an account? <a href="index.php">Sign Up</a></p>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
</html>
