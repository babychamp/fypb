<?php
	// start the session()
	//session_start();
	require "Include/header.php";
?>
<html>

<!--to prevent form resubmission on page refresh-->
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

</script>

<body>
    <div class="container">
        <div class="row">
            <h1>Attendance Registration</h1>

        </div>
    </div><br><br>


    <form method="post" id="loginform" action="">
        <?php
        
        if(isset ($_SESSION["type"])){
   

    $type = $_SESSION["type"];
    $id = $_SESSION["loginid"];
    $username = $_SESSION["username"];
            
             if(isset($_POST['description'])){
	$description= $_POST ['description'];
}
            
   if(isset($_POST['end'])){
	$reason= $_POST ['end'];
} 
              if(isset($_POST['sick'])){
	$reason= $_POST ['sick'];
} 
    if ($type ==2){
    if((isset($reason) || isset($description))){
    if(isset($_POST['checkin'])){
       
 
    $query = mysqli_query($conn," UPDATE users SET checkedIn = 1 WHERE id = $id");
   $query = mysqli_query($conn," UPDATE users SET TimeIn = NOW() WHERE id = $id");
        $query = mysqli_query($conn," UPDATE users SET TimeOut = NULL WHERE id = $id");
         $sql=mysqli_query($conn, "INSERT INTO check_system(checkin_out, username) VALUES ( 1, '".$username."')");
        

}

if(isset($_POST['checkout'])){
        
    $query = mysqli_query($conn," UPDATE users SET checkedIn = 0 WHERE id =$id ");
       $query = mysqli_query($conn," UPDATE users SET TimeOut = NOW() WHERE id = $id");
    $sql=mysqli_query($conn, "INSERT INTO check_system(checkin_out, username, reason, description) VALUES (0, '".$username."', '".$reason."', '".$description."')");

}
    }
}
        
     
        

    echo'
        <button type="submit" name="checkin" id="checkin">Check in</button>
        </br></br>
    Reason for checkout:</br>
    <input type="radio" id="end" name="end" value="End of day">
<label for="reason">End of day</label><br>
<input type="radio" id="sick" name="sick" value="Sick">
<label for="sick">Sick</label><br>
<input type="radio" id="other" name="other" value="other">
<label for="other">Other</label><br><br>
<label for="description">If other reason, please describe:</label></br>

<textarea id="description" name="description" rows="3" cols="39"></textarea></br>
<button type="submit" name="checkout" id="checkout">Check out</button>


';
   // if no input, use echo'<script>alert("Please select a reason")</script>';
                      
}
        
        
                      ?>

    </form>


</body>

</html>
