<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RiseBiz - Login</title>
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
            <h1>Log in</h1>
            <h3>If you don’t have an account <a href="Sign.php">Join Us!</a></h3>
        <form method="POST" action="Login.php">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit">Log in</button>
        </form>
        </div>
    </div>
</div>

<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Login successful!";
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found!";
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
