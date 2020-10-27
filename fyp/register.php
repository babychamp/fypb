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

if (isset($_POST['register-submit'])){
	
	$id = $_POST['id'];
	$type = $_POST['type'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$passwordRpt = $_POST['pwd-repeat'];
    $email = $_POST['email'];
	$type = 2;
	
	$sql = "SELECT email FROM users WHERE email=?";
	$stmt = mysqli_stmt_init($conn); // check if we can prepared the statement and connection
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo '<script type="text/javascript">
						alert("SQL error.");
					</script>';
    }else{
		mysqli_stmt_bind_param($stmt, "s",$email);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$resultCheck = mysqli_stmt_num_rows($stmt); // check whether email exist or not
		if($resultCheck > 0){
        echo '<script type="text/javascript">
						alert("Email is being taken or registered.");
					</script>';
		}else{
			if ($password !== $passwordRpt){
				echo '<script type="text/javascript">
						alert("Passwords do not match. Please try again.");
					</script>';
			}else{
				$sql = "INSERT INTO users (id, type, username, password, email) VALUES (?, ?, ?, ?, ?)";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				echo '<script type="text/javascript">
						alert("SQL error.");
					</script>';
			}else{
				// hash the password using bcrypt
				$hashPwd = password_hash($password, PASSWORD_DEFAULT);
				mysqli_stmt_bind_param($stmt, "issss",$id, $type, $username, $password, $email);
				mysqli_stmt_execute($stmt);
				echo '<script type="text/javascript">
					alert("Register Successful");
					window.location = "login.php";
				</script>';
				exit();
				}
			}	
		}
	}
	mysqli_stmt_close($stmt); // close the statement to save resources
	mysqli_close($conn);  // close the connection to save resources
}
?>

<div class="col-md-12">';
               <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        
            echo' <h1>Assets</h1>
          <div class ="container"> 
            <div class="row">';
           echo' <pigeon-table query="SELECT * FROM users" control="true" editable="true">';
            echo'</pigeon-table>';
            echo'</div>  ';     
        echo' </div>';
    echo'</div>';
        
    }else{
        echo'<p> Sorry, you need administrator privileges to view this page</p>';    
    }
          
?>
</body>

</html>