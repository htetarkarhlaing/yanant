<?php

	include("../confs/config.php");
	include("../confs/auth.php");
	
	 if(isset($_GET['action'])&&$_GET['action']=='edit'){
						  	
								$brand_id=$_GET['b_id'];
								$query="select * from brand where brandid='$brand_id'";
								$go_query=mysqli_query($conn,$query);
								while
								($out=mysqli_fetch_array($go_query))
								{
									$brandname=$out['brandname'];
								}
	 }

			if(isset($_POST['update_brand']))
			
			{ 
			$brandname=$_POST['name'];
	$b_id=$_GET['b_id'];
	$query="update brand set brandname='$brandname' where brandid='$b_id'";
	$go_query=mysqli_query($conn,$query);
	if(!$go_query)
	{
		die("QUERY FAILED".mysqli_error($conn));
	}
 		header("location:brandlist.php");
				
			}
        
	
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
		

		<div class="panel-heading">
			<center><h3><i>Update Brand </i></h3></center>
			<hr>
			<form action="#" method="post" >
				<div class="form-group">

				    <label class="control-label" for="name">Brand Name</label>

				      <input type="text" class="form-control" name="name" value="<?php echo $brandname ?>" />
				    
				</div>

		

				<div class="form-group">

			    	<button type="submit" name="update_brand" class="btn btn-success btn-block">Update</button>
			  	</div>

			</form>
		</div>
	</div>
</div>


<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>