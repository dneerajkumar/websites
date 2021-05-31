<?php 
session_start();
if(!(isset($_SESSION['forgot-flag'])))
echo "<script>window.open('index.php','_self')</script>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Transparent Log-In Form Design</title>
	<style type="text/css">
		body{
	margin: 0;
	padding: 0;
	background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(background.jpg);
	background-size: cover;
	background-attachment: fixed;
	font-family: sans-serif;
}

.log-in-box{
	width: 720px;
	height: 780px;
	background:rgba(0,0,0,0.5);
	color:#fff;
	top: 60%;
	left: 50%;
	position: absolute;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
	padding: 70px 30px;
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

.log-in-box input
{
	width: 100%;
	margin-top: 10px;
	margin-bottom: 10px;
	font-family: sans-serif;

}
 
.log-in-box input[type="text"] , input[type="password"] ,input[type="date"]
{
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
	background:#1c8adb;
	color:#fff;
	font-size :18px;
	border-radius: 20px;
	margin-top: 20px;
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
	background:#1c8adb;
	color:#fff;
	font-size :18px;
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

	</style>
</head>
<body>
	<?php 
	if((int)$_SESSION['forgot-flag'] == 1)
	{
		echo "
	<div class='log-in-box'>
		<img src='avatar.png' id='avatar'>
		<h1>Employee Set Your New PassWord Here</h1>
		<form action='#' method='post'>
			<p>Enter Your User Name</p>
			<input type='text' name='id' placeholder='Enter UserId'required>
			<p>Select Your D.O.B</p>
			<input type='date' name='userdob' min='1960-01-01' max='2000-12-31' required>
			<p>Set New Password</p>
			<input type='password' name='password' placeholder='Enter PassWord Here'>
			<input type='submit' name='submit' value='Populate'>
			<a href='employee-login.php'>
			<input type='button' name='back' value='Back'></a>
		</form>
	</div>
	";

if(isset($_POST['submit']))
{
	$con = mysqli_connect('localhost','root','','tmf');
	if(!($con))
	{
		echo "<script>alert('Hmmm...! Connection Lost , We Will Take You To Home Page')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}

		$u_id = $_POST['id'];
		$pass = $_POST['password'];
		$edob = $_POST['userdob'];




		$query_id = "select * from employee WHERE user_name = '$u_id'";
	$run_id = mysqli_query($con,$query_id);

	if(mysqli_num_rows($run_id))
	{
		$query = "select * from employee WHERE dob ='$edob'";
		$run = mysqli_query($con,$query);
		if(mysqli_num_rows($run))
		{	
			
		$query = "UPDATE employee SET password = '$pass' WHERE user_name = '$u_id' AND dob = '$edob' ";
		$run = mysqli_query($con,$query);

			if($run)
			{
				$_SESSION['forgot-flag'] = '';
				echo "<script>alert('Password Updated Successfully, Try with Log-in With New Password')</script>";
				echo "<script>window.open('employee-login.php','_self')</script>";
			}
			else
			{
				echo "<script>alert('Not Updated')</script>";
			}
		}
		else
		{
			echo "<script> alert('Your BirthDate is Wrong ') </script>";
		}
	}
	else
	{
		echo 	"<script> alert('No Such UserName Exist!') </script>";
	}
}


}
else
{
	echo "
	<div class='log-in-box'>
		<img src='avatar.png' id='avatar'>
		<h1>Admin Set Your New PassWord Here</h1>
		<form action='#' method='post'>
			<p>Enter Your User Name</p>
			<input type='text' name='userid' placeholder='Enter UserId'required>
			<p>Select Your D.O.B</p>
			<input type='date' name='userdob' min='1960-01-01' max='2000-12-31' required>
			<p>Set New Password</p>
			<input type='password' name='password' placeholder='Enter PassWord Here'>
			<input type='submit' name='submit' value='Populate'>
			<a href='admin-login.php'>
			<input type='button' name='back' value='Back'></a>
		</form>
	</div>
	";

	
if(isset($_POST['submit']))
{
	$con = mysqli_connect('localhost','root','','tmf');
	if(!($con))
	{
		echo "<script>alert('Hmmm...! Connection Lost , We Will Take You To Home Page')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}

		$u_id = $_POST['userid'];
		$pass = $_POST['password'];
		$edob = $_POST['userdob'];




		$query_id = "select * from admin WHERE user_name = '$u_id'";
	$run_id = mysqli_query($con,$query_id);

	if(mysqli_num_rows($run_id))
	{
		$query = "select * from admin WHERE dob ='$edob'";
		$run = mysqli_query($con,$query);
		if(mysqli_num_rows($run))
		{	
			
		$query = "UPDATE admin SET password = '$pass' WHERE user_name = '$u_id' AND dob = '$edob' ";
		$run = mysqli_query($con,$query);

			if($run)
			{
				echo "<script>alert('Yay! Password Updated Successfully, Let us Log-In')</script>";
				echo "<script>window.open('admin-login.php','_self')</script>";
			}
			else
			{
				echo "<script>alert('Could Not Update')</script>";
			}
		}
		else
		{
			echo "<script> alert('Your BirthDate is Wrong ') </script>";
		}
	}
	else
	{
		echo 	"<script> alert('No Such UserId Exist!') </script>";
	}
}


}
	?>
</body>
</html>

