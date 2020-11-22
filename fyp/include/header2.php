<!DOCTYPE html>
<html>

<head>
    <title>Home - JPS Sarawak's Asset Viewing Software</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<!--to prevent form resubmission on page refresh-->
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

</script>
<?php
    	Function connect(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "fyp";
	
		// Create connection
		$conn = new mysqli($servername, $username, $password,$dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
		}
	$conn = connect(); 
    


    session_start();
if(isset ($_SESSION["type"])){
   

    $type = $_SESSION["type"];
    $id = $_SESSION["loginid"];
    $username = $_SESSION["username"];
             if(isset($_POST['description'])){
	$description= $_POST ['description'];
}
    
            
   
    
    if(isset($_POST['checkin'])){
       
 
    $query = mysqli_query($conn," UPDATE users SET checkedIn = 1 WHERE id = $id");
   $query = mysqli_query($conn," UPDATE users SET TimeIn = NOW() WHERE id = $id");
        $query = mysqli_query($conn," UPDATE users SET TimeOut = NULL WHERE id = $id");
         $sql=mysqli_query($conn, "INSERT INTO check_system(checkin_out, username) VALUES (1, '".$username."')");
        

}

if(isset($_POST['checkout'])){
    
    $reason = $_POST['reason'];
    
    if ($reason == 'other' && $description == null){
        $msg = "Please describe other reason before checking out";
        function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
    }else{
        
    }
        
    $query = mysqli_query($conn," UPDATE users SET checkedIn = 0 WHERE id =$id ");
       $query = mysqli_query($conn," UPDATE users SET TimeOut = NOW() WHERE id = $id");
    if(isset($_POST['description'])){
    $sql=mysqli_query($conn, "INSERT INTO check_system(checkin_out, username, reason, description) VALUES (0, '".$username."', '".$reason."', '".$description."')");
    }else{
        $sql=mysqli_query($conn, "INSERT INTO check_system(checkin_out, username, reason) VALUES (0, '".$username."', '".$reason."')");
    }

}
   
}

echo'
<header>
    <div id="header-content">


        <div id="topheadnav">
        ';
            
?>

<div class="loginbox">
    <?php
	              if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		              echo $_SESSION["username"].'&nbsp; | &nbsp;  <a href="logout.php" class="loginbutton">  logout</a>';
?>
    <div>
        <form method="post" action="">
            <?php
if ($type ==2){
    echo'
        <button type="submit" name="checkin" id="checkin">Check in</button>
    
    </br>';
    /*
      <input list="reason" name="reason">
  <datalist id="reason">
    <option value="End of day">
    <option value="Sick">
    <option value="Other">
  </datalist>
  <input type="submit">
  
    <input type="radio" id="end" name="end" value="End of day">
<label for="reason">End of day</label>
<input type="radio" id="sick" name="sick" value="Sick">
<label for="sick">Sick</label><br>
<input type="radio" id="other" name="other" value="other">
  
    */
echo'
    

  


<br><br>
  <label for="reason">Reason for checkout:</label>
  <select id="reason" name="reason">
    <option value="end">End of the day</option>
    <option value="sick">Sick</option>
    <option value="other">Other reason</option>
  </select>
  <br>

<label for="description">If other reason, please describe:</label><br>

<textarea id="description" name="description" rows="3" cols="40"></textarea></br>

<button type="submit" name="checkout" id="checkout">Check out</button>
</form>
';
    
                      
}
                      ?>

        </form>


    </div>
    <?php
                    }else
                    {
                    echo'<a href="register.php" class="loginbutton">Register</a> &nbsp; &nbsp;';
                    echo'<a href="login.php" class="loginbutton">Login</a>';
                    //$website="login.php";
                    }


                    ?>

</div>

<div id="website-logo">
    <img src="img/jps.png" alt="logo" id="logo" src="homepage.php">


</div>


</div>
</div>


</header>

<div class="navbar">
    <a class="active" href="homepage.php">Home</a>
    <a href="Assets.php">Assets</a>
    <a href="Attendance.php">Attendance</a>
    <a href="regiter.php">Register</a>
</div>

</html>
