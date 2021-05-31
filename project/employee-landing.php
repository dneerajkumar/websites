<?php
session_start();
if((int)$_SESSION['flag'] != 1)
echo "<script>window.open('employee-login.php','_self')</script>";

$dataPoints = array(
	array("y" => rand(10,30), "label" => "2013"),
	array("y" => rand(10,30), "label" => "2014"),
	array("y" => rand(10,30), "label" => "2015"),
	array("y" => rand(10,30), "label" => "2016"),
	array("y" => rand(10,30), "label" => "2017"),
	array("y" => $var6 = rand(10,30), "label" => "2018"),
	array("y" => $var7 = rand(10,30), "label" => "2019")
);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Details of <?php echo $_SESSION['ename']; ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
	body
	{
		margin: 0;
		padding: 0;
		background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(background.jpg);
		background-size: cover;
		background-attachment: fixed;
		font-family: sans-serif;
	}

	.lemp
	{
		width:84%;
		height:100%;
		margin-top:5%;
		background:rgba(0,0,0,0.5);
		color:#fff;
		border-radius: 30px;
		margin-left: 6%;
		margin-bottom: 30px;
		padding: 30px 20px 10px ;
	}


h1{
	margin: 0;
	padding: 0 0 10px;
	text-align: center;
	font-size:30px;
}

.lemp input
{
	width: 100%;
	margin-bottom: 10px;
	font-family: sans-serif;

}

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





/*------------Table Property--------*/
.content-table , .content-table2 , .content-table3 
		{
			border-collapse: collapse;
			margin: 2% 7%;
			font-size: 1em;
			font-family: sans-serif;
			min-width: 800px;
			margin-top: 30px;
			border-radius: 10px 10px 0 0;
			overflow: hidden;
			box-shadow: 10px 10px 20px  5px rgba(0,0,0,0.9);
		}

		.content-table thead tr , .content-table2 thead tr , .content-table3 thead tr
		{
			background-color: #1c8adb;
			color: #ffffff;
			text-align: center;
			font-weight: bold;
		}

		.content-table th,
		.content-table td,
		.content-table2 th,
		.content-table2 td,
		.content-table3 th,
		.content-table3 td
		{
			padding : 12px 15px;
			text-align: center;
			font-size: 1em;
		}

		.content-table tbody tr , .content-table2 tbody tr , .content-table3 tbody tr
		{
			border-bottom: 1px solid #dddddd;
		}


		.content-table tbody tr:last-of-type , .content-table2 tbody tr:last-of-type ,.content-table3 tbody tr:last-of-type 
		{
			border-bottom: 2px solid #1c8adb;
		}

		#logoutbtn
		{
			margin-left:20px;
			border-radius:80%;
	width: 40px;
	height:40px;
	background:#1c8adb;
	color:#fff;
	font-size :10px;
	margin-bottom: 20px;
		}
		#logoutbtn:hover
		{
			cursor: pointer;
	background: #39dc79;
	color:#000;
		}
.profile-holder
{
	position:relative;
}


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

.upd_btn
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

