<?php include 'config.php';
/*if (!isset($_GET['title'])||!isset($_GET['username'])) {
	echo "<script>alert('Access Denied');</script>";
	echo "<script>window.open('index.php','_self');</script>";
}*/

$id=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>form Builder</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		*{
			margin:0px;
			padding: 0px;
		}
		body{
			background-color: #008081;
			width: 100%;
		}
		#sheet{
			background-color: white;
			width: 60%;
			margin: 0 auto;
			margin-top: 20px;
			height: 620px;
			overflow-y:auto; 
		}
		h1{
			font-style: 'B612 Mono', monospace;
			margin-left: 270px;
		}
		h2{
			font-style: 'B612 Mono', monospace;
			margin-left: 270px;
		}
		input{
			height: 44px;
            border-radius: 5px 5px 5px 5px;
            border-style: solid;
            border-width: 1px;
            border-color: black;
            overflow: hidden;
            font-size:20px;
            padding: 5px;
            width: 270px;
            margin-top: 15px;
            margin-left: 30px;
		}
		img{
			width: auto;
			height: auto;
			max-height: 200px;
			max-width: 200px;
			margin-left: 30px;
			margin-top: 15px;
		}
		p{
			font-style: italic;
			margin-left: 30px;
		}
		object{
			margin-left: 30px;
			margin-top: 15px;
		}
		#submit{
			width:70px;
            background-color: black;
            font-family: arial;
            color: white;
            height: 40px;
            margin-left: 270px;
            font-size:15px;
            border-color: #29487D;
            border-width:1px;
            top:39px;
            right:30px;
            font-weight:bold;
            letter-spacing: -1px;
            cursor: pointer;
            padding: 5px;
		}
	</style>
</head>
<body>
<div id="sheet">
	<?php
       $id=$_GET['id'];
//	$id=25;
       $sql="SELECT * FROM forminfo WHERE id='$id'";
       $result=$conn->query($sql);
       if ($result) {
       	while($row=$result->fetch_assoc()){
       		$title=$row['title'];
       		$description=$row['description'];
       		$username=$row['username'];
       }

       }
        echo "<h1>$title</h1>";
        echo"<h2>$description</h2>";
        $sql2="SELECT * FROM files WHERE title='$title' AND username='$username'";
        $result1=$conn->query($sql2);
        while ($row1=$result1->fetch_assoc()) {
        	$url=$row1['fileurl'];
        	$d=$row1['description'];
        	echo "<a href=$url download>
        	<object data=$url></object></a><p>$d<b>Click To Download!!</b></p>";
        }
	   ?>
	<form action="responsesform.php" method="POST">
        <input type="text" name="name" placeholder=" Your Name.."required><br>
        <?php 
        $id=$_GET['id'];
       // $id=25;
       $sql="SELECT * FROM forminfo WHERE id='$id'";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        $title=$row['title'];
        $description=$row['description'];
        $created=$row['username'];
        $noq=$row['noq'];
        $imageposition=array();
        $sql1="SELECT * FROM images WHERE username='$created' AND title='$title'";
        $result1=$conn->query($sql1);
        while ($row1=$result1->fetch_assoc()) {
        	array_push($imageposition,$row1['id']);
        }
      //  print_r($imageposition);
        $sql="SELECT * FROM question WHERE uername='$created' AND title='$title'";
      //  echo "<script>alert('".$created.$title."')</script>";
        $result=$conn->query($sql);
       
        		while($row=$result->fetch_assoc())	{
        	
        	$id=$row['id'];
        		$question=$row['questions'];
        if (in_array($id,$imageposition)) {
        	 $sql1="SELECT * FROM images WHERE id='$id'";
        $result1=$conn->query($sql1);
        while ($row1=$result1->fetch_assoc()) {
        	    $url=$row1['imageurl'];
        		$des=$row1['description'];
        	//	echo "<script>alert('h');</script>";
        		echo "<img src=$url alt='Image Unable to Load' height='42' width='42'>";
        		echo "<p><b>$des</b></p>";
                   } }	
        	if(strpos($question, '|')){
        		$array=explode("|", $question);
        		echo "<label>$array[0]</label>";
        		echo "<select name=$id required>";
        		for ($i=1;$i<=count($array);$i++) { 
        		  echo "<option value=$array[i]>$array[i]</option>";
        		}
        		echo "</select>";
        	} 
        		else{
        	echo "<input type=text placeholder=$question name=$id required><br>";}
       } 
         if (isset($_POST['submit'])) {
         	$name=$_POST['name'];
         	$tablename=$title.$created;
         	$s="SELECT * FROM $tablename WHERE username='$name'";
         	$r=$conn->query($s);
         	if($r){
         		if ($r->num_rows>0) {
         			echo "<script>alert('Your Responses Already Recorded');</script>";
         		}else{
         	$answers=array();
         for ($i=1;$i<=$noq;$i++) { 
             $ans=$_POST[$i];
             array_push($answers, $ans);
         	}
         	
         	$stmt=$conn->prepare("INSERT INTO $tablename(username) VALUES(?)");
         	$stmt->bind_param("s",$n);
         	$n=$name;
         	$stmt->execute();
         	for ($i=1;$i<=$noq;$i++) { 
          	$question="q".$i;
          	$ans=$answers[$i-1];
            $stmt=$conn->prepare("UPDATE $tablename SET $question=? WHERE username=?");
            $stmt->bind_param('ss',$n,$nam);
            $n=$ans;
            $nam=$name;
            $stmt->execute();
           } 
           $string=$name."submitted the form".$title."on";
           $sql="INSERT INTO message(message,username,title) VALUES('$string','$created','$title')";
           $conn->query($sql);	
         } } }

        ?>
     <input type="submit" name="submit" value="Submit" id="submit">
		</form>
	<?php  
       
	?>
</div>
</body>
</html>
