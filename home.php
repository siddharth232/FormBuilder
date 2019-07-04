<?php include 'config.php'; 
  session_start();
  if (!isset($_SESSION['username'])) {
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
  margin-top: 0px;
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
		#butt{
			 width:70px;
            background-color: black;
            font-family: arial;
            color: white;
            height: 40px;
            position:absolute;
            font-size:15px;
            border-color: #29487D;
            border-width:1px;
            top:39px;
            right:30px;
            font-weight:bold;
            letter-spacing: -1px;
            cursor: pointer;
		}
		#menu{
			width:70px;
            background-color: black;
            font-family: arial;
            color: white;
            height: 40px;
            margin-left: 20px;
            font-size:15px;
            border-color: #29487D;
            border-width:1px;
            top:39px;
            right:30px;
            font-weight:bold;
            letter-spacing: -1px;
            cursor: pointer;
            display: none;
		}#Add{
			width:70px;
            background-color: black;
            font-family: arial;
            color: white;
            height: 40px;
            margin-left: 20px;
            font-size:15px;
            border-color: #29487D;
            border-width:1px;
            top:39px;
            right:30px;
            font-weight:bold;
            letter-spacing: -1px;
            cursor: pointer;
            display: none;
		}
		a{text-decoration: none;
			color: white;} 
		table tr td a{
			margin-left: 35%;
			font-style: 'B612 Mono', monospace;
			color: black;
			font-size: 20px;

		}
	table tr td {
		border-bottom-style: solid;
		border-bottom-color:  #8395a7;
		border-bottom-width: 2px;
		margin-bottom: 0px;
		border-radius: 5px 5px 5px 5px ;
	}
	.inputfield{
height: 44px;
            border-radius: 5px 5px 5px 5px;
            border-style: solid;
            border-width: 1px;
            border-color: black;
            overflow: hidden;
            font-size:20px;
            padding: 10px;
            margin-top: 10px;
	}
     
	table{
		border-radius: 5px 5px 5px 5px ;
	}
		table{
			width: 100%;
			height: 25%;
		}
 		.col-3 table{
			background-color: #bdc3c7;
		}
	 table tr :hover {background-color: #8395a7; color: white;}
     .sub{
       background-color: black;
            font-family: arial;
            color: white;
            height: 40px;
             font-size:16px;
            border-color: #29487D;
            border-width:1px;
            top:39px;
            right:30px;
            font-weight:bold;
            letter-spacing: -1px;
            cursor: pointer;
            padding: 5px;
            margin-top: 10px;
     }
     @media only screen and (max-width: 768px) {
  /* For mobile phones: */
  [class*="col-"] {
    width: 100%;
  }
  .col-3{
  	display: none;
  }
  
  #menu{
  	display: inline-block;
  }
  #menu:hover.col-3 {
  	display: inline-block;

  }
  #Add{
  	display: inline-block;
  }

  
}

</style>
</head>
<body>
<div id="head">
	<h1>Form Builder</h1>
	<button id="menu" onmouseover="size()" onmouseout="resize()">menu</button>
	<button id="Add" onmouseover="siz()" onmouseout="resiz()">Add</button>
	<button id="butt"><a href='logout.php'>LogOut</a></button>
