<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Log-In Section</title>
	<script type="text/javascript">
		function setNewImage()
		{
			document.getElementById('avatar').src="owl-close.jpg";
		}
		function setOldImage()
		{
			document.getElementById('avatar').src="owl-open.png";
		}

		function validate() 
		{
			var text = document.forms['mf'].elements['userid'].value;
    		if (text == '') 
    			{
    				alert("Please Enter EmployeeID !");
    				return false;
    			}
    		var txt = document.forms['mf'].elements['passinput'].value;
 			if (txt == '') 
    			{
    				alert("Please Enter Your Password !");
    				return false;
    			}  		
		}
	</script>




<style>
	body{
	margin: 0;
	padding: 0;
	background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(background.jpg);
	background-size: cover;
	background-attachment: fixed;
	font-family: sans-serif;

	opacity: 0; 
    transition: opacity 3s;
}
#warning 
{
	display: none;
	color:yellow;
}
.log-in-box{
	width: 620px;
	height: 580px;
	background:rgba(0,0,0,0.5);
	color:#fff;
	top: 55%;
	left: 50%;
	position: fixed;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
	padding: 50px 50px;
	border-radius: 30px;
}

#avatar{
	width: 100px;
	height: 100px;
	border-radius: 50%;
	position: absolute;
	top: -10%;
	left: calc(50% - 50px);
}

p{
	font-size: 20px;

}


h1{
	margin: 0;
	padding: 0 0 20px;
	text-align: center;
	font-size:22px;
}


 
.log-in-box input[type="password"] ,input[type="number"] , input[type="text"]
{
	width:100%;
	border:none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline: none;
	height: 40px;
	color: #fff;
	font-size: 20px;
	font-style:italic;
}


.log-in-box input[type="submit"]
{
	border:none;
	outline:none;
	height:40px;
	width:40%;
	background:#1c8adb;
	color:#fff;
	font-size :25px;
	border-radius: 20px;
	margin-top: 50px;
	margin-bottom: 20px;
}

.log-in-box input[type="submit"]:hover
{
	cursor: pointer;
	background: #39dc79;
	color:#000;
}

.log-in-box input[type="button"]
{
	border:none;
	outline:none;
	height:40px;
	width: 40%;
	background:#1c8adb;
	color:#fff;
	font-size :25px;
	border-radius: 20px;
	margin-top: 20px;
	margin-bottom: 20px;
}

.log-in-box input[type="button"]:hover
{
	cursor: pointer;
	background: #39dc79;
	color:#000;
}

.forgot
{
	text-decoration: none;
	font-size: 16px;
	color:#fff;
	margin-left: 36%;
	margin-top: 1px;
}

.forgot:hover
{
	color:#39dc79;
}

</style>






</head>
<body onload="document.body.style.opacity='1'">

	
	<div class="log-in-box">
		<img src="owl-open.png" id="avatar">
		<h1>Admin Log-In Here</h1>
		<form action="#" method="post">
			<p>Admin Name</p>
			<input type="text" name="adminname" placeholder="UserName Here" required>
			<p>PassWord <h5 id="warning"><i>WARNING! CapsLock is ON</i></h5></p>
			<input type="password" id = "passinput" name="pass" placeholder="PassWord Here"
			onblur="setOldImage();" onfocus="setNewImage();" required>
			<h4><input type="checkbox" onclick="myFunction()">Show Password<a href="forgot.php" class="forgot">Forgot Password ?</a></h4>
			<center>
				<a href="index.php">
			<input type="button" name="back" value="Back"></a>
				<input type="submit" name="login" value="Log-In">
			</center>
			
<script>
function myFunction() {
  var x = document.getElementById("passinput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<script type="text/javascript">
var input = document.getElementById("passinput");
var text = document.getElementById("warning");
input.addEventListener("keyup", function(event) {

if (event.getModifierState("CapsLock")) {
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
});</script>

		</form>
	</div>
	
</body>
</html>

<?php
if(isset($_POST['login']))
{
	$_SESSION['admin-name'] = $_POST['adminname'] ;
	$u_name = $_POST['adminname'];
	$u_pswd = $_POST['pass'];

	$con = mysqli_connect('localhost','root','','tmf');
	if(!$con)
	{
		echo "<script> alert('Connection Establishment Error'); exit; </script>";
	}

	$query_name = "select * from admin WHERE user_name = '$u_name'";
	$run_name = mysqli_query($con,$query_name);

	if(mysqli_num_rows($run_name))
	{
		$query = "select * from admin WHERE user_name = '$u_name' AND password = '$u_pswd'";
		$run = mysqli_query($con,$query);
		if(mysqli_num_rows($run))
		{	
			echo "<script> alert('Logged-In Successfully') </script>";
			echo "<script>window.open('admin-landing.php','_self')</script>";
			$_SESSION['name'] = $u_name;
			$_SESSION['a_flag'] = 1;
		}
		else
		{
			echo "<script> alert('Invalid Password') </script>";
		}
	}
	else
	{
		echo 	"<script> alert('No Such UserName Exist!') </script>";
	}
}
?>