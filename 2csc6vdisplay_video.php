<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Library</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    text-align:center;
}

.container {
    width: 50%;
    margin: 50px auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.video-gallery {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.video-item {
    width: 300px;
    text-align: center;
    padding: 10px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.video-item:hover {
    background-color: #e9e9e9;
}

.video-item h3 {
    margin-top: 0;
    color: #333;
}

.video-item p {
    color: #666;
    font-size: 0.9em;
}

video {
    width: 100%;
    height: auto;
    border-radius: 4px;
}


</style>
<body>
    <div class="container">
        <h1>Video Library</h1>
<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "2clickcsc6v";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch video files from database
$sql = "SELECT title, description, file_path FROM 2csc6v";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<video controls>
                <source src='" . $row['file_path'] . "' type='video/mp4'>
                Your browser does not support the video tag.
              </video>";
        echo "</div>";
    }
} else {
    echo "No videos found.";
}

// Close connection
$conn->close();
?>
</div>
</div>
</body>
</html
