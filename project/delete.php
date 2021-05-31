<?php 
session_start();

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
	<title></title>
	<style>
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
	height:400px;
	margin-top:5%;
	background:rgba(0,0,0,0.5);
			color:#fff;
			border-radius: 30px;
			margin-left: 18%;
			margin-bottom: 30px;
			padding: 40px 20px;
}


h1{
	margin: 0;
	padding: 0 0 20px;
	text-align: center;
	font-size:30px;
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
td{padding: 1px;
text-align: center;}

div.gallery {
  margin: 5px;
  border: 5px solid #ccc;
  border-radius: 10px;
  float: center;
  width: 120px;
}

div.gallery:hover 
{
	border: 5px solid #1c8adb;  
}

div.gallery img {
  width: 100%;
  height: 100%;
  border-radius: 10px;

}

div.desc {
  padding: 1px;
  text-align: center;
}

	</style>
}
</head>
<body>
	<div class="regi">
		<h1>Are You Sure Want To Delete ?</h1><br>
		<form action="#" method="post" enctype="multipart/form-data">
<?php
			$tmp_id = $arrdata['id'];
			$qry = "select * from employee where id = '$tmp_id' ";
			$res = mysqli_query($con,$qry);

      if($rw = mysqli_fetch_array($res))
      {

      	echo "    <center>
<div class='gallery'>
  <a target='_blank' href='images/".$rw['photo']."'>
    <img src='images/".$rw['photo']."' width='500' height='500'>
  </a>
</div></center>";
}?>
			<center>
				<h3><?php echo $arrdata['name']; ?>&nbsp;'s Profile</h3>
				<a href="admin-landing.php">
			<input type="button" value="No"></a>
			<input type = "submit" value="Yes" name="del">
</center>
		</form>
	</div>
</body>
</html>
<?php
if(isset($_POST['del']))

{


	$dt = $arrdata['id'];
	$del_query = "DELETE FROM employee WHERE id = '$dt' ";

	if(mysqli_query($con,$del_query))
	{
		echo "<script>alert('Successfully Deleted')</script>";
		echo "<script>window.open('admin-landing.php' , '_self')</script>";
	}else
	{
		echo "<script>alert('Could no delete')</script>";
	}
}

?>