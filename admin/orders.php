<?php
//session_start();
include("../confs/config.php");
	include("../confs/auth.php");
	$orders=mysqli_query($conn,"select * from orders order by orderid desc");
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
<?php
 include 'header.php'
?>
  <div class="container-fluid">
       <div class="row">
		   <div class="col-md-10 mx-auto">
             <table border="0" class="table table-responsive table-hover">
  <tr>
    <td>No</td>
    <td>Customer Name</td>
    <td>Phone</td>
    <td>Delivery Address</td>
    <td>Item(s)</td>
    <td>Ordered_Date</td>
    <td>Sended_Date</td>
    <td>Action</td>
  </tr>
  
  
  <?php while($out=mysqli_fetch_array($orders)){
	  $check=$out['status'];
		{
			if($check>0){
				$show='<tr class="mark">';
			}
				else{
		   $show='<tr>';
				}
           $show.='<td>'.$out['orderid'].'</td>';
		   $show.='<td>'.$out['deliveryname'].'</td>';	
		   $show.='<td>'.$out['deliveryphone'].'</td>';	  
		   $show.='<td>'.$out['deliveryaddress'].'</td>';
			$show.='<td>';
			$orderid=$out['orderid'];
		$order=mysqli_query($conn,"select orderdetail.*,product.* from orderdetail left join product on orderdetail.productid=product.productid where orderdetail.orderid='$orderid'");
											 while($row=mysqli_fetch_assoc($order)){
												 $show.='<ul><li>'.$row['productname'].'<span style="color:red;">
												 ['.$row['productqty'].']</span></li></ul>';}
											$show.='</td>';
											$show.='<td>'.$out['orderdate'].'</td>';
											
											$chesec=$out['status'];
											if($chesec>0)
											{$show.='<td>'.$out['senddate'].'</td>';}
											else{
												$show.='<td>----/--/--</td>';}
												
												if($out['status']){
						$show.='<td><a href="status.php?id='.$out['orderid'].'&status=0" class="btn btn-danger">
						Undo</a></td>';}
						else{ $show.='<td><a href="status.php?id='.$out['orderid'].'&status=1" class="btn btn-success">
						Mark as Delivered</a></td>';}
						$show.='</tr>';
						echo $show; }
  }
	?>
				 </table>
			   </div>
	
		 </div>
	  
	</div>
</body>
</html>