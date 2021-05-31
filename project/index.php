<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome To DMS & CO</title>
	<style type="text/css">
		* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}




#loading{
  
}

:root {
  --secondary-color: #151226;
  --contrast-color: #BF307F;
}
.overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  height: 100%;
  z-index: -10;
  background-color: var(--contrast-color);
}

.container {
  display: flex;
  height: 100vh;
  justify-content: space-around;
  align-items: center;
  color: #fff;
  animation: expand .8s ease forwards;
  background-color: var(--secondary-color);
  position: relative;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  transition: all .8s ease;
}

.container_content {
 width: 50%;
}

.container_content_inner {
	margin-top: 70px;
  width: 80%;
  margin-left: 80px;
}

.container_outer_img {
  margin: 50px;
  width: 50%;
  overflow: hidden;
}   
    
.container_img {
	border-radius:20px;
  width: 80%;
  animation: slideIn 1.5s ease-in-out forwards;
}

.par {
  height: auto;
  overflow: hidden;
}

p{
  line-height: 28px;
  transform: translateY(300px);
  animation: slideUp .8s ease-in-out forwards .8s;
}

.btns {
  height: 100%;
  position: relative;
  width: 150px;
  overflow: hidden;
}

.btns_more {
  background: transparent;
  border: 1px solid var(--contrast-color);
  border-radius: 50px;
  padding: 8px 12px;
  color: #BF307F;
  font-size: 16px;
  text-transform: uppercase;
  position: relative;
  margin-top: 1px;
  outline: none;
  transform: translateY(50px);
  animation: slideUp .8s ease-in-out  forwards 1s;
}
.btns_more:hover
{
	color:#1c8adb;
}
.title {
  overflow: hidden;
  height: auto;
}

h1 {
    font-size: 40px;
    color: var(--contrast-color);
    margin-bottom: 20px;
    transform: translateY(100px);
    animation: slideUp .8s ease forwards .5s;
}

h3 {
    font-size: 20px;
    color: var(--contrast-color);
    margin-bottom: 20px;
    transform: translateY(100px);
    animation: slideUp .8s ease forwards .5s;
}
@keyframes slideIn {
  0% {
    transform: translateX(500px) scale(.2);
  }
  100% {
    transform: translateX(0px) scale(1);
  }
}

@keyframes slideUp {
  0% {
    transform: translateY(300px);
  }
  100% {
    transform: translateY(0px);
  }
}

@keyframes expand {
  0% {
    transform: translateX(1400px);
  }
  100% {
    transform: translateX(0px);
  }
}

	</style>
</head>
<body>
<div class= 'container'>
<div class="container_content">
<div class="container_content_inner">
<div class="title">
  <h1>Welcome To DMS Pvt. Ltd.</h1>
</div>
<div class="par">
	<br>
<h3><u>Employee</u></h3>
<a href="employee-login.php"><button class='btns_more' >Log-In</button></a>
<a href="employee-registration.php"><button class='btns_more' href=""> Register </button></a>
</div>
<div class="par">
	<br>
<h3><u>Admin</u></h3>
<a href="admin-login.php"><button class='btns_more'> Log-In </button></a>
<a href="admin-registration.php"><button class='btns_more'> Register </button></a>
</div>
</div>
</div>
 <div class="container_outer_img">
 <div class="img-inner">
 <img src='company-logo.png'  alt="" class="container_img"/>
       </div>
     </div>
  </div>
<div class="overlay"></div>
</body>
</html>