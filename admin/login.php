<?php
  include("../confs/config.php");
  if(isset($_REQUEST['signin'])){
  $admin = mysqli_query($conn, "SELECT * FROM admin");
  $row = mysqli_fetch_assoc($admin);
  $email = $row['email'];
  $password = $row['password'];
  session_start();
  $pemail = $_POST['email'];
  $ppassword = $_POST['password'];
  if($pemail == $email and $ppassword == $password) {
  $_SESSION['auth'] = true;
  header("location: orders.php");
  } else {
    echo "<script>alert('Email & Password is invalid, You try again!');</script>";
    echo "<script language='javascript'>window.location.href='login.php';</script>";
    // echo "That information is incorrect, try again <a href=\"login.php\">Click Here</a>";
    //   exit();
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
<link rel="stylesheet" type="text/css" href="../css/adminlogin.css"/>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
</head>
<body class="pink lighten-4">

  <div class="container-fluid" style="margin-top: 150px;">
		<div class="row">
			<div class="col-md-4 col-sm-12 mx-auto pink lighten-2" style="border-top-left-radius: 10% 50%;border-bottom-left-radius: 10% 50%;border-top-right-radius: 10% 50%;border-bottom-right-radius: 10% 50%;">
		
             <form action="#" method="post" class="form">
				 
             <div class="card-body border-0 text-white">
				 <div class="card-header bg-transparent border-0">
				 <h3>Admin Login</h3>
				 </div>
			 <lable>User Name:</lable>
             <input type="text" name="email" value="" class="form-control border-info" id="username" placeholder="Enter user name" />
			 <lable>Password:</lable>
            
             <input type="password" name="password" value="" class="form-control border-info" id="pwd" placeholder="Enter Password" />
            
             </div>
             
             <div class="card-footer bg-transparent  border-0">
             <div class="col-md-6">
             <button type="submit" class="btn pink darken-3 text-white" name="signin" style=" border-radius: 1.5rem;">Sign In</button>
             </div>
             </div>
             </form>
				
			</div>
	  </div>
	</div>

  </body>

</html>
  
  
</body>
</html>
