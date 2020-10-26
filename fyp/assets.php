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

<body> <?php

    echo'<header>';
       echo' <div id ="header-content">';
           
                    echo '
<div id="topheadnav">';
    session_start();

/*if(isset($_SESSION["loginstatus"]) && $_SESSION["loginstatus"] === "Admin"){

        echo 'Welcome';
    }*/
    echo'
        <div class="loginbox">';
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        echo $_SESSION["username"].'<a href="logout.php" class="loginbutton"> | logout</a>';
        
    }else{
        echo'<a href="login.php" class="loginbutton">Login</a>';
        $website="login.php";
    }
    echo'
    </div>
    </div>
        <div id="website-logo">
            <img src="img/jps.png" alt="logo" id="logo" onclick="location.href=\'homepage.php\'">
        </div>';


            
   echo' </header>';



           
           echo' <div class="col-md-12">';
               if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        
            echo' <h1>Assets</h1>
          <div class ="container"> 
            <div class="row">';
           echo' <pigeon-table query="SELECT name, type, description, latitude, longitude, area FROM assets" control="true" editable="true">';
            echo'</pigeon-table>';
            echo'</div>  ';     
        echo' </div>';
    echo'</div>';
        
    }else{
        echo'<a href="login.php" class="loginbutton">Login</a>';
        $website="login.php";
        echo' <h1>Assets <small>(Login required for administrator privileges)</small></h1>
          <div class ="container"> 
            <div class="row">';
        echo' <pigeon-table query="SELECT name, type, description, latitude, longitude, area FROM assets" control="true" editable="false">';
        //Setting editable to true allows you to change the database, false gives no access. Control is for being the search field.
        echo'</pigeon-table>';    
    }
          
?>
</body>

</html>
