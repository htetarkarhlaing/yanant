<?php
include("../confs/config.php");
	include("../confs/auth.php");
$id=$_GET['id'];
$status=$_GET['status'];
if($status==1){
	$query="update orders set status=1,senddate=now() where orderid='$id'";
	$go_update=mysqli_query($conn,$query);
	header("location:orders.php");
}else{
	$query="update orders set status=0,senddate='null' where orderid='$id'";
	$go_update=mysqli_query($conn,$query);
	header("location:orders.php");
}
	

?>