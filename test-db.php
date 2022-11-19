<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "tester";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM problemsT";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Data: " . $row["code"]. " " . $row["input"]. " " . $row["output"]. "<br>";
  }
} else {
  echo "0 results";
}
        // Close connection
        mysqli_close($conn);
?>