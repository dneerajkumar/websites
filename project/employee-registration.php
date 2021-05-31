<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
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

		.regi
		{
			width:60%;
			height:1700px;

			margin-top:1%;
			background:rgba(0,0,0,0.5);
			color:#fff;
			border-radius: 30px;
			margin-left: 21%;
			margin-bottom: 30px;
			padding: 60px 20px;
		}


		h1
		{
			margin: 0;
			padding: 0 0 20px;
			text-align: center;
			font-size:30px;
		}

		.regi input
		{
			margin-bottom: 1px;
			font-family: sans-serif;
		}

		.regi input[type="text"] , 
		input[type="password"] ,
		input[type="date"] , 
		input[type="area"] , 
		input[type="email"] , 
		input[type="file"] , 
		input[type="number"]
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


		.regi input[type="submit"]
		{
			width: 50%;
			border:none;
			outline:none;
			height:40px;
			background:#1c8adb;
			color:#fff;
			font-size :28px;
			border-radius: 20px;
			margin-top: 20px;
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
			width: 50%;
			border:none;
			outline:none;
			height:40px;
			background:#1c8adb;
			color:#fff;
			font-size :28px;
			border-radius: 20px;
			margin-top: 20px;
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

		p
		{
			font-size: 20px;

		}

	

		input:out-of-range
		{
			background:red;
		}

		#reg{
			display: block;
		}


		/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  color: #000;
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
		<h1>New Employee Registration</h1>
		<form action="employee-registration.php" method="post" enctype="multipart/form-data" id="main-form">
			<input type="hidden" name="size" value="1000000">
			<?php
					$t_name = "";
					$t_username = "";
					$t_dob = "";
					$t_desgn = "";
					$t_mob = "";
					$t_mail = "";
					$t_address = ""; 
				if(isset($_POST['register']))
				{
					$t_name = $_POST['nm'];
					$t_username = $_POST['user-name'];
					$t_dob = $_POST['dob'];
					$t_desgn = $_POST['design'];
					$t_mob = $_POST['mobile'];
					$t_mail = $_POST['mail'];
					$t_address = $_POST['add'];
				}
			?>
			<p>Name</p>
			<input type="text" name="nm" placeholder="Enter Full Name" value="<?php echo "$t_name";?>"required>
			
			<p>User Name</p>
			<input type="text" name="user-name" placeholder="Set your UserName" value="<?php echo "$t_username";?>"required>

			<p>Date of Birth:</p>
			<input type="date" name="dob" min="1960-01-01" max="2000-12-31" value="<?php echo "$t_dob";?>"required>
		
			<p>Gender:</p> 
			<select class="dropdown" name="gender" required>
					<option selected value=""><span>--Select Gender--</span></option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Others">Others</option>
				</select>

			<p>Designation:</p> 
			<select class="dropdown" name="design" required>
					<option selected value=""><span>Select Designation</span></option>
					<option value="Team">Team</option>
					<option value="Manager">Manager</option>
					<option value="CEO">CEO</option>
					<option value="Marketing Head">Marketing Head</option>
					<option value="Creative Head">Creative Head</option>
					<option value="HR">HR</option>
					<option value="Supervisor">Supervisor</option>
					<option value="Sales man">Sales Man</option>
					<option value="Others">Others</option>
				</select>
			
		    <p>Mobile number:</p>
		    <input type="number" name="mobile" id="usermob" min="6000000000" max="9999999999"placeholder="Enter Your Mobile number" value="<?php echo "$t_mob";?>" required>
			
			<p>E-mail:</p>
			<input type="email" name="mail" placeholder="Enter Your E-mail" value="<?php echo "$t_mail";?>"required>

			<p>Blood Group:</p>
				<select class="dropdown" name="b_group" required>
					<option selected value="">Select Blood Group</option>
					<option value="A+">A+</option>
					<option value="B+">B+</option>
					<option value="O+">O+</option>
					<option value="AB+">AB+</option>
					<option value="A-">A-</option>
					<option value="B-">B-</option>
					<option value="O-">O-</option>
					<option value="AB-">AB-</option>
				</select>

				
			<p>Address:</p>
			<input type="area" name="add" placeholder="Enter Your Address" value="<?php echo "$t_address";?>" required>
			
			<p>Photo:</p>
			<input type="file" name="image" placeholder="choose a Photo" required>
			
			<p>Password:</p>
			<input type="password" id="psw" name="pass" placeholder="Enter a password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Should contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
			<h4><input type="checkbox" onclick="myFunction()">Show Password</h4>
			<div id="message">
  <h4 style="color:white;">Password Should contain the following:</h4>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>

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

// When the user clicks outside of the password field, hide the message box
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
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
    var flag = 1;
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
  if(flag)
  {
  document.getElementById("message").style.display = "none";
  document.getElementById("reg").style.display = "block";
}
	else
	{
		document.getElementById("message").style.display = "block";
		document.getElementById("reg").style.display = "none";
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
		
			$name = $_POST['nm'];
			$username = $_POST['user-name'];
			$email = $_POST['mail'];
			$password = $_POST['pass'];
			$gen = $_POST['gender'];
			$designation = $_POST['design'];
			$mobile = $_POST['mobile'];
			$edob = $_POST['dob'];
			$blood_group = $_POST['b_group'];
			$address = $_POST['add'];
			
			// Get image name
  	$image = $_FILES['image']['name'];
  	// image file directory
  	$target = "images/".basename($image);

		$query_name = "select * from employee WHERE user_name = '$username'";
		$run_name = mysqli_query($con,$query_name);

		if(mysqli_num_rows($run_name))
		{	
			echo "<script>alert('This User Name is Associated With Different Account So Try Again With Different One ')</script>";
		}
		else
		{
$sql = "insert into employee (name,photo,email,password,user_name,dob,blood_group,mobile,designation,address,gender) values ('$name','$image','$email','$password','$username','$edob','$blood_group','$mobile','$designation','$address','$gen')";
	

if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
 		echo "<script>alert('Image uploaded successfully')</script>";
  	}else{
  		echo"<script>alert('Could Not insert Picture !')</script>";
  	} 
  

		$res = mysqli_query($con,$sql);

		if($res)
		{
			$show_query = "select * from employee where user_name = '$username' ";
			$show_data = mysqli_query($con,$show_query);
			$arrdata = mysqli_fetch_array($show_data);
			$tmp_id =  $arrdata['id'] ;
			$tmp_name = $arrdata['name'];
			echo "<script> alert('$tmp_name your profile has successfully been registered'); </script>";
			echo "<script>alert('$tmp_id is Your Employee ID , Use this to Log-In ')</script>";
			echo "<script>window.open('employee-login.php','_self')</script>";
		}
		else
		{
			echo "<script> alert('Could Not Add'); </script>";
		}

		}

	}
		else
		{
			echo "<script> alert('Hmm...! Connection Lost'); </script>";
		}

		

	}
?>