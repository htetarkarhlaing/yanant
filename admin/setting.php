<?php

	include("../confs/config.php");
	include("../confs/auth.php");

	if(isset($_REQUEST['update'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "UPDATE admin SET name='$name', email='$email', password='$password' WHERE id = 1";

    	mysqli_query($conn, $sql);
	}

	$admin = mysqli_query($conn, "SELECT * FROM admin WHERE id = 1");
  	$edit = mysqli_fetch_assoc($admin);
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
<div class="container-fluid">
	<div class="col-md-6 mx-auto">
		<?php if(isset($_REQUEST['update'])){ ?>
			<div class="alert alert-success"><strong>SUCCESS!</strong>Updated!</div>
		<?php } ?>

		<div class="jumbotron">
			<h5><i>SETTING</i></h5>
			<hr>
			<form action="setting.php" method="post" enctype="multipart/form-data">
				<div class="form-group">

				    <label class="control-label" for="name">Name</label>

				      <input type="text" class="form-control" name="name" value="<?php echo $edit['name'] ?> " required />
				    
				</div>

				<div class="form-group">

				    <label class="control-label" for="name">Email</label>

				      <input type="email" class="form-control" name="email" value="<?php echo $edit['email'] ?>" required />
				    
				</div>

				<div class="form-group">

				    <label class="control-label" for="name">New Password</label>

				      <input type="password" class="form-control" name="password" required />
				    
				</div>

				<div class="form-group">

			    	<button type="submit" name="update" class="btn btn-success btn-block">Go</button>
			  	</div>

			</form>
		</div>
	</div>
</div>


<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>