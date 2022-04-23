<?php
	include("../../controller/config.php");
	session_start();
	if(isset($_SESSION['user_login'])) {
		if($_SESSION['user_login'] == true) {

			//select last 5 products
			$query_selectProducts = "SELECT * FROM products ";
			$result_selectProducts = mysqli_query($con,$query_selectProducts);
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
	<title> User: Home </title>
	<link rel="stylesheet" href="../../controller/main_style.css" >
</head>
<body>
	<?php
		include("../../controller/header.inc.php");
		
		
		include("../../controller/aside_user.inc.php");
		include("../../controller/logout.inc.php");
	?>
	<section>
		
	      <h1>Welcome User</h1>
		
		
		
			<h2>Recently Added Products </h2>
			
			<form action="" method="POST" class="form">
			<ul class="form-list">
			    <table class="table_displayData">
			       <tr>
			
				    <th>Product Name </th>
				
				
				
				   <th> Status </th>
			       </tr>
			        <?php $i=1; while($row_selectProducts = mysqli_fetch_array($result_selectProducts)) { ?>
			         <tr>
			
				     <td> <?php echo $row_selectProducts['pro_name']; ?> </td>
				
				
				     <td> <?php if($row_selectProducts['pro_st'] == NULL){ echo "Pending";} else {echo $row_selectProducts['pro_st'];} ?> </td>
			         </tr>
			          <?php $i++; } ?>
				</table>
				</u1>
			</form>
			
			
			


	</section>
<?php
  include("../../controller/footer.inc.php");
?>
</body>
</html>