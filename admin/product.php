<?php
  include("../confs/auth.php");
  include("../confs/config.php");
  	  if(isset($_POST['go']))
  {
	  $product_name=$_POST['product_name'];
	  $cat_id=$_POST['brand_id'];
	  $price=$_POST['price'];
	  $qty=$_POST['qty'];
	  $photo=$_FILES['photo']['name'];
			if(is_numeric($price)==false)
     {
		 echo "<script>window.alert('enter product Price is numeric value')</script>";
	 }
	  
	 elseif($photo==""){
		  echo "<script>window.alert('Choose product Images')</script>";
	 }
	 
	 elseif($product_name!=""&&$photo!=""){
		 $query="select * from product where product_name='$product_name'";
		 $ch_query=mysqli_query($connection,$query);
		 $count=mysqli_num_rows($ch_query);
		 if($count>0){
			 echo "<script>window.alert('This Product is already exists')</script>"; 
		 }
		 
		 else{ $query="insert into product(productname,brandid,price,quantity,photo)";
		       $query.="values('$product_name','$b_id','$price','$qty','$photo')";
			   $go_query=mysqli_query($conn,$query);
			   if(!$go_query){
				die("QUERY FAILED".mysqli_error($conn));   
			   }
			   else{
				   echo "<script language=\"javascript\">window.alert('successfully inserted')</script>";
				   move_uploaded_file($_FILES['photo']['tmp_name'],'../photo/'.$photo);
					header("location:productlist.php");   
			   }
			 
		 }
		 
	 }
  }
 
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
<center><h3 class="text-success"><i>Add Product </i></h3></center>
<hr>
<form class="form" action="#" method="post" enctype="multipart/form-data">
  
  <div class="form-group">

    <label class="control-label" for="name">Product Name</label>

    <input type="text" class="form-control" name="product_name" id="product_name" required/>
    
    </div>

  <div class="form-group">
      <label class="control-label" for="name">Brand Name</label>
    <select name="brand_id" class="form-control">
    <?php
	$query="select * from brand";
	$go_query=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($go_query)){
		$b_id=$row['brandid'];
		$b_name=$row['brandname'];
		echo"<option value={$b_id}>{$b_name}</option>";
	}
	?>
    </select>
  </div>

  <div class="form-group">

    <label class="control-label" for="name">Price</label>

      <input type="text" class="form-control" name="price" id="price" required/>
    
    </div>
    
    <div class="form-group">

    <label class="control-label" for="name">Quantity</label>

      <input type="text" class="form-control" name="qty" id="qty" required/>
    
    </div>

 <div class="form-group">

    <label class="control-label" for="main_photo">Photo</label>

        <input type="file" id="main" name="photo" class="file" data-show-preview="false" required>
    
    </div>
  <div class="form-group">

      <button type="submit" id="go" name="go" class="btn btn-success btn-block">Confirm</button>
      
  </div>
  </form>
  </div>
  </div>
  </div>

  
  <script src="../bootstrap/js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../bootstrap/js/fileinput.min.js"></script>
</body>
</html>