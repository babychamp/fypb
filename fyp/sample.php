<?php
$con = mysqli_connect("localhost","root","","fyp");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  if (isset($_POST['radioAnswer'])){
        $radioAnswer = $_POST['radioAnswer'];
        mysqli_query($con,"INSERT INTO users (checkedIn) VALUES ('$radioAnswer') WHERE username == $_SESSION["username"]");
    }
?>
