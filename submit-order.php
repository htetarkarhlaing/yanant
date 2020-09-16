<?php 
	session_start();
	include 'confs/config.php';
include('theme.php');
	include 'functions.php';
	if(!empty($_SESSION['user']))
		{
			$user_name=$_SESSION['user'];
			$query="select * from user where username='$user_name'";
			$go_query=mysqli_query($conn,$query);
			while($out=mysqli_fetch_array($go_query))
			{
				$user_id=$out['userid'];
				$user_name=$out['username'];
				$email=$out['email'];
				$phone=$out['phone'];
				$address=$out['address'];
			}
		}
?>
<!DOCTYPE html">
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

<body class="<?php echo($orderbody); ?>">
<?php
 include 'header.php'
?>
  <div class="container-fluid">
     <div class="row">
      
             

<div class="card col-md-8 mx-auto mt-4 mb-4 pink darken-4">
	<div class="card-header border-0 text-white"><h4 align="center">Sumit Order</h4></div>
<form action="submit.php" method="post">
<div class="card-body bg-white">
<div class="form-group">
<label>User Name</label>
<input type="text" value="<?php if(isset($user_name)){echo $user_name;}?>" name="username" class="form-control" />
</div>

<div class="form-group">
<label>Email</label>
<input type="text" value="<?php if(isset($email)){echo $email;}?>" name="email" class="form-control" />
</div>

<div class="form-group">
<label>Phone</label>
<input type="text" value="<?php if(isset($phone)){echo $phone;}?>" name="phone" class="form-control" />
</div>

<div class="form-group">
<label>Address</label>
<textarea name="address" class="form-control">
<?php if(isset($address)){echo $address;}?>
</textarea>
</div>

<div class="form-group">
<label>Payment Type</label>
<select name="payment_type" class="form-control">
<option value="Master Card">Master Card</option>
<option value="Visa Card">Visa Card</option>
<option value="Credit Card">Credit Card</option>
</select>
</div>

<div class="form-group">
<label>CardNo:</label>
<input type="text" name="cardno" class="form-control" />
</div>

<div class="form-group">
<input type="hidden" value="<?php echo $user_id ?>" name="user_id" />
<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</div>
</div>
</form>
</div>
</div>

</div>
	<?php include('footer.php'); ?>
</body>
</html>