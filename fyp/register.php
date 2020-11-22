<!DOCTYPE html>


<!-- data-ng-app="pigeon-table" in the html is essential to inject ngPigeon-table into the webpage-->
<html lang="en" data-ng-app="pigeon-table">

<head>
    <title>Assets</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- The includes.php file is required to include all necessary dependencies-->
    <?php
        include "pigeon-table/php/includes.php";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbName = "fyp";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbName);        
    ?>

</head>

<body>


    <header>
        <div id="header-content">


            <div id="topheadnav">


                <div class="loginbox">
                    <?php
    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        echo $_SESSION["username"].'<a href="logout.php" class="loginbutton"> | logout</a>';
        
    }else{
        echo'<a href="login.php" class="loginbutton">Login</a>';
    }
  ?>
                </div>
            </div>
            <div id="website-logo">
                <img src="img/jps.png" alt="logo" id="logo" onclick="location.href=\'homepage.php\'">
            </div>



    </header>

    <div class="navbar">
        <a href="homepage.php">Home</a>
        <a href="assets.php">Assets</a>
        <a href="attendance.php">Attendance</a>
    </div>
    
    <div class="col-md-12">
        <?php
        if(isset($_SESSION["loginid"])){
         $id = $_SESSION["loginid"];}
               if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $id =='1'){
       
            echo' <h1>Register</h1>
          <div class ="container"> 
            <div class="row">
           <pigeon-table query="SELECT * FROM users" control="true" editable="true">
            </pigeon-table>
            </div>     
        </div>
    </div>';
        
    }else{
        echo'<p> Sorry, you need administrator privileges to view this page</p>';    
    }
        
?>
</body>
