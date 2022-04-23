<?php
	include('controller/config.php');
	$reqErr = $loginErr = "";
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		if(!empty($_POST['txtUsername']) && !empty($_POST['txtPassword']) && isset($_POST['login_type'])){
			session_start();
			$username = $_POST['txtUsername'];
			$password = $_POST['txtPassword'];
			$_SESSION['sessLogin_type'] = $_POST['login_type'];
			
			
			if($_SESSION['sessLogin_type'] == "User") {
				$query_selectUser = "SELECT username,password FROM user WHERE username='$username' AND password='$password'";
				$result = mysqli_query($con,$query_selectUser);
				$row = mysqli_fetch_array($result);
					if($row) {
						$_SESSION['user_login'] = true;
						$_SESSION['sessUsername'] = $_POST['txtUsername'];
						$_SESSION['sessPassword'] = $_POST['txtPassword'];
						header('Location:View/User/index.php');
					}
					else {
						$loginErr = "* Username or Password is incorrect.";
					}
				}
			
			else if($_SESSION['sessLogin_type'] == "Manager") {
				
				$query_selectManufacturer = "SELECT username,password FROM manager WHERE username='$username' AND password='$password'";
				$result = mysqli_query($con,$query_selectManufacturer);
				$row = mysqli_fetch_array($result);
				if($row) {
					
					$_SESSION['sessUsername'] = $_POST['txtUsername'];
					$_SESSION['sessPassword'] = $_POST['txtPassword'];
					$_SESSION['manager_login'] = true;
					header('Location:View/Manager/index.php');
				}
				else {
					$loginErr = "* Username or Password is incorrect.";
				}
			}
			else if($_SESSION['sessLogin_type'] == "Vendor") {
				
				$query_selectVendor = "SELECT username,password FROM vendor WHERE username ='$username' AND password='$password'";
				$result = mysqli_query($con,$query_selectVendor);
				$row = mysqli_fetch_array($result);
				if($row) {
					
					$_SESSION['sessUsername'] = $_POST['txtUsername'];
					$_SESSION['sessPassword'] = $_POST['txtPassword'];
					$_SESSION['vendor_login'] = true;
					header('Location:View/Vendor/index.php');
				}
				else {
					$loginErr = "* Username or Password is incorrect.";
				}
			}
		}else {
			$reqErr = "* All fields are required.";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
	<link rel="stylesheet" href="controller/main_style.css" >
</head>
<body class="login-box">
	<h1>LOGIN</h1>
	<form action="" method="POST" class="login-form">
	<ul class="form-list">
	<li>
		<div class="label-block"> <label for="login:username">Username</label> </div>
		<div class="input-box"> <input type="text" id="login:username" name="txtUsername" placeholder="Username" /> </div>
	</li>
	<li>
		<div class="label-block"> <label for="login:password">Password</label> </div>
		<div class="input-box"> <input type="password" id="login:password" name="txtPassword" placeholder="Password" /> </div>
	</li>
	<li>
		<div class="label-block"> <label for="login:type">Login Type</label> </div>
		<div class="input-box">
		<select name="login_type" id="login:type">
		<option value="" disabled selected>-- Select Type --</option>
		<option value="Vendor">Vendor</option>
		<option value="Manager">Manager</option>
		<option value="User">User</option>
		</select>
		</div>
	</li>
	<li>
		<input type="submit" value="Login" class="submit_button" /> <span class="error_message"> <?php echo $loginErr; echo $reqErr; ?> </span>
	</li>
	</ul>
	</form>
</body>
</html>