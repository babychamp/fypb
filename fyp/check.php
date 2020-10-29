<?php
	// start the session()
	//session_start();
	require "Include/header.php";
?>
<html>

<body>
    <div class="container">
        <div class="row">
            <h1>Attendance Registration</h1>

        </div>
    </div><br><br>


    <form method="post" id="loginform" action="">
        <?php
if ($type ==2){
    echo'
        <button type="submit" name="checkin" id="checkin">Check in</button>
        </br></br>
    Reason for checkout:</br>
    <input type="radio" id="end" name="end" value="End of day" checked = "checked">
<label for="reason">End of day</label>';
echo'<input type="radio" id="sick" name="sick" value="Sick">
<label for="sick">Sick</label><br><br>
<label for="description">If other reason, describe:</label></br>

<textarea id="description" name="description" rows="2" cols="40"></textarea></br>
<button type="submit" name="checkout" id="checkout">Check out</button>

';
    
                      
}
                      ?>

    </form>


</body>

</html>
