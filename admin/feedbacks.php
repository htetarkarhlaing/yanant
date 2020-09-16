<?php
  include("../confs/config.php");
  include("../confs/auth.php");

  if(isset($_GET['del'])){
    $id = $_GET['del'];
    $sql = "DELETE FROM feedback WHERE id = $id";
    mysqli_query($conn, $sql);

    header("location: feedbacks.php");
  }

  $result = mysqli_query($conn, "SELECT * FROM feedback ORDER by created_date DESC");

?>

<html>
<head>
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
include("header.php");
?>
	<div class="container">
  <div class="col-md-10 mx-auto">          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Feedback</th>
        <th>Action</th>
      </tr>
    </thead>
    
      <?php
      while($row = mysqli_fetch_assoc($result)): ?>
      <tbody>
      <tr> 
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['ph_no'] ?></td>
      <td><?php echo $row['feedback'] ?></td>
      <td>
      <a href="feedbacks.php?del=<?php echo $row['id'] ?>">
      <i class='fa fa-trash'></i></a>
    </td>
      </tr>
    </tbody>
  

<?php endwhile; ?>     

        
  </table>
  </div>
</div>


</body>
</html>