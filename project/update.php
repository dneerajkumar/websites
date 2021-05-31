<?php 
session_start();
		if((int)($_SESSION['a_flag']) != 1)
		{
			echo "<script>window.open('admin-login.php','_self')</script>";
		}
		else
		{
$con = mysqli_connect('localhost','root','','tmf');
	if(!($con))
	{
		echo "<script>alert('Hmmm...! Connection Lost , We Will Take You To Home Page')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}


	$ids = $_GET['id'];
	$show_query = "select * from employee where id = '$ids' ";
	$show_data = mysqli_query($con,$show_query);
	$arrdata = mysqli_fetch_array($show_data);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $arrdata['name']; ?>'s Details</title>
	<style type="text/css">
		body{
	margin: 0;
	padding: 0;
	background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(background.jpg);
	background-size: cover;
	background-attachment: fixed;
	font-family: sans-serif;
}

.regi{
	width:60%;
	height:1100px;
	margin-top:5%;
	background:rgba(0,0,0,0.5);
			color:#fff;
			border-radius: 30px;
			margin-left: 21%;
			margin-bottom: 30px;
			padding: 40px 20px;
}


h1{
	margin: 0;
	padding: 0 0 20px;
	text-align: center;
	font-size:30px;
}

.regi input
{
	width: 100%;
	margin-bottom: 10px;
	font-family: sans-serif;

}

.regi input[type="text"] , input[type="password"] ,input[type="date"] , input[type="area"] , input[type="email"] , input[type="file"] , input[type="number"]
{
	border:none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline: none;
	height: 40px;
	color: #fff;
	font-size: 20px;
	/*font-style:italic;*/
}


.regi input[type="submit"]
{
	border:none;
	outline:none;
	width: 180px;
	height:40px;
	background:#1c8adb;
	color:#fff;
	font-size :18px;
	border-radius: 20px;
	margin-top: 30px;
	margin-bottom: 20px;
}

.regi input[type="submit"]:hover
{
	cursor: pointer;
	background: #39dc79;
	color:#000;
}

.regi input[type="button"]
{
	border:none;
	outline:none;
	width: 180px;
	height:40px;
	background:#1c8adb;
	color:#fff;
	font-size :18px;
	border-radius: 20px;
	margin-top: 30px;
	margin-bottom: 20px;
}

.regi input[type="button"]:hover
{
	cursor: pointer;
	background: #39dc79;
	color:#000;
}


.dropdown
{
	border:none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline: none;
	height: 40px;
	color: #fff;
	font-size: 20px;
	/*font-style:italic;*/
}

p{
	font-size: 20px;

}

	</style>
</head>
<body>
	<div class="regi">
		<h1>Update</h1>
		<form action="#" method="post">
			<p>Employee ID</p>
			<input type="text" value="<?php echo $arrdata['id']; ?>" disabled>

			<p>Name</p>
			<input type="text" name="name" value="<?php echo $arrdata['name']; ?>" disabled>
			
			<p>User Name</p>
			<input type="text" name="u-name" value="<?php echo $arrdata['user_name']; ?>" required>
		
			<p>Designation:</p>
			<?php $options = $arrdata['designation']; ?>
			<select class="dropdown" name="design" required>
					<option value='Team' <?php if($options=="Team") echo 'selected="selected"'; ?>>Team</option>
					<option value='Manager' <?php if($options=="Manager") echo 'selected="selected"'; ?>>Manager</option>
					<option value='CEO' <?php if($options=="CEO") echo 'selected="selected"'; ?>>CEO</option>
					<option value='Marketing Head' <?php if($options=="Marketing Head") echo 'selected="selected"'; ?>>Marketing Head</option>
					<option value='Creative Head' <?php if($options=="Creative Head") echo 'selected="selected"'; ?>>Creative Head</option>
					<option value='HR' <?php if($options=="HR") echo 'selected="selected"'; ?>>HR</option>
					<option value='Supervisor' <?php if($options=="Supervisor") echo 'selected="selected"'; ?>>Supervisor</option>
					<option value='Sales man' <?php if($options=="Sales man") echo 'selected="selected"'; ?>>Sales Man</option>
					<option value='Others' <?php if($options=="Others") echo 'selected="selected"'; ?>>Others</option>
				</select>
			
		    <p>Mobile number:</p>
		    <input type="number" name="mob" value="<?php echo $arrdata['mobile']; ?>" required>
			
			<p>E-mail:</p>
			<input type="email" name="mail" value="<?php echo $arrdata['email']; ?>" required>
			
			<p>Address:</p>
			<input type="area" name="add" value="<?php echo $arrdata['address']; ?>" required>
			
			<center><input type="submit" name="submit" value="Update">
			<input type="submit" name="back" value="Back"></center>

		</form>
	</div>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
	$u_name = $_POST['u-name'];
	$eid = $ids;
	$mob = $_POST['mob'];
	$mail = $_POST['mail'];
	$design = $_POST['design'];
	$add = $_POST['add'];

		$con = mysqli_connect('localhost','root','','tmf');
	if(!($con))
	{
		echo "<script>alert('Hmmm...! Connection Lost , We Will Take You To Home Page')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}


		$query = "UPDATE employee SET user_name = '$u_name', mobile = '$mob', email = '$mail', designation = '$design', address = '$add' WHERE id = '$eid' ";
		$run = mysqli_query($con,$query);

			if($run)
			{
				echo "<script>alert('updated')</script>";
				$_SESSION['ename'] = $u_name;
				header("refresh:1 ;");
			}
			else
			{
				echo "<script>alert('Not Updated')</script>";
			}

}


if(isset($_POST['back']))
{
		header("refresh:1 ; url='admin-landing.php' ");
}







?>