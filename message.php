<?php include 'config.php'; 
  session_start();
 // if (!isset($_SESSION['username'])) {
  //  echo "<script>alert('Access Denied!!');window.open('index.php','_self')</script>";
  //}
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Builder</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
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
  }}
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
		}
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
     #message tr td{
     	font-size: 20px;
     }
</style>
</head>
<body>
<div id="head">
	<h1>Form Builder</h1><button id="menu" onmouseover="size()" onmouseout="resize()">menu</button>
	<button id="butt"><a href='logout.php'>LogOut</a></button>
</div>
<div class="row">
	<div class="col-3"id='col'><table>
		<tr><td><a href='home.php'>Create</a></td></tr>
		<tr><td><a href='created.php'>Created</a></td></tr>
		<tr><td><a href='result.php'>Responses</a></td></tr>
		<tr><td><a href='message.php'>Notifications</a></td></tr>
	                       </table></div>
	<div class="col-6" id="whole">
		<table id="message">
	<?php 
         $username=$_SESSION['username'];
         $sql="SELECT * FROM message WHERE username='$username'";
         $result=$conn->query($sql);
         if ($result) {
         	while($row=$result->fetch_assoc()){
         		$string=$row['message'];
         		$dandt=$row['dandt'];
         		echo "<tr><td>&nbsp&nbsp&nbsp&nbsp$string&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$dandt</td></tr>";
         	}
         }
	?>
</table>
	</div>
	<div class="col-3">
		
	</div>
	
	<script type="text/javascript">function size(){
		document.getElementById('col').style.display="inline-block";
	}
	function resize(argument) {
		setTimeout(da,5000);
	   
	}
	function da(){

		 document.getElementById('col').style.display="none";
	}</script>
</div>
</body>
</html>