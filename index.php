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
<?php
include './header.php'; 
?>
		<div class="xyz">
			
<div class="bd">
		<div class="bx" id="log">
	      	<h1>News</h1>
	      	<ul>
	      		<?php
				$conn=mysqli_connect("localhost","root","","spidersd_iep");
				$result=mysqli_query($conn,"SELECT * FROM news WHERE chck='1' ORDER BY utime DESC");
				$i=0;
				while($row=mysqli_fetch_assoc($result) and $i<3){
					$i++;
						if($row['status']==1)
					      	{
					      		echo "<li><h3>".$row['hdr']."</h3> <p>".$row['msg'];
					      		if($row['filename'])
					      			{ $link="/upload/".$row['filename'].".pdf";
					      			echo '<a href="'.$link.'" download="'.$row['filename'].'.pdf" class="hglt"> Attachment </a></p>';
					      		}
					      		echo "<h6> Date:". $row['utime']."</h6></li>";
					      		}
	      	}
	      	?>
	      		
	      	</ul>
	      	</div>
	      </div>
<div class="lg">
		<form action="./_login.php" class="bx" onsubmit="validate()" method="post">
			<div>
				<label for="login-type">Login as </label>			</div>
				<div class="bo"><select id='login-type' name='stype'>
					<option selected value='1'>Student</option>
					<option value="2">Faculty</option>	
				</select></div>

			<div>
				<label for="login-id">Id</label></div>
				<div class="bo"><input type="text" id='login-id' placeholder="Login Id"  name='lid'>
			</div>
			<div>
				<label for="login-pass">Password</label></div>
				<div class="bo"><input type="Password" id='login-pass' placeholder="Login Password"  name='lpass'>
			</div>
			<div class="bo">
				<input type="submit" value="Login " >
			</div>
		</form>
	</div>
</div>
<?php
include './footer.php'; 
?>
	</body>
</html>