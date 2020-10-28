<?php
//insert.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testing";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST["hidden_status"]))
{
	$status=$_POST['hidden_status'];
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user_Status(status) VALUES ('".$status."')";

if ($conn->query($sql) === TRUE) {
    echo 'done';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
}
?>
