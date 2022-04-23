<?php
	include("../../controller/config.php");
	include("../../controller/validate_data.php");
	session_start();
	if(isset($_SESSION['user_login'])) {
		if($_SESSION['user_login'] == true) {
			
			
			
			
			$nameErr =  $requireErr  = $confirmMessage= "";
			$nameHolder = $priceHolder = $descriptionHolder = "";
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				if(!empty($_POST['txtProductName'])) {
					$nameHolder = $_POST['txtProductName'];
					$name = $_POST['txtProductName'];
				}
				
				
				if($name != NULL) {
					
				    $query_addProduct = "INSERT INTO products(pro_name) VALUES('$name')";
					if(mysqli_query($con,$query_addProduct)) {
						echo "<script> alert(\"Product Added Successfully\"); </script>";
						header('Refresh:0');
					}
					else {
						$requireErr = "Adding Product Failed";
					}
			}
				else {
					$requireErr = "* All Fields are Compulsory with valid values except Description";
				}
			}
		}
		else {
			header('Location:../../index.php');
		}
	}
	else {
		header('Location:../../index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Request Product </title>
	<link rel="stylesheet" href="../../controller/main_style.css" >
</head>
<body>
	<?php
		include("../../controller/header.inc.php");
		
		include("../../controller/aside_user.inc.php");
	?>
	<section>
		<h1>Request Product</h1>
		<form action="" method="POST" class="form">
		<ul class="form-list">
		<li>
			<div class="label-block"> <label for="product:name">Product Name</label> </div>
			<div class="input-box"> <input type="text" id="product:name" name="txtProductName" placeholder="Product Name" value="<?php echo $nameHolder; ?>" required /> </div> <span class="error_message"><?php echo $nameErr; ?></span>
		</li>

		<li>
			<input type="submit" value="Request Product" class="submit_button" /> <span class="error_message"> <?php echo $requireErr; ?> </span><span class="confirm_message"> <?php echo $confirmMessage; ?> </span>
		</li>
		</ul>
		</form>
	</section>
	<?php
		include("../../controller/footer.inc.php");
	?>
</body>
</html>