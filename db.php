<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'cmdcars'
) or die(mysqli_erro($mysqli));

?>
