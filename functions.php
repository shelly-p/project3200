<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "UserDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Take values from form into PHP variables
$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$user_role = $_REQUEST['role'];
$school = $_REQUEST['school'];

$sql = "INSERT INTO users VALUES ('$email', '$first_name',
            '$last_name', '$password', '$user_role', '$school')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>"; 

        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
        
        // Close connection
        mysqli_close($conn);
?>