<!DOCTYPE html>
<html>

<head>
    <title>Home - JPS Sarawak's Asset Viewing Software</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
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
    $username = $_SESSION["username"];
    $reason = 'take input from radiobtn';
   $description = 'take input from textarea';

    $timestamp = date('Y-m-d H:i:s');
    
    
    if(isset($_POST['checkin'])){
       
 
    $query = mysqli_query($conn," UPDATE users SET checkedIn = 1 WHERE id = $id");
   $query = mysqli_query($conn," UPDATE users SET TimeIn = NOW() WHERE id = $id");
        $query = mysqli_query($conn," UPDATE users SET TimeOut = NULL WHERE id = $id");
         $sql=mysqli_query($conn, "INSERT INTO check_system(checkin_out, username) VALUES (1, '".$username."')");
        

}

if(isset($_POST['checkout'])){
        
    $query = mysqli_query($conn," UPDATE users SET checkedIn = 0 WHERE id =$id ");
       $query = mysqli_query($conn," UPDATE users SET TimeOut = NOW() WHERE id = $id");
    $sql=mysqli_query($conn, "INSERT INTO check_system(checkin_out, username, reason, description) VALUES (0, '".$username."', '".$reason."', '".$description."')");

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
    <a href="assets.php">Assets</a>
    <a href="attendance.php">Attendance</a>
    <a href="register.php">Registration</a>
</div>

</html>
