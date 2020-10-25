<?php
	// start the session()
	//session_start();
	require "Include/header.php";
?>

<h1>Login</h1>
<?php





		
	echo'<form id="loginform" method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
		<label for="username">Username: </label><br>
		<input type="text" name="username" class="logininput"><br><br>
    
		<label for="password">Password: </label><br>
		<input type="password" name="password" class="logininput"><br>
    

		<input type="submit" value="Login" id="login">
		</form>
</body>
</html>';  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	test_input($_POST["username"],$_POST["password"]);
}

function test_input($username,$password) {
	$match = false;
	$id = 0;
    $type = 0;
	$username = trim($username);
	$password = trim($password);
	$conn = connect();
	$sql = "SELECT * FROM users";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if($row["username"]==$username && $row["password"]==$password){
				$match = true;
				$id = $row["id"];
				$type = $row["type"];
			}
		}
	} else {
		echo "0 results";
	}
	if($match == true){
		session_start();
    
		$_SESSION["loggedin"] = true;
		$_SESSION["username"] = $_POST["username"];
		$_SESSION["loginid"] = $id;
        $_SESSION["type"] = $type;
		//$_SESSION["loginstatus"] = $status;
		if($type == "1" || $type == "2" || $type == "3"){
			header("refresh: 0; url=homepage.php");
		}else{
			header("refresh: 0; url=login.php");
		}
		
	}
}?>
