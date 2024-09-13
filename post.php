<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RiseBiz - Post</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="topnav">
        <div class="logo"><img src="logo.png" alt="Logo"></div>
        <a href="About.php">About Us</a>
        <a href="Login.php">Login</a>
        <a class="active" href="home.php">Home</a>
    </div>

<div class="parent">
    <div class="container">
        <div class="card">
            <h1>Post your business</h1>
        <form method="POST" action="Post.php" enctype="multipart/form-data">
            <input type="text" id="name" name="name" placeholder="What's your business's name?" required>
            <input type="text" id="desc" name="desc" placeholder="What's your business about?" required>
            <p><label for="logo">Upload a picture:<input type="file" id="pic" name="pic" required></label></p>
            <button type="submit">Post</button>
        </form>
        </div>
    </div>
</div>

<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $desc = $_POST['desc'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["pic"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {

    } else {
        if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["pic"]["name"])). " has been uploaded.";

            $sql = "INSERT INTO posts (name, description, picture_url) VALUES ('$name', '$desc', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                echo "New post created successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $conn->close();
}
?>


<footer>
    <div>
        <p>&copy; 2024 RiseBiz. All Rights Reserved.</p>
    </div>
</footer>
</body>
</html>
