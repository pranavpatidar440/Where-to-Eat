<!DOCTYPE html>
<html>
<head>
  <title>Recommendations</title>
  <style>
    .recommendation {
      display: flex;
      flex-direction: column;
      margin-bottom: 20px;
    }
    .recommendation img {
      max-width: 100%;
    }
  </style>
</head>
<body>
<?php
// Connect to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve recommendations from the database
$sql = "SELECT id, title, description, image_url FROM recommendations";
$result = $conn->query($sql);

// Display each recommendation as HTML
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo '<div class="recommendation">';
    echo '<h2>' . $row["title"] . '</h2>';
    echo '<p>' . $row["description"] . '</p>';
    echo '<img src="' . $row["image_url"] . '">';
    echo '</div>';
  }
} else {
  echo "No recommendations found.";
}

// Close the database connection
$conn->close();
?>
</body>
</html>
