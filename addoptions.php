<?php 

if (isset($_GET['id'])) {
$name=$_GET["id"].'op';
$name2=$_GET['id2'];
echo "<input type='text' placeholder='Options(use,)' name=$name><br>";
echo '<script>document.getElementById("'.$name2.'").style.disply="none";</script>';	
}
 ?>