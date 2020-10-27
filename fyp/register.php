<?php
  require "Include/header.php";
 ?>

<?php
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

<!-- HTML CODE -->
<div class="register-input-field">
    <h1>Register</h1>
    <form id="loginform" method="POST">
        <div class="form-group">
            <label>Id </label>
            <label class="required">*</label>
            <input type="number" class="logininput" name="id" placeholder="id" required />
        </div>
        <div class="form-group">
            <label>Type</label>
            <label class="required">*</label>
            <input type="number" class="logininput" name="type" placeholder="type" required />
        </div>
        <div class="form-group">
            <label>Username </label>
            <label class="required">*</label>
            <input type="text" class="logininput" name="username" placeholder="username" required />
        </div>
        <div class="form-group">
            <label>Email </label>
            <label class="required">*</label>
            <input type="email" class="logininput" name="email" placeholder="email" required />
        </div>
        <div class="form-group">
            <label>Password </label>
            <label class="required">*</label>
            <input type="password" class="logininput" name="password" placeholder="password" required />
        </div>
        <div class="form-group">
            <label>Retype Password </label>
            <label class="required">*</label>
            <input type="password" class="logininput" name="pwd-repeat" placeholder="Retype Password" required />
        </div>
        <button type="submit" name="register-submit">Register</button>
        <button type="reset" name="register-reset-btn">Reset</button>
    </form>
</div>
