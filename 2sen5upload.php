<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
}

.container {
    max-width: 800px;
    margin: auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.video-card {
    margin-bottom: 20px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #fafafa;
}

.video-card h3 {
    margin: 0 0 10px;
    font-size: 24px;
}

.video-card p {
    margin: 0 0 10px;
    color: #555;
}

.video-card video {
    display: block;
    max-width: 100%;
    border-radius: 8px;
}
</style>
<body>
<div class="container">


<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "2clicksen5";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$title = $_POST['title'];
$description = $_POST['description'];
$audio = $_FILES['audio']['name'];
$target_dir = "upload";
$target_file = $target_dir . basename($audio);

// Move the uploaded file to the target directory
if (move_uploaded_file($_FILES['audio']['tmp_name'], $target_file)) {
    // Insert audio details into database
    $sql = "INSERT INTO 2sen5 (title, description, file_path) VALUES ('$title', '$description', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        echo "The file " . basename($audio) . " has been uploaded.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}

// Close connection
$conn->close();
?>
</div>

</body>
</html>




