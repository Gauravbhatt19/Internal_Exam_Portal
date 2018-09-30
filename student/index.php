<html>
<head>
	<meta charset="UTF-8">
	<title>Student | Internal Exam Portal</title>
	<link rel="icon" type="image/png" href="img/logo.png">
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<header>
		<div class="logo">
			<img src="../img/logo.png" width="100">
			<h1>THDC Institute of Hydropower Engineering and Technology</h1>
		</div>
		<nav>
			<h1>Internal Examination Portal</h1>
		</nav>
	</header>
	<div class="xyz">
			
<div class="bd">
		<div class="bx" id="log">
	      	<h1>News</h1>
	      	<ul>
	      		<?php
				$conn=mysqli_connect("localhost","root","","spidersd_iep");
				$result=mysqli_query($conn,"SELECT * FROM news WHERE chck='2' ORDER BY utime DESC");
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
		<div  class="bx">
				<label for="login-type">Login as </label>			</div>
				<div class="bo"></div>

			<div>
				<label for="login-id">Id</label></div>
				<div class="bo">
			</div>
			<div>
				<label for="login-pass">Password</label></div>
				<div class="bo">
			</div>
			<div class="bo">
				
			</div>
	</div>
</div>
	<?php
include '../footer.php'; 
?>
</body>
</html>