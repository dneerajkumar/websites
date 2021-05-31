<?php
session_start();
if((int)$_SESSION['a_flag'] != 1 )
echo "<script>window.open('admin-login.php','_self')</script>";
$_SESSION['update_flag'] = 1;
$con = mysqli_connect('localhost','root','','tmf');
	if(!($con))
	{
		echo "<script>alert('Hmmm...! Connection Lost , We Will Take You To Home Page')</script>";
		echo "<script>window.open('index.php','_self')</script>";
		session_destroy();
	}

	$selectquery = "select * from employee ";
	$query = mysqli_query($con,$selectquery);

	?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin's Zone</title>

	<style>


		body{
	margin: 0;
	padding: 0;
	background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(background.jpg);
	background-size: cover;
	background-attachment: fixed;
	font-family: sans-serif;
}

		.content-table
		{
			border-collapse: collapse;
			margin: 2% 7%;
			font-size: 1em;
			font-family: sans-serif;
			min-width: 800px;
			border-radius: 10px 10px 0 0;
			overflow: hidden;
			box-shadow: 10px 10px 20px  5px rgba(0,0,0,0.9);
		}

		.content-table thead tr
		{
			background-color: #1c8adb;
			color: #ffffff;
			text-align: center;
			font-weight: bold;
		}

		.content-table th,
		.content-table td
		{
			padding : 12px 15px;
			text-align: center;
			font-size: 1em;
		}

		.content-table tbody tr
		{
			border-bottom: 1px solid #dddddd;
		}

		.content-table tbody tr:nth-of-type(even)
		{
			background-color: #f3f3f3;
		}

		.content-table tbody tr:nth-of-type(odd)
		{
			background-color: #fefefe;
		}

		.content-table tbody tr:last-of-type
		{
			border-bottom: 2px solid #1c8adb;
		}

/*------------------------------------------------*/

 .back-btn
{
	border:none;
	outline:none;
	width: 20%;
	height:40px;
	background:#1c8adb;
	color:#fff;
	font-size :18px;
	border-radius: 20px;
	margin-left :15%;
	margin-right: 85%;
	position: absolute;


}

.back-btn:hover
{
	cursor: pointer;
	background: #39dc79;
	color:#000;
}



h1{
	margin: 0;
	padding: 0 0 20px;
	text-align: center;
	font-size:70px;
}








	</style>
</head>
<body>
		<div class="welcome-box">
		<h1 style="color:white;"><i> WELCOME <?php 
		echo $_SESSION['admin-name'];
		?>
		!</i>
	</h1>
		
	</div>
	<center>
	<table class="content-table">
		<tr>
			<thead>
			<th>Photo</th>
			<th>ID</th>
			<th>Name</th>
			<th>User Name</th>
		    <th>Mail -ID</th>
		    <th>Mob No.</th>
		    <th>Designation</th>
		    <th colspan="2">Operations</th>
		    </thead>
		</tr>
			

		<?php 
		while ($res = mysqli_fetch_array($query)) 
		 { ?>	
		<tr>
			<td><?php echo "
  <a target='_blank' href='images/".$res['photo']."'>
    <img src='images/".$res['photo']."' width='50' height='50'>
  </a>";?></td>
			<td><?php echo $res['id']; ?></td>
			<td><?php echo $res['name']; ?></td>
			<td><?php echo $res['user_name']; ?></td>
			<td><?php echo $res['email']; ?></td>
			<td><?php echo $res['mobile']; ?></td>
			<td><?php echo $res['designation']; ?></td>
			<td><a href="update.php?id=<?php echo $res['id']; ?>"><button class="table-btns">Update</button></td>
			<td><a href="delete.php?id=<?php echo $res['id']; ?>"><button class="table-btns">Delete</button></td>
		</tr>
	    <?php } ?>
		</center>
	</table>
	<form action="admin-landing.php" method="post">
		<input type="submit" name ="logout" value="Log-Out" class="back-btn">
	</form>
</body>
</html>

<?php
if(isset($_POST['logout']))
{
	echo "<script>alert('Successfully Logged-Out !')</script>";
	session_destroy();
	echo "<script>window.open('index.php','_self')</script>";
}
?>