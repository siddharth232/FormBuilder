<?php 
session_start();
$_SESSION['i']=1+$_SESSION['i'];
$id=$_SESSION['i'];
$id2="p".$id;
array_push($_SESSION['mcq'], $id);
echo "<div id='".$id."'><input type='text' placeholder='Questions|option1|option2|...' name=$id id=$id2 class='inputfield'> <br>
              <br></div>"; ?>