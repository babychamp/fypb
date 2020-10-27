<!DOCTYPE html>
<html>

<head>
    <title>Home - JPS Sarawak's Asset Viewing Software</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.0.0.js"></script>

</head>

<script>
    $(document).ready(function() {
        var getColour;
        if (localStorage.getItem('checkinbg') !== null) {
            getColour = localStorage.checkinbg;
            $('.checkin').css('background', getColour);
        }

        $('.checkin').on('click', function() {

            getColour = 'green';
            $('.checkin').css('background', 'green');
            localStorage.setItem('checkinbg', 'green');

            getColour2 = '';
            $('.checkout').css('background', '');
            localStorage.setItem('checkoutbg', '');

        });
    });

</script>
<script>
    $(document).ready(function() {
        var getColour2;
        if (localStorage.getItem('checkoutbg') !== null) {
            getColour2 = localStorage.checkoutbg;
            $('.checkout').css('background', getColour2);
        }

        $('.checkout').on('click', function() {

            getColour2 = 'red';
            $('.checkout').css('background', 'red');
            localStorage.setItem('checkoutbg', 'red');

            getColour = '';
            $('.checkin').css('background', '');
            localStorage.setItem('checkinbg', '');

        });
    });

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
    
    
    
 //   $_SESSION["type"] = 0;
 //   $_SESSION["loginid"] = 0;
    //problem: if the session variables were to be defined after session start, $type and $id won't retrieve data from login
    // without defining it gives the error seen on homepage while not logged in

    session_start();
if(isset ($_SESSION["type"])){
   

    $type = $_SESSION["type"];
    $id = $_SESSION["loginid"];

    if(isset($_POST['checkin'])){
       
 
    $query = mysqli_query($conn," UPDATE users SET checkedIn = 1 WHERE id = $id");
   $query = mysqli_query($conn," UPDATE users SET TimeIn = NOW() WHERE id = $id");
        $query = mysqli_query($conn," UPDATE users SET TimeOut = NULL WHERE id = $id");

        

}

if(isset($_POST['checkout'])){
        
    $query = mysqli_query($conn," UPDATE users SET checkedIn = 0 WHERE id =$id ");
       $query = mysqli_query($conn," UPDATE users SET TimeOut = NOW() WHERE id = $id");
    
}
}
?>





<header>
    <div id="header-content">


        <div id="topheadnav">

            <!--if(isset($_SESSION["loginstatus"]) && $_SESSION["loginstatus"] === "Admin"){
		          echo 'Welcome';
                }-->

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
        <button type="submit" name="checkin" id="checkin" class="checkin"  onclick = "checkInButton(1)">Check in</button>
        <button type="submit" class = "checkout" name="checkout" id="checkout" onclick = "checkOutButton(0)">Check out</button>';
                      
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

</html>

<!--<script>
   $(document).ready(function() {
        var getColour;
        if (localStorage.getItem('background') !== null) {
            getColour = localStorage.background;
            $('.checkin').css('background-color', getColour);
        }

        $('.checkin').on('click', function() {
            if (getColour == 'blue') {
                getColour = 'red';
                $('.checkin').css('background-color', 'red');
                localStorage.setItem('background', 'red');
            } else {
                getColour = 'blue';
                $('.checkin').css('background-color', 'blue');
                localStorage.setItem('background', 'blue');
            }
        });
    });

</script> -->
