<?php
session_start();
include("confs/config.php");
include('theme.php');
include 'functions.php';
if(isset($_POST['login'])){
	$name=$_POST['username'];
	$password=$_POST['password'];
	
		$errors=array(
		'username'=>'',
		'password'=>''
		
		);
		if ($name==''){
			$errors['username']='This Field could not be empty';
		}
		if($password==''){
				$errors['password']='This field could not be empty';
		}
		 
				 $hpass=md5($password);
				 $query="select * from user";
				 $go_query=mysqli_query($conn,$query);
				while($out=mysqli_fetch_array($go_query)){
					$db_user_name=$out['username'];
					$db_password=$out['password'];
					$db_user_role=$out['role'];
					if($db_user_name==$name & $db_password==$hpass & $db_user_role=='admin'){
						$_SESSION['admin']=$name;
						header('location:admin/product.php');
					}
					elseif($db_user_name==$name && $db_password==$hpass){
						$_SESSION['user']=$name;
						header('location:index.php');
					}
					else
					{
						
						echo('<script> alert ("Failed");</script>');
						header('location:login.php');
					}
				}
}
						
					  
					 
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yanant</title>
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/colors.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
</head>

<body style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif'" class="<?php echo $loginbody; ?>">
<?php
 include 'header.php'
?>	
	<div class="container-fluid text-white">
		<div class="row">
			<div class="col-md-7 d-none d-md-block d-lg-block d-xl-block">
		    <img src="images/loginbg.png" class="img-fluid ml-0" alt=""/>
			</div>
			
			<div class="col-md-5 col-sm-12 mr-0" style="margin-top:200px;">
		
             <form action="#" method="post" class="form">
				 <div class="card-header bg-transparent  border-0">
				 <h3>Login to Continue</h3>
				 </div>
             <div class="card-body bg-transparent border-0">
			 <lable>User Name:</lable>
             <input type="text" name="username" value="" class="form-control border-info" id="username" placeholder="Enter user name" />
			 <lable>Password:</lable>
            
             <input type="password" name="password" value="" class="form-control border-info" id="pwd" placeholder="Enter Password name" />
            
             </div>
             
             <div class="card-footer bg-transparent  border-0">
             <div class="col-md-6">
             <button type="submit" class="btn <?php echo $loginbtn; ?> text-white" name="login" style=" border-radius: 1.5rem;">Sign In</button>
             </div>
             </div>
             </form>
				
			</div>
	  </div>
	</div>
	
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
</body>
</html>