
<?php
  require_once("../confs/config.php");

  include("../confs/auth.php");
 $result = mysqli_query($conn, "SELECT * FROM product ORDER BY productid DESC");
 
 
?>
 


<!DOCTYPE html>
<html>
<head>
 <title>Yanant</title>
<link rel="shortcat icon" href="../images/favicon.ico">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../css/colors.css"/>
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css"/>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
</head>
<body>
<?php
  include('header.php');
?>

<div class="container-fluid mt-3">
	<div class="row">
      <div class="col-md-12" align="right">
            <a href="product.php" class="btn btn-large btn-info" >
      <i class="fa fa-plus"></i> &nbsp; Add News Product</a><br><br>
		</div>
        </div>
        <div class="row">
<?php while($row = mysqli_fetch_assoc($result)): ?>
     <div class="col-md-3 col-sm-12 mt-3">
    
    <img src="../photo/<?php echo $row['photo'] ?>" class="img-fluid img-thumbnail rounded" style="width: 300px; height: 300px;"  alt="Image"><br>
          <h4><b><?php echo $row['productname'] ?></b></h4>
        
          <h6>Price: $<?php echo $row['price'] ?></h6>
          <h6>Quantity: <?php echo $row['quantity'] ?></h6>
           <div class="row">
            <a href="productedit.php?id=<?php echo $row['productid'] ?>" class="btn blue"><i class="fa fa-edit"></i> &nbsp; Edit</a>
            <a href="productdelete.php?id=<?php echo $row['productid'] ?>" class="btn red"><i class="fa fa-trash"></i> &nbsp; Delete</a>
          </div>
      </div>
      
        <?php endwhile; ?>
</div><!-- row -->

  </div>


    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