.upd_btn:hover
{
	cursor: pointer;
	background: #39dc79;
	color:#000;
}



	</style>
	<script>
		window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Your Performance !"
	},
	axisY: {
		title: "Work Units"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
	</script>

</head>
<body>
	<div class="lemp">

		<form action="employee-landing.php" method="post" enctype="multipart/form-data">

			<h1> WELCOME <?php 
			if(isset($_SESSION['ename']))
			echo $_SESSION['ename'];
			else
			{

				echo "<script>window.open('employee-login.php','_self')</script>";
			}
			?>
			!<button type="submit" id = "logoutbtn" name="logout" ><i style="font-size:24px" class="fa">&#xf011;</i></button>
		</h1>

			<div class="profile-holder">
			<?php 
			$u_id = $_SESSION['emp_id'];
			$con = mysqli_connect('localhost','root','','tmf');
	if(!($con))
	{
		echo "<script>alert('Hmmm...! Connection Lost , We Will Take You To Home Page')</script>";
		echo "<script>window.open('index.php','_self')</script>";
		session_destroy();
	}

	$query = "select * from employee WHERE id = '$u_id' ";
	$fth_query = mysqli_query($con,$query);
			?>
			<center>
				<?php
				$qry = "select * from employee where id = '$u_id' ";
			$res = mysqli_query($con,$qry);

      if($rw = mysqli_fetch_array($res))
      {

      	echo "    <center>
<div class='gallery'>
  <a target='_blank' href='images/".$rw['photo']."'>
    <img src='images/".$rw['photo']."' width='500' height='500'>
  </a>
</div></center>";
       // echo "<img src='images/".$rw['photo']."' height='120px' width='120px' style='border-radius: 10%;margin-top:15px;'>";
      }


      else
      {
        echo "<script>alert('Invalid ID')</script>";
      }

		?>
			<h3>Profile pic</h3></center>
			</div>

			<div class="data-holder">
				<center>
	<table class="content-table" >
		<?php 
		$u_id = $_SESSION['emp_id'];
		$con = mysqli_connect('localhost','root','','tmf');
	if(!($con))
	{
		echo "<script>alert('Hmmm...! Connection Lost , We Will Take You To Home Page')</script>";
		echo "<script>window.open('index.php','_self')</script>";
		session_destroy();
	}

	$query = "select * from employee WHERE id = '$u_id' ";
	$fth_query = mysqli_query($con,$query);
	?>
		<tr>
			<thead>
			<th>ID</th>
			<th>Name</th>
			<th>User Name</th>
		    <th>Mail -ID</th>
		    <th>Mob No.</th>
		    </thead>
		</tr>
		<?php 
		while ($res = mysqli_fetch_array($fth_query)) 
		 { ?>
		<tr>
			<td><?php echo $res['id']; ?></td>
			<td><?php echo $res['name']; ?></td>
			<td><?php echo $res['user_name']; ?></td>
			<td><?php echo $res['email']; ?></td>
			<td><?php echo $res['mobile']; ?></td>
		</tr>
	<?php } ?>
	</table>
</center>


<center>

	<table class="content-table2">
		<?php 
		$query = "select * from employee WHERE id = '$u_id' ";
	$fth_query = mysqli_query($con,$query); ?>
		<tr>
			<thead>
			<th>Designation</th>
			<th>Gender</th>
			<th>Address</th>
			<th>Blood Group</th>
		    <th>D.O.B</th>
		    </thead>
		</tr>
		<?php 
		while ($res = mysqli_fetch_array($fth_query)) 
		 { ?>
		<tr>
			<td><?php echo $res['designation']; ?></td>
			<td><?php echo $res['gender']; ?></td>
			<td><?php echo $res['address']; ?></td>
			<td><?php echo $res['blood_group']; ?></td>
			<td><?php echo $res['dob']; ?></td>
		</tr>
	<?php } ?>
	</table>
</center>
<center>
<table class="content-table3" >
	<?php 
	$tmp_desgn = $_SESSION['desgn'];
		$query = "select * from salary WHERE designation = '$tmp_desgn' ";
	$fth_query = mysqli_query($con,$query); ?>
		<tr>
			<thead>
			<th>Basic Salary</th>
			<th>TA%</th>
			<th>DA%</th>
		    <th>HRA%</th>
		    <th>Gross Salary</th>
		    </thead>
		</tr>
			<?php 
		while ($rs = mysqli_fetch_array($fth_query)) 
		 { ?>
		<tr>
			<td><?php echo $rs['salary_amount'];?></td>
			<td><?php echo $rs['TA'];?></td>
			<td><?php echo $rs['DA'];?></td>
			<td><?php echo $rs['HRA'];?></td>
			<td><?php echo $rs['salary_amount']-($rs['TA']/100*$rs['salary_amount'] + $rs['DA']/100*$rs['salary_amount'] + $rs['HRA']/100*$rs['salary_amount'] );?></td>
		</tr>
	<?php } ?>
	</table>
</center>
<center>
	<div id="chartContainer" style="height: 170px; width: 800px;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php 
 if($var7 > $var6)
 {
 	echo "Progress increasing gradually Keep it up !!";
 }
 else
 {
 	echo "Progress decreasing gradually Work Hard try to improve your Performance";
 }
?>
</center>
			<center>
				<?php 
			$query = "select * from employee WHERE id = '$u_id' ";
	$fth_query = mysqli_query($con,$query);?>
	<?php 
		while ($res = mysqli_fetch_array($fth_query)) 
		 { ?>
		 	<a href="employee-update.php?id=<?php echo $res['id']; ?>" class="upd_btn">UPDATE</a>
		<?php } ?>
			
			</center>
			</div>
		</form>
	</div>

</body>
</html>
<? goto fresh; ?>
<?php 
if(isset($_POST['logout']))
{
	echo "<script>alert('Successfully Logged-Out !')</script>";
	session_destroy();
	echo "<script>window.open('index.php','_self')</script>";
}

?>