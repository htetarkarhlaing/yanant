<?php 
include("confs/config.php");
include 'functions.php';
session_start();
$id=$_GET['id'];
$query="select quantity from product where productid='$id'";
$go_query=mysqli_query($conn,$query);
while($out=mysqli_fetch_assoc($go_query)){
$qty=$out['quantity'];
$a=$_SESSION['cart'][$id];
if($a<$qty){
$_SESSION['cart'][$id]++;
header("location:cart.php");
}
echo "<script>window.alert('This product is limited ,Today')</script>";
echo "<script>window.location.href='cart.php'</script>";
}
?>