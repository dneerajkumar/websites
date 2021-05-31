<?php 
session_start();
?>
<?php
if(!(isset($_SESSION['emp_id'])))
{
	echo "<script>window.open('employee-login.php','_self')</script>";
}

$tmp_id = $_SESSION['emp_id'] ;
if(!($tmp_id == (int)$_GET['id']))
{
	echo "<script>alert('URL Access is not Allowed ! Log-In To continue')</script>" ; 
	session_destroy();
	echo "<script>window.open('employee-login.php','_self')</script>";
}
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

?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Profile</title>
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
			outline:none;
			height:40px;
			background:#1c8adb;
			color:#fff;
			font-size :18px;
			border-radius: 20px;
			margin-top: 20px;
			margin-bottom: 20px;
		}

		.dropdown:hover
		{
			cursor: pointer;
			background: #39dc79;
			color:#000;
		}


p{
	font-size: 20px;

}

	</style>
</head>
<body>
	<div class="regi">
		<h1>Update Details</h1>
		<form action="#" method="post" enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
			<p>Employee ID : </p><p><?php echo $arrdata['id']; ?> </p>

			<p>User Name : </p><p><?php echo $arrdata['user_name']; ?></p>

			<p>Name : </p><p><?php echo $arrdata['name']; ?> </p>
			
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

			<p>Photo:</p>
			<input type="file" name="image" placeholder="choose a Photo" required>

			<center><input type="submit" name="submit" value="Update">
				<a href="employee-landing.php">
			<input type="button" name="back" value="Back"></a></center>

		</form>
	</div>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
	$_SESSION['desgn'] = $_POST['design'];
	$eid = $ids;
	$mob = $_POST['mob'];
	$mail = $_POST['mail'];
	$design = $_POST['design'];
	$add = $_POST['add'];

		// Get image name
  	$image = $_FILES['image']['name'];
  	// image file directory
  	$target = "images/".basename($image);

		$con = mysqli_connect('localhost','root','','tmf');
	if(!($con))
	{
		echo "<script>alert('Hmmm...! Connection Lost , We Will Take You To Home Page')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}

		$query_name = "select * from employee WHERE user_name = '$u_name'";
		$run_name = mysqli_query($con,$query_name);

	
		$query = "UPDATE employee SET mobile = '$mob', email = '$mail', photo = '$image' , designation = '$design', address = '$add' WHERE id = '$eid' ";
		$run = mysqli_query($con,$query);

			if($run)
			{
				echo "<script>alert('Your Profile has been Successfully Updated!')</script>";
				header("refresh:1 ;");
			}
			else
			{
				echo "<script>alert('Not Updated')</script>";
			}
		
}










?>