<?php
$con= new mysqli("localhost","root","","quiz")or die("Could not connect to mysql".mysqli_error($con));

if (!$con)
  {
  die("Connection error: " . mysqli_connect_error());
  }
?>
