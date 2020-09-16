


<?php
session_start();
  require_once("confs/config.php");
  include('theme.php');

 // include("confs/auth.php");
/* select orders_detail.*,product.* from orders_detail left join product on orders_detail.product_id=product.product_id where orders_detail.order_id='$orderid'"*/
  if(isset($_GET['brand'])){
    $brand_id = $_GET['brand'];
    $result = mysqli_query($conn, "SELECT  product.*,brand.* FROM product left join brand on brand.brandid = product.brandid WHERE brand.brandid=$brand_id");
  }else{
    $result = mysqli_query($conn, "SELECT * FROM product ORDER BY productname ");
}
  
 $editbrand = mysqli_query($conn, "SELECT * FROM brand");

?>
<!DOCTYPE html>
<html>
<head>
<title>Yanant</title>
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/colors.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
</head>
<body class="<?php echo $productbody; ?>">
<?php
  include('header.php');
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 col-sm-6 mt-2">
      <?php
        include('productsidebar.php');
      ?>
    </div>

      <div class="col-md-9 col-sm-6">
		  <div class="row <?php echo $productbox; ?> text-white mt-2 rounded" style="height: 40px;">
	<h4 class="mx-auto">products</h4>
</div>
		  <div class="row">
  <?php while($row = mysqli_fetch_assoc($result)): ?>
<!--start of sub card-->
		  <div class="col-md-4 col-sm-12 mt-2 mb-2">
<div class="card border-0 <?php echo $productbox; ?> text-white">
    <div class="card-body">
<img src="photo/<?php echo $row['photo'] ?>" class="img-fluid rounded" style="height:200px;width:200px;"  alt="Image">
<?php                    $qty=$row['brandid'];
                         $pid=$row['productid'];
                         $total="select * from product where brandid='$qty'";
						 $get_total=mysqli_query($conn,$total);
             $bnum =mysqli_fetch_assoc($get_total);
                         $pqty="select  * from product where productid='$pid'";
            $ttotal=mysqli_query($conn,$pqty);
						 $num =mysqli_fetch_assoc($ttotal);
									?>
	<span class="badge badge-warning"><h6>Quantity</h6></span>&nbsp;<span><?php echo $num['quantity']; ?></span> 
    	
		<div class="container-fluid text-left">
			<br>
		<h5 align="left">
				<i class="fa fa-bookmark">&nbsp;<?php echo $row['productname'] ?>
				</i>
					<br>
				<i class="fa fa-dollar">-<?php echo $row['price'] ?>
				</i>
					<br>
		</h5>
			</div>
				<div class="btn btn-group">
				<a href="AddtoCard.php?id=<?php echo $row['productid'] ?>" class="btn btn-block <?php echo $productbtn; ?>">AddtoCard</a>
				</div>
    </div>
  </div>
  </div>
<!--end of sub card-->
  <?php endwhile; ?>
	</div>
  </div>
  </div>
  </div>
	<?php include('footer.php'); ?>
</body>
</html>
