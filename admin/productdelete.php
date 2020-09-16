<?php
include("../confs/config.php");
include("../confs/auth.php");

$id = $_GET['id'];
$sql = "DELETE FROM product WHERE productid = $id";
mysqli_query($conn, $sql);

header("location: productlist.php");

?>