<?php
 if(empty($_SESSION['user'])):
?>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
 <nav class="navbar navbar-expand-lg navbar-dark <?php echo $themecolor; ?>">
 <a class="navbar-brand" href="#" style="font-size:25px;">Yanant</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navcontent">
	 <span class="navbar-toggler-icon"></span>
 </button>
	 <div class="collapse navbar-collapse" id="navcontent">
       <ul class="nav navbar-nav">
         <li class="nav-item"><a class="nav-link" href="index.php"><span class="fa fa-2x fa-home"></span> Home</a></li>
		   &nbsp;
         <li class="nav-item"><a class="nav-link" href="login.php"><span class="fa fa-2x fa-unlock-alt"></span> Login</a></li>
		    &nbsp;
         <li class="nav-item"><a class="nav-link" href="registeration.php"><span class="fa fa-2x fa-user-plus"></span> Register</a></li>
		    &nbsp;
         <li class="nav-item"><a class="nav-link" href="feedbacks.php"><span class="fa fa-2x fa-ticket"></span> Feedback</a></li>
       </ul>
    </div>
  </nav>
   <?php else: ?>
   
  <nav class="navbar navbar-expand-lg navbar-dark <?php echo $themecolor; ?>">
 <a class="navbar-brand" href="#" style="font-size:25px;">Yanant</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navcontent">
	 <span class="navbar-toggler-icon"></span>
 </button>
	 <div class="collapse navbar-collapse" id="navcontent">
       <ul class="nav navbar-nav">
         <li class="nav-item"><a class="nav-link" href="index.php"><span class="fa fa-2x fa-home"></span> Home</a></li>
		   &nbsp;
         <li class="nav-item"><a class="nav-link" href="product.php"><span class="fa fa-2x fa-clipboard"></span> Product</a></li>
		   &nbsp;
         <li class="nav-item"><a class="nav-link" href="cart.php"><span class="fa fa-2x fa-shopping-cart"></span> Cart</a></li>
		   &nbsp;
         <li class="nav-item"><a class="nav-link" href="feedbacks.php"><span class="fa fa-2x fa-commenting"></span> Feedback</a></li>
		   &nbsp;
		 <li class="nav-item"><a class="nav-link" href="logout.php"><span class="fa fa-2x fa-power-off"></span> Logout</a></li>
       </ul>
    </div>
  </nav>
   <?php endif; ?>  

		


   