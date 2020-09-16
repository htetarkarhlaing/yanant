<?php
include("confs/config.php");
include('theme.php');
session_start();
$result = mysqli_query($conn, "SELECT  * FROM product order by productid desc limit 3 ");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Yanant</title>
 <link rel="shortcut icon" href="images/favicon.ico">
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="css/colors.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body class="<?php echo $indexbody; ?> <?php echo $indextext; ?>">
	<?php include('header.php'); ?>

	<div class="container-fluid" style="padding-top: 20px;">
	<!-- carousel frame-->
	<div id="indexcs" class="carousel slide col-md-11 mx-auto" data-ride="carousel">
  		<div class="carousel-inner">
    		<div class="carousel-item active" data-interval="2000">
      		<img src="images/indexcover1.png" class="d-block w-100 img-fluid" alt="">
    		</div>
    		<div class="carousel-item" data-interval="2000">
      		<img src="images/indexcover2.png" class="d-block w-100 img-fluid" alt="">
    		</div>
    		<div class="carousel-item" data-interval="2000">
      		<img src="images/indexcover3.png" class="d-block w-100 img-fluid" alt="">
    		</div>
  		</div>
		
  <a class="carousel-control-prev" href="#indexcs" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#indexcs" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><br>

	<!-- end carousel frame-->
	
<div class="row">
  <div class="container-fluid">
	  <div class="<?php echo $indexinner0; ?> pb-1"><h3 align="center" class="<?php echo $indexheadertext; ?>"><i>Our New Product</i></h3></div><br>

      <div class="row">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="card col-md-3 col-sm-6 mx-auto border-0 <?php echo $indexinner1; ?>">
            <div class="card-header border-0  <?php echo $indexinner1; ?>">
				<h4 align="center"><?php echo $row['productname']?></h4>
			</div>
            <div class="card-body border-0 bg-transparent">
              <img src="photo/<?php echo $row['photo'] ?>" alt="" class="card-img" height="300px">
            </div>
            <div class="card-footer border-0  <?php echo $indexinner1; ?>">
              <h6 align="right">$<?php echo $row['price'] ?></h6>
            </div>
        </div>
      <?php endwhile; ?>
      </div>
    </div> 
	</div>
		</div>
	
	<hr>
	<br>
    
<?php
include("footer.php");
?>


  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>