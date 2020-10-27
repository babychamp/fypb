<!DOCTYPE html>

<head>
    <title>Assets</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- The includes.php file is required to include all necessary dependencies-->
    <?php
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

               if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        
            echo'<h1>Staff Attendance</h1>';
            $sql = "SELECT username FROM users WHERE checkedin = 1";
                $result = $conn->query($sql);

            echo'<table>
                    <tr>
                        <th>Name</th>
                    </tr>';

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<tr><td>". $row["username"]. "</td></tr>";
            }
            echo'</table>';
            } else {
            echo "0 results";
            }
           //SQL and display here
    }else{
        echo'<a href="login.php" class="loginbutton">Login</a>';
        $website="login.php";
        echo' <h1>Attendance<small>(Login required for administrator privileges)</small></h1>';   
    }
          
?>
</body>

</html>
