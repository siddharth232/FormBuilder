<?php
  //$title=$_GET['title'];
 $title='theni';
 // $username=$_SESSION['username'];
  include "config.php";
  $username='Sid';
  $tablename=$title.$username;
  $sql="SELECT * FROM  $tablename ";
  $result=$conn->query($sql);
  echo "$conn->error";
  echo "<table>";
  if ($result) {
  	while ($row=$result->fetch_assoc()) {
  		$date=$row['reg_date'];
  		$name=$row['username'];
  		$id=$row['id'];
  		echo"<tr><td><a href='formdetails.php?title=$title&id=$id'>$name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$date</a></td></tr>";
  	}
  }
  echo "</table>";


 ?>