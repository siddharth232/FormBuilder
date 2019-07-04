<?php include 'config.php';
      session_start();
      $_SESSION['i']=0;
  $_SESSION['mcq']=array();
  $_SESSION['questions']=array();
  $_SESSION['image']=0;
  $_SESSION['file']=array();
  $_SESSION['tobeuploaded']=array();
  include 'deadline.php';
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Builder</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=B612+Mono&display=swap" rel="stylesheet">
	<style type="text/css">
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
		*{
			margin: 0px;
			padding: 0px;
			box-sizing: border-box;
		}
		#head{
          width: 100%;
          background-color: #bdc3c7;
          height: 115px;
		}
	    #body{
	    	width: 100%;
	    	background-color: #008081;
	    	height: 542px;
	    	margin: 0 0 0 0px;
	    	overflow-x: auto;
	    }
	    h1{
	    	font-family: 'B612 Mono', monospace;
	    	margin-left: 110px;
	    	padding-top: 40px; 
	    }
	    .inputtextfield{
            height: 44px;
            border-radius: 5px 5px 5px 5px;
            border-style: solid;
            border-width: 1px;
            border-color: black;
            overflow: hidden;
            font-size: 18px;
            padding: 10px;
            
	    }
	    #umail{
	    	position: absolute; 
	    	width: 275px;
	    	right: 425px;
	    	top: 39px;
	    }
	    #upass{
	    	position: absolute; 
	    	width: 275px;
	    	top: 39px;
	    	right: 125px;
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
           #body input{
           	margin-left: 110px;
           	margin-top:20px;
           	width: 475px;
           }
           #button{
           	  border-radius: 5px 5px 5px 5px;
            color:white;
            background-color: black;
            font-weight: bold;
            width:100px;
            height:40px;
            top:460px;
            position: absolute;
            border-color: #3B6E22;
            border-width: 1px;
            box-sizing: border-box;
            font-size: 20px;
            font-family: Helvetica;
            cursor: pointer;
           }
           p{
           	text-decoration: underline;
           	cursor: pointer;
           	font-size: 30px;
           	margin-top: 190px;
           	margin-left: 140px;
           }
           #su{
           	display: none;
           }
           @media only screen and (max-width: 768px){
           	#su{
           		display: inline-block;
           	}
           	h1{
           		margin-left: 70px;
           	}
           	#body input{
           		display: none;
           		margin-left: 0px;
           		width: 100%;
           	}
           	#body h1{
           		display: none;
           	}
           	#umail{
           		top: 200px;
           		right: 25px; 
           	}
           	#upass{
           		top: 270px;
           		right: 25px;
           	}
           	#butt{
           		top: 330px;
           		right: 130px;
           	}
           }
	</style>
</head>
<body>
<div id='head'>
	<h1>Form Builder</h1> 
	<form action="index.php" method="post">
     <input type="text" name="umail" class="inputtextfield" placeholder="Enter Username..." id="umail">
     <input type="password" name="upass" class="inputtextfield" placeholder="Enter Password..." id="upass">
     <input type="submit" name="login" value="LogIn" id="butt">
    </form>
</div>
<div id="body">
	<h1>SignUp & conduct surveys !!!</h1>
    <form action="index.php" method="post">
	 <input type="text" name="uname" placeholder="UserName" class="inputtextfield" id='name' required><br>
	 <input type="text" name="Email" placeholder="Email" class="inputtextfield" id='email' required><br>
	 <input type="password" name="pass" placeholder="Password" class="inputtextfield" id="password" required><br>
	 <input type="password" name="cpass" placeholder="Confirm Password" class="inputtextfield" id="cpassword" required><br>
	 <input type="submit" name="signup" value="SignUp" id="button">
	 <p onclick="myFunction()" id="su">Sign Up</p>
    </form>
    <?php 
         if (isset($_POST['signup'])) {
         	$name=$_POST['uname'];
         	$email=$_POST['Email'];
         	$pass=$_POST['pass'];
         	$cpass=$_POST['cpass'];
         	if ($pass==$cpass) {
         		if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
         		$sql="SELECT * FROM accinfo WHERE name='$name'";
         		$result=$conn->query($sql);
         	//	echo "<script>alert('".$conn->error."');</script>";
         		if ($result->num_rows>0) {
         			echo "<script>alert('Username Already Exist !!');</script>";
         		}else{
         			$sql="INSERT INTO accinfo(name,email,password) 	VALUES('$name','$email','$pass')";
         			if ($conn->query($sql)==true) {
         				echo "<script>alert('You successfully Signed Up .Login in to continue');</script>";
         			}
         		}
         		}else{
         			echo "<script>alert('Invalid Email Format');</script>";
         		}
         	}
         	else{
         		echo "<script>alert('Passwords are not matching');</script>";
         	}
         }
    ?>
   <?php 
    if (isset($_POST['login'])) {
    	$email=$_POST['umail'];
    	$pass=$_POST['upass'];
    	$sql="SELECT * FROM accinfo WHERE name='$email' AND password='$pass'";
    	$result=$conn->query($sql);
    //	echo "<script>alert('".$conn->error."')</script>";
    	if ($result->num_rows>0) {
    		$_SESSION['username']=$email;
    		echo "<script>window.open('home.php','_self');</script>";
    	}else{
    		echo "<script>alert('Invalid User');</script>";
    	}
    }
   ?> 
   <script type="text/javascript">
   	function myFunction() {

var x = window.matchMedia("(max-width: 768px)");

  if (x.matches) { 
    document.getElementById('butt').style.display="none";
    document.getElementById('umail').style.display="none";
    document.getElementById('upass').style.display="none"; 
    document.getElementById('name').style.display="inline-block"; 
    document.getElementById('email').style.display="inline-block";
    document.getElementById('password').style.display="inline-block";
    document.getElementById('cpassword').style.display="inline-block";
    document.getElementById('button').style.display="inline-block";
    document.getElementById('su').style.display="none";
  } else {

  }
}

</script>
   </script>
</div>
</body>
</html>