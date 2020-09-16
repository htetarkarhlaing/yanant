<?php
	session_start();
	include 'confs/config.php';
	 //include("confs/auth.php");
	 	$id=$_POST['user_id'];
		$user_name=$_POST['username'];
		$phone=$_POST['phone'];
		
		$address=$_POST['address'];
		$query="insert into orders(orderdate,customerid,deliveryname,deliveryphone,deliveryaddress,status)";
		$query.="values(now(),'$id','$user_name','$phone','$address',0)";
		$go_query=mysqli_query($conn,$query);
		if(!$go_query){
			echo "Something went wrong".mysqli_error($conn);	
		}
		
	$order_id=mysqli_insert_id($conn);
	foreach($_SESSION['cart'] as $id=>$qty)
	{
		$getprice=mysqli_query($conn,"select * from product where productid='$id'");
		while($out=mysqli_fetch_array($getprice))
		{
			$pid=$out['productid'];
			$db_price=$out['price'];
		}
			$amount=$db_price * $qty;
			$query="insert into orderdetail(orderid,productid,productqty,amount)";
			$query.="values('$order_id','$id','$qty','$amount')";
			$go_query=mysqli_query($conn,$query);
			$qt="update product set quantity=quantity-'$qty' where productid='8'";
			$g=mysqli_query($conn,$qt);
			
	}
$_SESSION['orderid']=$order_id;
unset($_SESSION['cart']);
header("location:success.php");
?>