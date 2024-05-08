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
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <h1 class="text-center">Wanderlog</h1>
        <div class="col-md-6">
            <div class="card">
                <h2 class="text-center">Verify OTP</h2>
                <div class="card-body">
                    <form id="Wanderlog" method="post">
                        <div class="mb-3">
                        <div class="alert alert-dismissible alert-primary" id="alertBox" style="display:none;">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Success!</strong> Go to Log In page and open your account.
                        </div>
                        <div class="alert alert-dismissible alert-danger" id="incorrect" style="display:none";>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Oh snap!</strong> Check your OTP and try again.
                        </div>
                            <label for="confirm_password">Confirm OTP <span data-required="true" aria-hidden="true"></span></label>
                            <input type="text" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <button type="button" class="btn btn-primary" id="generateOTP">Send OTP</button>
                        <button type="submit" class="btn btn-primary" id="submitOTP" style="display:none;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <p>Go back to <a href="login.php">Log In</a></p>
</div>

</body>
<script>
    document.getElementById('generateOTP').addEventListener('click', function() {
        var otp = Math.floor(100000 + Math.random() * 900000);
        if ("Notification" in window) {
            Notification.requestPermission().then(function(permission) {
                if (permission === "granted") {
                    var notification = new Notification("Your OTP is: " + otp);
                }
            });
        }
        document.getElementById('generateOTP').style.display = 'none';
        document.getElementById('submitOTP').style.display = 'inline-block';
        document.getElementById('submitOTP').addEventListener('click', function(event) {
            event.preventDefault();
            var enteredOTP = document.getElementById('confirm_password').value;
            if (enteredOTP === otp.toString()) {
                document.getElementById('alertBox').style.display = 'block';
            } else {
                document.getElementById('incorrect').style.display = 'block';
            }
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
</html>
