<?php
  include("../confs/auth.php");
  include("../confs/config.php");
 if(isset($_REQUEST['go'])){
  $id = $_POST['id'];
  $name = $_POST['name'];
  $brandid = $_POST['brandid'];
  $photo = $_FILES['photo']['name'];
  $price = $_POST['price'];
   $qty = $_POST['qty'];
  if(!$photo){
		  $query="update product set productname='$name',brandid='$brandid',price='$price',quantity='$qty' where productid='$id'";
	  }
   else{
		  $query="update product set productname='$name',brandid='$brandid',price='$price',quantity='$qty',photo='$photo' where productid='$id'";
	  }
	  $go_query=mysqli_query($conn,$query);
	  if(!$go_query){
		   die("QUEYR FAILED".mysqli_error($conn));
	  }
	  else{
		   move_uploaded_file($_FILES['photo']['tmp_name'],'../photo/'.$photo);
	  }
	   header("location:productlist.php");
}
 
  $id = $_GET['id'];

  $package = mysqli_query($conn, "SELECT * FROM product WHERE productid = '$id'");
  $edit = mysqli_fetch_assoc($package);
$cat = mysqli_query($conn, "SELECT * FROM brand");


 
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yanant</title>
	<link rel="shortcat icon" href="../images/favicon.ico">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../css/colors.css"/>
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css"/>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
</head>

<body>
<?php require_once('header.php'); ?>
<div class="container-fluid">
<div class="col-md-6 mx-auto">
<div class="jumbotron">
<h5><i>PACKAGE INPUT</i></h5>
<hr>
<form class="form" action="#" method="post" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $edit['productid'] ?>" name="id">
  
  <div class="form-group">

    <label class="control-label" for="name">Product Name</label>

      <input type="text" class="form-control" name="name" id="name" value="<?php echo $edit['productname'] ?>" />
    
    </div>

 <div class="form-group">
      <label for="cat">brand</label>
      <select class="form-control" id="brand" name="brandid">
      <?php while($row = mysqli_fetch_assoc($cat)): ?>
        <option value="<?php echo $row['brandid'] ?>"><?php echo $row['brandname'] ?></option>
      <?php endwhile; ?>
      </select>
  </div>


<div class="form-group">

    <label class="control-label" for="name">Price</label>

      <input type="text" class="form-control" name="price" id="price" value="<?php echo $edit['price'] ?>" required/>
    
    </div>
  
 <div class="form-group">

    <label class="control-label" for="name">Quantity</label>

      <input type="text" class="form-control" name="qty" id="qty" value="<?php echo $edit['quantity'] ?>" required/>
    
    </div>

  <div class="form-group">

    <label class="control-label" for="main_photo"> Photo</label>

        <input type="file" id="main" name="photo" class="file" data-show-preview="false" /> 
    
    </div>

    <center><img src="../photo/<?php echo $edit['photo'] ?>" width="200px" height="150px"></center>

  <div class="form-group"></div>
  <div class="form-group">

      <button type="submit" id="go" name="go" class="btn btn-success btn-block">Update</button>
     
  </div>
  </form>
  </div>
  </div>
  </div>

  <?php
include("footer.php");
?>

  
  <script src="../bootstrap/js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../bootstrap/js/fileinput.min.js"></script>
</body>
</html>