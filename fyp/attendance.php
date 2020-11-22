<!DOCTYPE html>

<head>
    <title>Assets</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        echo' <div id="header-content">';

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
            </div>
        </div>';



        echo' </header>
            <div class="navbar">
                <a href="homepage.php">Home</a>
                <a href="assets.php">Assets</a>
                <a href="register.php">Register</a>
            </div>';
    
    
    
if(isset($_SESSION["loginid"])){
         $id = $_SESSION["loginid"];}
               if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $id =='1'){
                   
    
        
            echo'<h1>Staff Attendance</h1>';
                   

            $sql = "SELECT username, grade FROM users WHERE checkedin = 1";
                $result = $conn->query($sql);

            echo'<div class="container">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Grade</th>
                    </tr>';

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<tr><td>". $row["username"]. "</td><td>". $row["grade"]. "</td></tr>";
            }
            echo'</table>
            </div>
            </div>';
            } else {
            echo "0 results";
            }

           //SQL and display here
    }else{
     
        echo' <h1>Attendance<small>(Login required for administrator privileges)</small></h1>';   
    }
          
?>
</body>

</html>
