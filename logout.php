<?php
  include 'config.php';
  session_start();
  unset($_SESSION['i']);
  unset($_SESSION['username']);
  unset($_SESSION['title']);
  session_destroy();
  echo "<script>window.open('index.php','_self');</script>";
  ?>
