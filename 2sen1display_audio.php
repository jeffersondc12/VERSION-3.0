<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Audio Library</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 50px auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align:center;
}
.back{
    color: blue;       /* Change icon color */
    font-size: 148px;  /* Change icon size */
    padding: 10px;    /* Add padding */
  text-align: center;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  margin: 10px auto;
}



</style>
<body>
    <div class="container">
        <h1>Audio Library</h1>
        <div class="audio-list">
            <?php
            // Database credentials
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "2clicksen1";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch audio files from database
            $sql = "SELECT title, description, file_path FROM 2sen1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='audio-item'>";
                    echo "<h3>" . $row['title'] . "</h3>";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "<audio controls>
                            <source src='" . $row['file_path'] . "' type='audio/mp3'>
                            Your browser does not support the audio element.
                          </audio>";
                    echo "</div>";
                }
            } else {
                echo "<p>No audios found.</p>";
            }

            // Close connection
            $conn->close();
            ?>
        </div>
        <div class="back">
       <a href="a2clicksen1.html">  <i class="bi bi-arrow-left"></i> </a>
</div>
    </div>
</body>
</html>
