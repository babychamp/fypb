<!DOCTYPE html>
<html>

<head>
    <title>Home - JPS Sarawak's Asset Viewing Software</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
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

    $timestamp = date('Y-m-d H:i:s');
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
        <button type="submit" name="checkin" id="checkin" class="btn-success">Check in</button>
        <button type="submit" name="checkout" id="checkout" class="btn-danger">Check out</button>';
                      
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
