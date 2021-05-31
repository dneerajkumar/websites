<!DOCTYPE html>
<html>
<head>
	<title>Admin Registration</title>
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
	height:900px;
	margin-top:1%;
	margin-bottom: 5%;
	background:rgba(0,0,0,0.5);
			color:#fff;
			border-radius: 30px;
			margin-left: 21%;
			margin-bottom: 30px;
			padding: 60px 20px;
}


h1{
	margin: 0;
	padding: 0 0 20px;
	text-align: center;
	font-size:30px;
}

.regi input
{
	margin-bottom: 3px;
	font-family: sans-serif;

}

.regi input[type="text"] , input[type="password"] ,input[type="date"] , input[type="area"] , input[type="email"] , input[type="file"] , input[type="number"] 
{
	width: 100%;
	border:none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline: none;
	height: 40px;
	color: #fff;
	font-size: 20px;
	font-style:italic;
}

.regi input[type="button"]
{
	width:100%;
	border:none;
	outline:none;
	height:35px;
	width: 45%;
	background:#1c8adb;
	color:#fff;
	font-size :25px;
	border-radius: 20px;
	margin-top: 10px;
}

.regi input[type="button"]:hover
{
	cursor: pointer;
	background: #39dc79;
	color:#000;
}

.regi input[type="submit"]
{
	display:inline-block;
	border:none;
	outline:none;
	height:35px;
	width:45%;
	background:#1c8adb;
	color:#fff;
	font-size :25px;
	border-radius: 20px;
	margin-top: 50px;
}

.regi input[type="submit"]:hover
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

	

		/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  color: #000;
  width : 80%;
  height: 30%;
  position: relative;
  padding: 10px;
  margin-top: 1px;
}

#message p {
  padding: 5px 35px;
  font-size: 12px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}


	</style>
</head>
<body>
	<div class="regi">
		<h1> New Admin Registration</h1>
		<form action="#" method="post">
			<?php 

				
			?>
			<p>Admin Name</p>
			<input type="text" name="admin-name" placeholder="Enter Your Name" required>

			<p>User Name</p>
			<input type="text" name="user-name" placeholder="Set Your User Name e.g. Neeraj" required>

			<p>Date of Birth:</p>
			<input type="date" name="dob" min="1960-01-01" max="2000-12-31" required>
			
		    <p>Mobile number:</p>
		    <input type="number" name="mob" placeholder="Type Your Mobile No. e.g. 7077600849 'Do not include Country Code' " required>
			
						<p>Password:</p>
			<input type="password" id="psw" name="pass" placeholder="Enter a password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
			<h4><input type="checkbox" onclick="myFunction()">Show Password</h4>
			<div id="message">
  <h4 style="color:white;">Password Must contain the following:</h5>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
<p>Master Admin</p>
		    <input type="password" name="master_admin" placeholder="Existing Admin Password" required>
<script>
function myFunction() {
  var x = document.getElementById("psw");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
  document.getElementById('reg').style.display = "none";
}

myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
  document.getElementById('reg').style.display = "block";
}
// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
    var f1 = 1;
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
    var f2 = 1;
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
    var f3 = 1;
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
    var f4 = 1;
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
  if(f4&&f3&&f2&&f1)
  {
  document.getElementById("message").style.display = "none";
   document.getElementById('reg').style.display = "block";
  
}
	else
	{
		document.getElementById("message").style.display = "block";
	}
}
</script>

			<center>
			<input type="submit" id="reg" name="register" value="Register">
				<a href="index.php">
			<input type="button" name="back" value="Back">
		</a>
			</center>
		</form>
	</div>
</body>
</html>

<?php 
	if(isset($_POST['register']))
	{

		$con = mysqli_connect('localhost','root','','tmf');
		if($con)
		{
		
			$name = $_POST['admin-name'];
			$username = $_POST['user-name'];
			$password = $_POST['pass'];
			$gen = $_POST['gender'];
			$mobile = $_POST['mob'];
			$edob = $_POST['dob'];

			$m_pass = $_POST['master_admin'];

			$query_pass = "select * from admin WHERE password = '$m_pass' ";
			$run_pass = mysqli_query($con,$query_pass);
			$arrdata = mysqli_fetch_array($run_pass);

		if(mysqli_num_rows($run_pass))
		{
			$under_admin = $arrdata['admin_name'];

				echo "<script>alert('master Exist')</script>";

		$sql = "insert into admin (admin_name,password,via_admn,user_name,dob,mobile) values ('$name','$password','$under_admin','$username','$edob','$mobile')";

			if(mysqli_query($con,$sql))
			{
				echo "<script> alert('Sucessfully Added ! You Will be Redirected to Log-In Form!'); </script>";
			echo "<script>window.open('admin-login.php','_self')</script>";

		}
		else
		{
			echo "<script> alert('Could Not Add'); </script>";
		}

		}

			else
			{
				echo "<script>alert('Invalid Master Passcode Please Recheck and Try Again !')</script>";
			}
	}
		else
		{
			echo "<script> alert('Hmm...! Connection Lost'); </script>";
		}

		

	}
?>