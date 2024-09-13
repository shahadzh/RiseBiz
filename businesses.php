<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RiseBiz - Discover</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="topnav">
        <div class="logo"><img src="logo.png" alt="Logo"></div>
        <a href="About.php">About Us</a>
        <a href="Login.php">Login</a>
        <a class="active" href="home.php">Home</a>
    </div>
    
    <h1>Businesses List</h1>
    <h3>Explore and connect with thriving businesses</h3>
    
    <a id='box' href='post.php'>Or add your own business!</a>

    <div class="container">
    <?php
include 'db.php';

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<h2>" . $row['name'] . "</h2>";
        echo "<p>" . $row['description'] . "</p>";

        if (file_exists($row['picture_url'])) {
            echo "<img src='" . $row['picture_url'] . "' alt='" . $row['name'] . "' style='max-width: 100%; height: auto;'/>";
        } else {
            echo "<p>Image not available</p>";
        }

        echo "</div>";
    }
} else {
    echo "<p>No businesses found. Be the first to post!</p>";
}

$conn->close();
?>

    </div>
    
</body>
<footer>
    <div>
        <p>&copy; 2024 RiseBiz. All Rights Reserved.</p>
    </div>
</footer>
</html>
