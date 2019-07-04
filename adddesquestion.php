<?php
 session_start();
 $_SESSION['i']=1+$_SESSION['i'];
 $id=$_SESSION['i'];
 $id2="p".$_SESSION['i'];

 array_push($_SESSION['questions'], $id);
 echo "<div id='".$id."'><input type='text' placeholder='Question...' name=$id id=$id2 class='inputfield'> <br>
              <br></div>"; ?>