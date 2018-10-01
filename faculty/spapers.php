<?php
session_start();
if(empty($_SESSION['logged_in']))
{
	header("location: ../");
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Submit Paper | Internal Exam Portal</title>
	<link rel="icon" type="image/png" href="../img/logo.png">
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
		<nav class="fty">
			<h1>Internal Examination Portal</h1>
			<div class="grt">	
				<a href="./chngepswd.php" class="btn">Change Password</a>
				<a href="../index.php" class="btn" style="	height:25px; ">LogOut</a>
			</div>	
		</nav>
	</header>
	<?php  
				$conn=mysqli_connect("localhost","root","","spidersd_iep");
	    $idd=$_SESSION['id'];
	    	$result=mysqli_query($conn,"SELECT * FROM faculty WHERE id='$idd'");
	    	 $result_id=mysqli_fetch_assoc($result);
			$name= $result_id['fname'].' '.$result_id['lname'];
        	$id = $result_id['id'];
        	$dept = $result_id['dept'];
        	if($result_id['cls_inch']==0){
        		$cls='Yes';
        	}
        	else
        	{
        	$cls='No';	
        	}
        	$sub_alot= $result_id['sub_alot'];
				 ?> 

	<div class="xyz">		
<div class="lg">
		<div  class="bx" >
			<h1 style="margin-top:-30px; ">Control Panel</h1>
				
			<div class=" cd  gh"><a href="#" class='lnks'>Manage Students Marks</a></div>

					<div class=" cd  gh" ><a href="#" class='lnks'>Manage Notices</a></div>
				<div class="  cd  gh">
			<a href="#" class='lnks'>Submit Sessional Paper</a></div>		
			
	</div>
</div>
	    <div class="lg">
		<div  class="bx">
			<h1 style="margin-top:-30px; ">Details</h1>
				<div class=" cd"><label>Name :</label><label class='vl' ><?php echo $name; ?></label></div>
				
			<div class=" cd">
				<label>Department:</label><label class='vl' ><?php echo $dept; ?></label></div>

					<div class=" cd">
				<label >Id :</label><label class='vl' > <?php echo $id; ?></label></div>
				<div class="  cd">
			<label >Class Incharge :</label><label class='vl' ><?php echo $cls; ?></label></div>
			<div class=" cd">
			<label >Subject Alotted :</label><label class='vl' > <?php echo $sub_alot; ?></label></div>			
			
	</div>
</div>
	    
</div>
<div class="xyz">

<div class="bd">
		<div class="bx" id="log">
	      	<h1>News</h1>
	      	<ul>
	      		<?php
				$result=mysqli_query($conn,"SELECT * FROM news WHERE chck='3' ORDER BY utime DESC");
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
</div>
	<?php
include '../footer.php'; 
?>
</body>
</html>