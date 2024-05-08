<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}

// Database connection parameters
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

// Function to handle file uploads
function handleFileUploads($fileArray, $uploadPath, $allowedExtensions) {
    $errors = [];

    foreach ($fileArray['tmp_name'] as $key => $tmp_name) {
        $photo_name = $fileArray['name'][$key];
        $photo_tmp_name = $fileArray['tmp_name'][$key];
        $photo_file_extension = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));

        if (in_array($photo_file_extension, $allowedExtensions)) {
            if (!move_uploaded_file($photo_tmp_name, $uploadPath . $photo_name)) {
                $errors[] = "Failed to move uploaded file: $photo_name";
            }
        } else {
            $errors[] = "Invalid file extension for photo: $photo_name";
        }
    }

    return $errors;
}

$currentDirectory = getcwd();
$uploadDirectory = "/uploads/";
$uploadPath = $currentDirectory . $uploadDirectory;

$errors = []; // Store errors here

$fileExtensionsAllowed = ['jpeg', 'jpg', 'png']; // These will be the only file extensions allowed 

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Handle file uploads
    $errors = handleFileUploads($_FILES['photo'], $uploadPath, $fileExtensionsAllowed);

    if (empty($errors)) {
        // Set parameters for database insertion
        $title = $_POST['title'];
        $caption = $_POST['caption'];
        $location = $_POST['location'];
        $email = $_SESSION['email'];

        // Prepare SQL statement
        $stmt = $connection->prepare("INSERT INTO post (title, caption, location, photo, email) VALUES (?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bind_param("sssss", $title, $caption, $location, $photo_name, $email);

        // Execute the prepared statement for each uploaded photo
        foreach ($_FILES['photo']['name'] as $photo_name) {
            $stmt->execute();
        }

        // Close statement
        $stmt->close();

        // Redirect to media page
        header("Location: media.php");
        exit();
    }
}

// Close connection
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photos Form</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/sandstone/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Photos</div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="caption" class="form-label">Caption</label>
                            <textarea class="form-control" id="caption" name="caption" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photos</label>
                            <input type="file" class="form-control" id="photo" name="photo[]" accept="image/*" multiple required>
                        </div>
                        <div id="thumbnails"></div>
                        <button type="submit" class="btn btn-primary" name="submit">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<script>
    document.getElementById('photo').addEventListener('change', function() {
        var thumbnailsContainer = document.getElementById('thumbnails');
        thumbnailsContainer.innerHTML = ''; // Clear previous thumbnails
        
        var files = this.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            if (!file.type.startsWith('image/')){ continue }

            var reader = new FileReader();
            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100px'; // Adjust thumbnail size as needed
                img.style.maxHeight = '100px'; // Adjust thumbnail size as needed
                thumbnailsContainer.appendChild(img);
            }
            reader.readAsDataURL(file);
        }
    });
</script>

</html>
