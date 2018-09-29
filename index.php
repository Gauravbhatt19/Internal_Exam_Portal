<?php 
?>
<html>
<head>
	<title>EXAM PORTAL | THDC-IHET</title>
	<link rel="icon" type="image/png" href="img/logo.png">
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
<header>
		<div class="logo">
			<img src="img/logo.png" width="100">
			<h1>THDC Institute of Hydropower Engineering and Technology</h1>
		</div>
		<nav>
			<h1>Internal Examination Portal</h1>
		</nav>
	</header>
	<div class="">
		<form action="" class="bx">
			<div>
				<label for="login-type">Login as : </label>
				<select id='login-type'>
					<option selected>Student</option>
					<option>Faculty</option>	
				</select>
			</div>
			<div>
				<label for="login-id">Login Id : </label>
				<input type="text" id='login-id' placeholder="Login Id">
			</div>
			<div>
				<label for="login-pass">Login Password : </label>
				<input type="Password" id='login-pass' placeholder="Login Password">
			</div>
		</form>
	</div>
</body>
</html>