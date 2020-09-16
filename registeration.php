<?php
session_start();
include ("confs/config.php");
include('theme.php');
//include("confs/auth.php");

include 'functions.php';
if(isset($_POST['register'])){
	$user_name=$_POST['username'];
	$password=$_POST['password'];
	$comfirm_password=$_POST['confirmpassword'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
		$address=$_POST['address'];
		$errors=array(
		'username'=>'',
		'password'=>'',
		'confirm_password'=>'',
		'match_password'=>'',
		'email'=>'',
		'phone'=>'',
		'address'=>'',
		);
		if ($user_name==''){
			$errors['username']='User Name must be enter';
		}else
		{
			if(strlen($user_name)<3){
				$errors['username']='User Name need to be longer';
			}
		}
		if($comfirm_password==''){
			$errors['confirm_password']='This Field could not be empty';
			}else
			{
				if($password!=$comfirm_password){
			$errors['$match_password']='Password Do not match';
				}
			}
			if($password==''){
				$errors['password']='This field could not be empty';
			}else{
				if(strlen($password)<3){
					$errors['password']='Password need to be longer';
				}
			}
			if($email==''){
				$errors['email']='This field could not be empty';
			}
			if($phone==''){
				$errors['phone']='This field could not be empty';
			}
			if($address==''){
				$errors['address']='This field could not be empty';
			}
			foreach($errors as $key=>$value){
				if(empty($value)){
					unset($errors[$key]);
				}
			}
			if(empty($errors)){
				//echo"<h3>Registration Success</h3>";
				create_accu();
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
<link href="css/reg.css" rel="stylesheet">
</head>
<body class="<?php echo $regbody; ?>">
<?php
 include 'header.php'
?>
	<form action="#" method="post" class="">
 <div class="container register">
                <div class="row">
					  
                    <div class="col-md-3 register-left">
                        <img src="images/logo1.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>Already have an account?</p>
                        <a class="btn btn-lg <?php echo $regbtn; ?> text-white" href="login.php" style=" border-radius: 1.5rem;">Login Here</a><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Registerstion as a New User</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Your Username *" value="<?php if(isset($user_name)){ echo $user_name;} ?>" />
											<lable class="text-danger"><?php echo isset($errors['username'])? $errors['username']:'' ?> </label>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" value="<?php echo isset($password)?$password:'' ?>" class="form-control" id="password" placeholder="Enter Password *" />
											<lable class="text-danger"><?php echo isset($errors['password'])? $errors['password']:'' ?> </label>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirmpassword" value="<?php echo isset($confirm_password)?$confirm_password:'' ?>" class="form-control" id="confirmpassword" placeholder="Enter Password again *" />
											<lable class="text-danger"><?php echo isset($errors['confirm_password'])? $errors['confirm_password']:'' ?>
												</label><lable class="text-danger"><?php echo isset($errors['match_password'])? $errors['match_password']:'' ?> </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" value=" <?php echo isset($email)?$email:'' ?>" class="form-control" id="email" placeholder="Enter your email *" />
											<lable class="text-danger"><?php echo isset($errors['email'])? $errors['email']:'' ?> </label>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="16" name="phone" value="<?php echo isset($phone)?$phone:'' ?>" class="form-control" id="phone" placeholder="Enter your Phone Number *" />
											<lable class="text-danger"><?php echo isset($errors['phone'])? $errors['phone']:'' ?> </label>
										</div>
                                        </div>
                                        <div class="form-group">
                                           <textarea name="address" value="<?php echo isset($address)?$address:'' ?>" class="form-control"  placeholder="Your Current Address *" /></textarea>
                <lable class="text-danger"><?php echo isset($errors['address'])? $errors['address']:'' ?> </label>
                                        </div>
                                        <button type="submit" class="btnRegister <?php echo $loginbtn; ?>"  value="Register" name="register">Sign up</button>
                                    </div>
                                </div>
								</div>
                    </div>
					
	</div>
            </div></form>
	<?php include('footer.php');?>

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
</body>
</html>