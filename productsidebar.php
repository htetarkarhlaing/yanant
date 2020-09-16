<?php
  require_once("confs/config.php");
 // require_once("confs/auth.php");
  $brand = mysqli_query($conn, "SELECT * FROM brand ORDER BY brandname ASC");
?>
<div class="container-fluid <?php echo $productsidebar_main; ?>">
<div class="row <?php echo $productsidebar_main; ?> rounded" style="height: 40px;">
</div>
<div class="row <?php echo $productsidebar_headerrow; ?> <?php echo $productsidebar_headertext; ?>">
	<h4 class="mx-auto">Brands</h4>
</div>
<div class="row pt-2 pb-2 rounded">
  <a href="product.php" class="btn btn-block">
<div class="col-md-12 col-sm-12">
                  <div class="card flex-row align-items-center align-items-stretch border-0">
                     <div class="col-4 d-flex align-items-center justify-content-center rounded-left <?php echo $allbrand; ?>">
						 <i class="fa fa-3x fa-shopping-bag"></i>
					 </div>
                     <div class="col-8 py-3 rounded-right <?php echo $brandboxbg; ?>">
                        <div class="h2 mt-0">All Brands</div>
						 <?php
                         $total="select * from product";
						 $get_total=mysqli_query($conn,$total);
						 $num =mysqli_num_rows($get_total);
									?>
                        <div class="text">
						 <button type="button" class="btn <?php echo $brandbtn; ?> text-white"> Products <span class="badge badge-warning">
					<?php echo $num; ?></span>
				</button>
						 </div>
                     </div>
                  </div>
               </div></a>
    <?php while($row = mysqli_fetch_assoc($brand)): ?>
  <a href="product.php?brand=<?php echo $row['brandid'] ?>" class="btn btn-default btn-block">
	  <div class="col-md-12 col-sm-12">
                  <div class="card flex-row align-items-center align-items-stretch border-0">
                     <div class="col-4 d-flex align-items-center justify-content-center rounded-left <?php echo $itembrand; ?>">
						 <i class="fa fa-3x fa-tags text-white"></i>
					 </div>
                     <div class="col-8 py-3 rounded-right <?php echo $brandboxbg; ?>">
                        <div class="h2 mt-0"><?php echo $row['brandname']; ?></div>
						 <?php
						 $brandidn=$row['brandid'];
                         $total="select * from product where brandid=$brandidn";
						 $get_total=mysqli_query($conn,$total);
						 $num =mysqli_num_rows($get_total);
						 
$x=$num;
switch ($x)
{
	case 0:
		 $badgecolor = "dark";
		break;
	case 1:
		 $badgecolor = "light";
		break;
		case 2:
		 $badgecolor = "light";
		break;
		case 3:
		 $badgecolor = "light";
		break;
		case 4:
		 $badgecolor = "info";
		break;
		case 5:
		 $badgecolor = "info";
		break;
	default:
		 $badgecolor = "success";
}
						 ?>
                        <div class="text">
				<button type="button" class="btn <?php echo $brandbtn; ?> text-white"> Products <span class="badge badge-<?php echo $badgecolor; ?>">
					<?php echo $num; ?></span>
				</button>
						 </div>
                     </div>
                  </div>
               </div></a>
    <?php endwhile; ?>
	</div>
</div>



