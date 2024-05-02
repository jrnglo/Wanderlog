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
        color: #f7efed;
        font-weight: ;
        font-family: roboto;
    }
    .card {
        background-color: #2D7487;
        padding: 20px;
        width: 95%;
        margin: 0 auto;
        color: #F7EFED;
    }
    .input {
        border-radius: 1px;
    }
    h1{
        color: #2D7487;
        font-weight: 500;
        font-size:400%;
    }
    .btn {
        background-color: #2D7487;
        border: 1px #333;
    }
    a{
        color: #F7EFED;
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
                    <form action="signup.php" method="post">
                        <div class="mb-3">
                        <label for="first_name">Username <span data-required="true" aria-hidden="true"></span></label>
                            <input type="text" class="form-control" name="first_name" required>
                        </div>

                        <div class="mb-3">
                        <label for="password">Password <span data-required="true" aria-hidden="true"></span></label>
                            <input type="text" class="form-control" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
                    </form>
                </div>
                    <p>Didn't have an account? <a href="index.php">Sign Up</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
