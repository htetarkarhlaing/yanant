<?php
  require_once("../confs/config.php");
  include("../confs/auth.php");
if(isset($_GET['action'])&& $_GET['action']=='delete'){
						
						
						$cat_id=$_GET['b_id'];
			$query="delete from brand where brandid='$cat_id'";
			$go_query=mysqli_query($conn,$query);
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
<div class="row">

<div class="col-md-10 mx-auto">
<div class="table-responsive">
<div class="panel panel-heading">

<table class="table table-hover  table-striped  ">
    <thead>
      <tr ><th colspan="2"><center><i><h3>Brand List</h3></i></th>
      <td align="right"><a href="brand.php" class="btn btn-default btn-success"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Brand</a><br><br>
      </tr>
    </thead>
    <tbody>
      
   <tr >
        <th><font size="4">ID</font></th>
        <th><font size="4">Name</font></th>
        <th><font size="4">Actions</font></th>
      </tr>
     <?php $query="select * from brand";
										$go_query=mysqli_query($conn,$query);
										while($row=mysqli_fetch_array($go_query))
											{
												$b_id=$row['brandid'];
												$b_name=$row['brandname'];
												echo"<tr>";
												echo"<td>{$b_id}</td>";
												echo"<td>{$b_name}</td>";
												echo"<td><a href='brandedit.php?action=edit&b_id={$b_id}'
												 class=\"btn btn-sm btn-info\"><i class=\"glyphicon glyphicon-edit\"></i> &nbsp; Edit</a>&nbsp;</a>|
												<a href='brandlist.php?action=delete&b_id={$b_id}'onclick=\"return confirm('Are you sure')\" class=\"btn btn-sm btn-danger\" ><i class=\"glyphicon glyphicon-trash\"></i>&nbsp;&nbsp;&nbsp;Delete</a></td>";
												echo"</tr?>";
												
											}
											?>
    </tbody>
  </table>
  </center>
</div>
</div>
</div>
</div>
</div>

<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>