<?php
include("confs/config.php");
include('theme.php');
	session_start();
	include 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Yanant</title>
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/colors.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
</head>
<body class="<?php echo $cartbody; ?>">
<?php
	include("header.php")
?>
  <div class="container mt-3 mb-3">
     <div class="row">
        <div class="card col-md-12 col-sm-12 mx-auto <?php echo $cartbox; ?>"> 
             <div class="card-header text-white">
             <h4>Shopping Cart</h4>
             
             </div>
             <?php
			 if(!empty($_SESSION['cart'])):  ?>
           
             <div class="card-body bg-white">
             <table class="table table-hover" >
  <tr>
    <th>Photo</th>
   <th>Name</th>
   <th>Quantity</th>
   <th>Unit Price</th>
   <th>Price</th>
  <th>Action</th>
  </tr>
  <?php
		$total=0;
		foreach($_SESSION['cart'] as $id=>$qty):
		$result=mysqli_query($conn,"SELECT * FROM product WHERE productid =$id");
		$row=mysqli_fetch_assoc($result);
		$total+=$row['price'] *$qty;
		
			 ?>
             <tr>
             <td><img src="photo/<?php echo $row['photo'] ?>" width="100" height="100" class="img img-thumbnail" /></td>
             <td><?php echo $row['productname'] ?></td>
             <td><?php echo $qty ?>
             <span>
             <a href="increase_qty.php? id=<?php echo $id ?>" class="fa fa-plus"></a>&nbsp;|&nbsp;
             <a href="decrease_qty.php?id=<?php echo $id ?>" class="fa fa-minus"></a></span></td>
             <td><?php echo $row['price'] ?> </td>
			 <td><?php echo $row['price'] *$qty ?> </td>
             <td>
             <span style="margin:5px"></span>
              <a href="remove.php?id=<?php echo $id ?>" class="fa fa-ban"></a></td></tr>
              <?php endforeach; ?>
              <tr>
              <td colspan="5" align="right"><b>Total:</b></td>
              <td>$<?php echo $total; ?></td>
              </tr>
             
</table>
</div>

<div class="card-footer border-0 text-white">
	<div class="row mr-0">
<a href="clear.php" class="btn btn-danger">Clear Cart</a>&nbsp;
<a href="product.php" class="btn btn-primary"> Back </a>&nbsp;
<a href="submit-order.php" class="btn btn-success">Submit Order</a>
	</div>
</div>

<?php else: ?>
				 
<h3 class="text-danger text-center">You Select no products now!</h3>
<p class="text-center"><a href="product.php" class="btn btn-info">Shop Now</a></p>
				
<?php endif; ?> 
		</div>
  </div><!--row-->
</div>
   <?php include('footer.php'); ?>
</body>
</html>