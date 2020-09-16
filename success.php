<?php 
	session_start();
	require_once("confs/config.php");
    include('theme.php');
	$order_id=$_SESSION['orderid'];
	//$_SESSION['orderid']=$order_id;
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yanant</title>
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/colors.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
</head>
	
	
<body class="<?php echo($successbody); ?> ">
<?php
 include 'header.php';
?>
  <div class="container-fluid <?php echo($successinnerbg); ?> mt-5 mb-5">

<div class="row">
<div class="col-md-8 mx-auto bg-white">
    <table class="table  <?php echo($successtext); ?>">
  <tr>
    <td colspan="4" class="<?php echo($successheadertext); ?> text-center" ><h2>&nbsp; Order_information</h2></td>
    </tr>
  <tr>
    <td>Product Name</td>
    <td>Product Price</td>
    <td>Product Qty</td>
    <td>Unit Price</td>
  </tr>
  <?php $total=0;
 		$query="select orderdetail.*,product.* from orderdetail left join product on orderdetail.productid=product.productid where orderdetail.orderid='$order_id'";
		$go_query=mysqli_query($conn,$query);
		while($out=mysqli_fetch_array($go_query))
		{
			$product_name=$out['productname'];
			$price=$out['price'];
			$qty=$out['productqty'];
			$unit_price=$qty*$price;
			$total+=$unit_price;
			
			echo "<tr>
			<td>{$product_name}<br></td>
			<td>{$price}<br></td>
			<td>{$qty}<br></td>
			<td>{$unit_price}</td>
			</tr>";
		}
  
  
  ?>
  <tr>
  	<td colspan="3" align="right">Total Amount is </td>
    <td>$<?php echo $total; ?></td>
    </tr>
</table></div>
	  </div>
</div>
	<?php include('footer.php'); ?>
</body>
</html>