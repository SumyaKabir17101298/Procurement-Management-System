<?php
	error_reporting(0);
	require("config.php");
	session_start();
		if(isset($_SESSION['vendor_login'])) {
            $bidPrice = $_POST('bidding_price');
			$pro_name = $_GET['name'];
			$vendor_name =  $_SESSION['sessUsername'];
			
			$query_addProduct =  "UPDATE products SET bid_price= '$bidPrice', bidder_name= '$vendor_name'  WHERE pro_name='$pro_name'";
					if(mysqli_query($con,$query_addProduct)) {
						echo "<script> alert(\"Product Deleted\"); </script>";
						header('Refresh:2;url="../View/Vendor/index.php"');
					}
					else {
						$requireErr = "Adding Product Failed";
					}

			
		}
	else {
		header('Location:../../index.php');
	}
	
	
?>
