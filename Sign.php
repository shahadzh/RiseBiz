<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RiseBiz - Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="topnav">
        <div class="logo"><img src="logo.png" alt="Logo"></div>
        <a href="About.php">About Us</a>
        <a class="active" href="Login.php">Login</a>
        <a href="home.php">Home</a>
    </div>

<div class="parent">
    <div class="container">
        <div class="card">
            <h1>Join Us!</h1>
        <form method="POST" action="Sign.php">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="email" id="Email" name="email" placeholder="Email" required/>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit">Sign up</button>
        </form>
        </div>
    </div>
</div>

<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New user created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
