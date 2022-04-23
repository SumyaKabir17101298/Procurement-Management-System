<?php
	include("../../controller/config.php");
	session_start();
	if(isset($_SESSION['manager_login'])) {
		if($_SESSION['manager_login'] == true) {

			
			$query_selectProducts = "SELECT * FROM products ";
			$result_selectProducts = mysqli_query($con,$query_selectProducts);
			$query_selectProducts1 = "SELECT * FROM products WHERE bid_price != NULL";
			$result_selectProducts1 = mysqli_query($con,$query_selectProducts1);
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				if(!empty($_POST['price'])) {
					$priceHolder = $_POST['price'];
					$price = $_POST['price'];
				
				
				
				  if($price != NULL) {
					
				    
			   }
				else {
					$requireErr = "* All Fields are Compulsory with valid values except Description";
				}
			
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
	<title> Manager: Home </title>
	<link rel="stylesheet" href="../../controller/main_style.css" >
</head>
<body>
	<?php
		include("../../controller/header.inc.php");
		
		include("../../controller/logout.inc.php");
	?>
	<section>
	<h1>	Welcome <?php echo $_SESSION['sessUsername']; ?> </h1>
		
	
		<h2>Recently Added Products for Bidding</h2>
		<form action="" method="POST" class="form">
		<ul class="form-list">
			<table class="table_displayData">
			<tr>
			
				<th>Product Name </th>
				<th> Status </th>
				
				<th>   </th>
				<th>   </th>
				<th>   </th>
			</tr>
			<?php $i=1; while($row_selectProducts = mysqli_fetch_array($result_selectProducts)) { ?>
			<tr>
			
				<td> <?php echo $row_selectProducts['pro_name']; ?> </td>
				
				
				<td> <?php if($row_selectProducts['pro_st'] == NULL){ echo "Pending";} else {echo $row_selectProducts['pro_st'];} ?> </td>
				
				<td> <a href="../../controller/place_order.php?id=<?php echo $row_selectProducts['pro_name']; ?>"><input type="button" value="Send to vendor"  class="submit_button"/></a></td>
				<td> <a href="../../controller/decline_order.php?id=<?php echo $row_selectProducts['pro_name']; ?>"><input type="button" value="Decline" class="submit_button"/></a></td>
				<td> <a href="../../controller/delete_order.php?id=<?php echo $row_selectProducts['pro_name']; ?>"><input type="button" value="Delete" class="submit_button"/></a></td>
			</tr>
			<?php $i++; } ?>
		</table>
		</ul>
		</form>
		</section>
		<section>
		
		
		
		    <h2>Bidded Products</h2>
			   <table class="table_displayData">
			<tr>
			
				<th>Product Name </th>
				
				<th> Bid Price  </th>
				<th>   </th>
			</tr>
			<?php $i=1; while($row_selectProducts1 = mysqli_fetch_array($result_selectProducts1)) { ?>
			<tr>
			
				<td> <?php echo $row_selectProducts['pro_name']; ?> </td>
				
				
				<td> <?php echo $row_selectProducts['bid_price'] ?> </td>
				
				<td> <input id="confirm" type="submit" name="confirm" class="submit_button"  /> </td>
			</tr>
			<?php $i++; } ?>
		</table>
	 		
	</section>
	
	<?php	
	include("../../controller/footer.inc.php");
	?>	
</body>
</html>