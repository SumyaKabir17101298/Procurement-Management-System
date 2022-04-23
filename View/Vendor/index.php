<?php
	include("../../controller/config.php");
	session_start();
	if(isset($_SESSION['vendor_login'])) {
		if($_SESSION['vendor_login'] == true) {
			
			$query_selectProducts = "SELECT * FROM products WHERE pro_st='Bidding'";
			$result_selectProducts = mysqli_query($con,$query_selectProducts);
			$priceHolder ="";
			

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
	<title> Vendor: Home </title>
	<link rel="stylesheet" href="../../controller/main_style.css" />
</head>
<body>
	<?php
		include("../../controller/header.inc.php");
		include("../../controller/logout.inc.php");
		
	?>
	<section>
		<h1>Welcome <?php echo $_SESSION['sessUsername']; ?></h1>
		
		<article>
			<h2>Bidding Orders</h2>
			<form name = "form" action="" method="post" class="form">
		    <ul class="form-list">
			   <table class="table_displayData">
			     <tr>
			
				<th>Product Name </th>
				<th> Status </th>
				<th> Previous Best Bid </th>
				
				<th> Bidding Price  </th>
				<th>   </th>
				
			</tr>
			<?php $i=1; while($row_selectProducts = mysqli_fetch_array($result_selectProducts)) { ?>
			<tr>
			
				<td> <?php echo $row_selectProducts['pro_name']; ?> </td>
                <td> <?php if($row_selectProducts['pro_st'] == NULL){ echo "Pending";} else {echo $row_selectProducts['pro_st'];} ?> </td>
				<td> <?php if($row_selectProducts['bid_price'] == 0){ echo "No Bidding yet";} else {echo $row_selectProducts['pro_st'];} ?> </td>
				<td> <input type="number" value=" ৳" name="bidding_price" /></td>
				<td> <a href="../../controller/place_bid.php?name=<?php echo $row_selectProducts['pro_name']; ?>" > <input type="button" name="submit" value="Bid" class="submit_button"/></a></td>
				
			</tr>
			<?php $i++; } ?>
		    </table>
		   </ul>
		   </form>
		</article>
	</section>
	<?php
		include("../../controller/footer.inc.php");
	?>
</body>
</html>