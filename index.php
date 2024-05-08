<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "wanderlog";

// Establish connection
$connection = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Generate a 6-digit OTP
    $otp = mt_rand(100000, 999999);


    // Prepare SQL statement to insert data into users table
    $sql = "INSERT INTO users (email, username, password, otp) VALUES ('$email', 'username', '$password', '$otp')";

    // Execute SQL statement
    if (mysqli_query($connection, $sql)) {
        // Redirect to verify-otp.php with user data
        header("Location: verify-otp.php?email=$email&otp=$otp");
        exit(); // Terminate current script
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        // Handle errors as per your requirement
    }
}

// Close connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>
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
        margin-top: 100px;
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
                <h2 class="text-center">Sign Up</h2>
                <div class="card-body">
                    <form action="" id="Wanderlog" method="post">
                        <div class="mb-3">
                            <label for="email">Email<span data-required="true" aria-hidden="true"></span></label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="username">Username<span data-required="true" aria-hidden="true"></span></label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password <span data-required="true" aria-hidden="true"></span></label>
                            <input type="text" class="form-control" name="password" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <p>Already have an account? <a href="login.php">Login</a></p>
</div>
</body>
<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
</html>
