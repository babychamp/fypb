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
    
    
    
 //   $_SESSION["type"] = 0;
 //   $_SESSION["loginid"] = 0;
    //problem: if the session variables were to be defined after session start, $type and $id won't retrieve data from login
    // without defining it gives the error seen on homepage while not logged in

    session_start();

   

    $type = $_SESSION["type"];
    $id = $_SESSION["loginid"];

    $timestamp = date('Y-m-d H:i:s');
    if(isset($_POST['checkin'])){
       
 
    $query = mysqli_query($conn," UPDATE users SET checkedIn = 1 WHERE id = $id");
   $query = mysqli_query($conn," UPDATE users SET TimeIn = $timestamp WHERE id = $id");

}

if(isset($_POST['checkout'])){
        
    $query = mysqli_query($conn," UPDATE users SET checkedIn = 0 WHERE id =$id ");
       $query = mysqli_query($conn," UPDATE users SET TimeOut = $timestamp WHERE id = $id");
}

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
                    <img src="img/jps.png" alt="logo" id="logo" src="homepage.php">
                </div>';


            </div>

    </header>
