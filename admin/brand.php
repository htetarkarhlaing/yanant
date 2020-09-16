<?php

	include("../confs/config.php");
	include("../confs/auth.php");

  		if(isset($_POST['add']))
		{
			$brandname=$_POST['name'];
	 if($brandname==""){
			 echo"<script>window.alert('enter name')</script>";
		 }
	 elseif($brandname!="")
	 	{
			$query="select * from brand where brandname='$brandname'";
			$ch_query=mysqli_query($conn,$query);
			$count=mysqli_num_rows($ch_query);
				if($count>0)
				{
					echo"<script>window.alert('already exists')</script>";
				}
				else
				{
					$query="insert into brand(brandname)values('$brandname')";
					$go_query=mysqli_query($conn,$query);
					if(!$go_query)
					{
						die("QUERY FAILED".mysqli_error($conn));}
						else{
							echo"<script>window.alert('successfully inserted')</script>";
									header("location:brandlist.php");
							}
						
						}
				}
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
		

		<div class="panel page-header">
			<center><h3><i>Brand Entry</i></h3></center>
			<hr>
			<form action="#" method="post" >
				<div class="form-group">

				    <label class="control-label" for="name">Category Name</label>

				      <input type="text" class="form-control" name="name" required />
				    
				</div>

		

				<div class="form-group">

			    	<button type="submit" name="add" class="btn btn-success btn-block">Add</button>
			  	</div>

			</form>
		</div>
	</div>
</div>

<?php
//include("footer.php");
?>


<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>