</div>
<div class="row">
	<div class="col-3" id='col'><table>
		<tr><td><a href='home.php'>Create</a></td></tr>
		<tr><td><a href='created.php'>Created</a></td></tr>
		<tr><td><a href='result.php'>Responses</a></td></tr>
		<tr><td><a href='message.php'>Notifications</a></td></tr>
	                       </table></div>
	<div class="col-6" id="whole">
	<form action="home.php" method="post">
		<input type="text" name="title" placeholder="Title" id="title" class="inputfield" required><br>
		<textarea placeholder="Description" name="Description" id="Description" class="inputfield" required></textarea><br>
		<input type="date" name="date" placeholder="Deadline(optional)" class='inputfield'><label><i>&nbsp&nbsp&nbsp&nbsp*optional</i></label><br>
		<div id="add"></div> 

			<input type="submit" name="create" value="Create" class="sub" >
			<input type="submit" name="cancel" value="Cancel" class="sub">
    </form>
	</div>
	<div class="col-3" id="co">
		<input type="submit"  value="Add Multi-choice question " onclick="add('toadd.php')" class="sub"><br>
		<input type="submit" value="Add Questions" onclick="add('adddesquestion.php')" class="sub"><br>
		</div>
		<?php 
		  if (isset($_POST['create'])) {
		  	$title=$_POST['title'];
		  		
		  	$username=$_SESSION['username'];
		  	$sql="SELECT * FROM question WHERE uername='$username' AND title='$title'";
		  	$result=$conn->query($sql);
		  	if ($result) {
		  		if ($result->num_rows>0) {
		  		echo "<script>alert('Title Already Exist');</script>";
		  	}else{

		  	$stmt=$conn->prepare("INSERT INTO question(id,uername,title,description,questions) VALUES(?,?,?,?,?)");
		  	$stmt->bind_param("issss",$id,$username,$title,$description,$question);
		  	$noq=$_SESSION['i'];
		  	
		  	$username=$_SESSION['username'];
		  	$title=$_POST['title'];
		  	$_SESSION['title']=$title;
		  	$description=$_POST['Description'];
		  	$questions=array();
   //echo "<script>alert('".$_SESSION['i']."');</script>";
		   	for($i=1;$i<=$_SESSION['i'];$i++){
                 
                  $questions[$i]=$_POST[$i];
                 		  	}
		  	for($i=1;$i<=$_SESSION['i'];$i++){
		  		 $id=$i;
             $question=$questions[$id];
            if($stmt->execute()!=true){echo "<script>alert('".$conn->error."'</script>";}
            	}
            	  if (isset($_POST['date'])) {
            	if($_POST['date']<date("Y-m-d")){
            		echo "<script>alert('Please Enter Valid Deadline');</script>";}else{
            			$dt=$_POST['date'];
            			$stmt=$conn->prepare("INSERT INTO tobedelete(dt,username,title) VALUES(?,?,?)");
            			$stmt->bind_param("sss",$d,$u,$t);
            			$d=$dt;
            			$u=$_SESSION['username'];
            			$t=$title;
            			$stmt->execute();
            		//	echo "<script>alert('".$conn->error.")</script>'";
            			            		}
            }  
             
             	$tablename=$title.$username;
                $sql1=" CREATE TABLE $tablename (
                id INT(6) AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(20) NOT NULL,";
                $sql3="reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
                $sql2="";
                for ($i=1; $i<=$noq ; $i++) { 
                	$n="q".$i;
                	$sql2=$sql2."$n VARCHAR(200),";}
                $sql=$sql1.$sql2.$sql3;
                $conn->query($sql);	
                echo "<script>alert('Created Successfully');</script>";
             	$sql="INSERT INTO forminfo(username,title,noq,description) VALUES('$username','$title','$noq','$description')";
             	$conn->query($sql);
             	$_SESSION['i']=0;
          echo "<script>window.open('uploadimage.php','_self');</script>";
           
             } }

         
		  }
		  if (isset($_POST['cancel'])) {
		  	$_SESSION['i']=0;
		  	echo"<script>window.open('home.php','_self');</script>";
		  	}
	?>
	<script type="text/javascript">
		var l=0;
		function add(x){
			l++;
            var xhttp;
			xhttp=new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("add").innerHTML+= this.responseText;
    }
		}
		xhttp.open("GET",x,true);
		xhttp.send();
	}
	function size(){
		document.getElementById('col').style.display="inline-block";
	}
	function resize(argument) {
		setTimeout(da,5000);
	   
	}
	function da(){

		 document.getElementById('col').style.display="none";
	}
	function siz(){
		document.getElementById('co').style.display="inline-block";
		document.getElementById('whole').style.display="none";
	}
	function resiz(){
		setTimeout(d,5000);
	}
	function d(){
		document.getElementById('co').style.display="none";
		document.getElementById('whole').style.display="inline-block";
	}


	</script>
	
</div>
</body>
</html>