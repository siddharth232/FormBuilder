<?php include 'config.php'; 
  session_start();
   if (!isset($_SESSION['username'])||!isset($_GET['id'])) {
    echo "<script>alert('Access Denied!!');window.open('index.php','_self')</script>";
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Builder</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
   * {
  box-sizing: border-box;
  margin:0px;
  padding: 0px;
}
.row{
	        width: 100%;
	    	background-color: #008081;
	    	height: 542px;
	    	margin: 0 0 0 0px;
	    	overflow-x: auto;
}

[class*="col-"] {
  float: left;
  padding: 15px;
  height: 100%;
}

.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}
 h1{
	    	font-family: 'B612 Mono', monospace;
	    	margin-left: 110px;
	    	padding-top: 40px; 
	    }
	    #head{
          width: 100%;
          background-color: #bdc3c7;
          height: 115px;
		}
		#menu tr td a{
			margin-left: 35%;
			font-style: 'B612 Mono', monospace;
			color: black;
			font-size: 20px;
			text-decoration: none;}
			#menu tr td {
		border-bottom-style: solid;
		border-bottom-color:  #8395a7;
		border-bottom-width: 2px;
		margin-bottom: 0px;
		border-radius: 5px 5px 5px 5px ;
	}
		#menu{
		border-radius: 5px 5px 5px 5px ;
	}
		#menu{
			width: 100%;
			height: 25%;
		}
 	     #menu{
			background-color: #bdc3c7;
		}
	 #menu tr :hover {background-color: #8395a7;color: white;}
     h2{
     	font-family: 'B612 Mono', monospace;
     	margin-left: 270px;
     	font-size:50px;
     }
     h3{
     	font-family: 'B612 Mono', monospace;
     	margin-left: 270px;
     	font-size: 30px;
     	font-style:italic; 
     }
     img{
     	height: auto;
     	margin-left: 20px;
     	width: auto;
     	max-width: 200px;
     	max-width: 200px;
     }
     p{
     	font-size: 20px;
     	margin-left: 20px;
     	font-style: italic;
     }
</style>
</head>
<body>
<div id="head">
	<h1>Form Builder</h1>
</div>
<div class="row">
	<div class="col-3"><table id="menu">
		<tr><td><a href='home.php'>Create</a></td></tr>
		<tr><td><a href='created.php'>Created</a></td></tr>
		<tr><td><a href='result.php'>Responses</a></td></tr>
		<tr><td><a href='message.php'>Notifications</a></td></tr>
	                       </table></div>
	<div class="col-6" id="whole">

	<?php 

	
	$id=$_GET['id'];
	$title=$GET['title'];
	$title='theni';
	$username=$_SESSION['username'];
	$answers=array();
	$username='Sid';
	$tablename=$title.$username;
	$sql="SELECT * FROM forminfo WHERE username='$username' AND title='$title'";
	if ($result=$conn->query($sql)) {
		while($row=$result->fetch_assoc()){
			$noq=$row['noq'];
		}
	}

    $sql="SELECT * FROM $tablename WHERE id=$id";
    $result=$conn->query($sql);
    if ($result) {
    	$row=$result->fetch_assoc();
    	$dndt=$row['reg_date'];
        for ($i=1;$i<=$noq;$i++ ) {  
         $question="q".$i;
         $ans=$row[$question];
         array_push($answers, $ans);
           }
    	 }
    	$id=$_GET['id'];
        
       $sql="SELECT * FROM forminfo WHERE id='$id'";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        $title=$row['title'];
        
        $description=$row['description'];
        $created=$row['username'];
        $noq=$row['noq'];
        echo "<h2>$title</h2>";
        echo "<h3>$description</h3>";
        $imageposition=array();
        $sql1="SELECT * FROM images WHERE username='$created' AND title='$title'";
        $result1=$conn->query($sql1);
        while ($row1=$result1->fetch_assoc()) {
        	array_push($imageposition,$row1['id']);
        }
    //    print_r($imageposition);
        $sql="SELECT * FROM question WHERE uername='$created' AND title='$title'";
    //    echo "<script>alert('".$created.$title."')</script>";
        $result=$conn->query($sql);
        $a=0;
       
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
        		echo "<p>$answers[$a]</p>";
        	} 
        		else{
        			echo "<p>$question</p>";
        			echo "<p>$answers[$a]</p>";
        	}
        	$a++;

       } 
        

	echo "<p>Submitted On: $dndt</p>";
	?>
		<div id="result"></div>
		</div>
		
	<div class="col-3">
		</div>
		
	</div>
</body>
</html>