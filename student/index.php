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
	<title>Student | Internal Exam Portal</title>
	<link rel="icon" type="image/png" href="../img/logo.png">
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body style="overflow-x:scroll; ">
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
	    <?php 
	    $idd=$_SESSION['id'];
	    	$result=mysqli_query($conn,"SELECT * FROM students WHERE stud_id='$idd'");
	    	 $result_id=mysqli_fetch_assoc($result);
			$name= $result_id['fname'].' '.$result_id['lname'];
        	$id = $result_id['stud_id'];
        	$branch = $result_id['branch'];
        	$batch= $result_id['batch'];
        	$current_sem= $result_id['current_sem'];
        	$roll= $result_id['roll'];
        	$total_attendance= 0;
				 ?> 
<div class="lg">
		<div  class="bx">
			<h1 style="margin-top:-30px; ">Personal Details</h1>
				<div class=" cd"><label>Name :</label><label class='vl' ><?php echo $name; ?></label></div>
				
			<div class=" cd">
				<label>Branch :</label><label class='vl' ><?php echo $branch; ?></label></div>

					<div class=" cd">
				<label >Student Id :</label><label class='vl' > <?php echo $id; ?></label></div>
				<div class="  cd">
			<label >Roll No :</label><label class='vl' ><?php echo $roll; ?></label></div>
			<div class=" cd">
			<label >Batch :</label><label class='vl' > <?php echo $batch; ?></label></div>			
			<div class=" cd">
			<label >Current Semester :</label><label class='vl' ><?php echo $current_sem; ?></label></div>
				<div class="  cd">
			<label>Total attendance :</label><label class='vl' ><?php echo $total_attendance; ?></label></div>
	</div>
</div>
</div>
<div class="xyz">
	<div class="lg">
		<div  class="bx">
			<h1 style="margin-top:-30px; ">Academic Details</h1>
			<div class="grd">
	      	<div>
			<table>
				   	<tbody>		<tr> <th>Subjects</th>
				      				<th>Sesional 1</th>
				      				<th>Sesional 2</th>
				      				<th>Assignment</th>
				      				<th>Attendance</th> 
				      				<th>Total</th></tr>
				      				<?php
	    	$result=mysqli_query($conn,"SELECT * FROM marks WHERE stud_id='$idd'");
	    	 while($result_id=mysqli_fetch_assoc($result)){
			$ses1= $result_id['ses1'];
			$ses2= $result_id['ses2'];
			$assign= $result_id['assign'];
			$attndce= $result_id['attndce'];
			$subcode= $result_id['sub_code'];
			$sum=$ses1+$ses2+$assign+$attndce;
		echo"
				      			
				      				<tr><td>".$subcode."</td>
				      				<td>".$ses1."</td>
				      				<td>".$ses2."</td>
				      				<td>".$assign."</td>
				      				<td>".$attndce."</td>
				      				<td>".$ses1."</td></tr>";
				      			}?>
				      			</tbody>
				      		</table>	      		
	      </div>
	  </div> 	
	</div>
</div>
</div>
	<?php
include '../footer.php'; 
?>
</body>
</html>