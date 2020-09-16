<?php
 include("confs/config.php");
include('theme.php');
session_start();
  $result = mysqli_query($conn, "SELECT * FROM feedback ORDER by created_date DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Yanant</title>
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/colors.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/feedback.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
</head>
<body class="<?php echo $feedbackbody; ?>">
<?php
	include("header.php")
?>
    
    	<div class="container-fluid"  style="margin-top: 25px;">
		<div class="row">
		<div class="col-md-10 mx-auto" style="margin-top: 25px;margin-bottom: 50px;">
			<div class="row w-100">
				
				<div class="col-md-6 bg-transparent">
		      <img src="images/logo1.png" height="200" class="feedbackimg" alt=""/> </div>
				
				<!--feedback input-->
	<div class="col-md-6 feedbackcurve bg-light">
		<div class="container-fluid">
    		<form class="form-horizontal" action="inputfeedback.php" method="post"> 
      			<div class="card-body">
          		<div class="form-group">
            	<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
          		</div>
          		<div class="form-group">  
            	<input type="text" class="form-control" name="ph_no" id="ph_no" placeholder="Enter Phone Number" required>
          		</div>
          		<div class="form-group">
                <textarea class="form-control" id="feedback" name="feedback" placeholder="Write Feedback" required></textarea>
          		</div> 
		  		<button type="submit" class="btn <?php echo $feedbackbtn; ?> text-white">Write</button>
        		</div>
			</form>
		</div> 
	</div>
		<!--end of feedback input-->	
		  </div>
		</div>
		</div>
	
	<div class="row">
		<div class="container-fluid <?php echo $themecolor; ?> text-white mt-2">
			<h3 align="center">Feedbacks</h3>
			<?php while($row = mysqli_fetch_assoc($result)): ?>
			<div class="alert alert-danger" role="alert">
  			<h4>
	  <span class="label label-success lb-lg"><?php echo $row['name'] ?></span>
			</h4>
			<?php echo $row['feedback'] ?> 
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php include('footer.php');?>
</body>
</html>