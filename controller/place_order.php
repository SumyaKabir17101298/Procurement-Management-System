<?php
	error_reporting(0);
	require("config.php");
	session_start();
		if(isset($_SESSION['manager_login'])) {

			$pro_name = $_GET['id'];
			$query_addProduct =  "UPDATE products SET pro_st= 'Bidding' WHERE pro_name='$pro_name'";
					if(mysqli_query($con,$query_addProduct)) {
						echo "<script> alert(\"Product added for bidding\"); </script>";
						header('Refresh:2;url="../View/Manager/index.php"');
					}
					else {
						$requireErr = "Adding Product Failed";
					}

			
		}
	else {
		header('Location:../../index.php');
	}
?>