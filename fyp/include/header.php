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
    ?>




<body>

    <header>
        <div id="header-content">


            <div id="topheadnav">
                <?php
                /*if(isset($_SESSION["loginstatus"]) && $_SESSION["loginstatus"] === "Admin"){
		          echo 'Welcome';
                }*/
                echo'
		          <div class="loginbox">';
	              if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		              echo $_SESSION["username"].'<a href="logout.php" class="loginbutton">&nbsp; &nbsp; &nbsp; | &nbsp; logout</a>';
?>
                <div>
                    <form method="post" action="">
                        <?php
if ($type ==2){
    echo'
        <button type="submit" name="checkin" id="checkin" class="btn-success">Check in</button>
        <button type="submit" name="checkout" id="checkout" class="btn-danger">Check out</button>';
                      
}
echo'
    </form>


</div>';
             
	              }else{
                      echo'<a href ="register.php" class = "loginbutton">Register</a> &nbsp; &nbsp;';
		              echo'<a href="login.php" class="loginbutton">Login</a>';
		              //$website="login.php";
                      	}
                

?>

                </div>
                <div id="website-logo">
                    <img src="img/jps.png" alt="logo" id="logo">
                </div>';


            </div>

    </header>
