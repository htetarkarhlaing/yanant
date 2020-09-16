<?php
  include("confs/config.php");

  $name = $_POST['name'];
  $ph_no = $_POST['ph_no'];
  $feedback = $_POST['feedback'];
  
  $sql = "INSERT INTO feedback (
    name, ph_no, feedback, created_date) VALUES (
    '$name', '$ph_no', '$feedback', now() )";

  mysqli_query($conn, $sql);

  header("location: feedbacks.php");
?>
