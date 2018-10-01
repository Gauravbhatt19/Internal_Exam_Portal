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
	<title>Manage Marks| Internal Exam Portal</title>
	<link rel="icon" type="image/png" href="../img/logo.png">
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<script type="text/javascript">
		function accessmrks()
		{   var sid=document.getElementById('sub-code');
			var scode=sid.value;
		}
	</script>
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
				
			<div class="cd  gh"><a href="./index.php" class='lnks'>Faculty Area</a></div>

					<div class="cd  gh" ><a href="#" class='lnks'>Manage Notices</a></div>
				<div class="cd  gh">
			<a href="#" class='lnks'>Submit Sessional Paper</a></div>		
			
	</div>
</div>
	    <div class="lg">
		<div  class="bx">
			<div>
				<label for="sub-code">Select Subject Code </label>			</div>
				<div class="bo"><select id='sub-code' name='scode'   onchange="accessmrks()">
					<option selected value='0' disabled="">Subject Code</option>
					<?php
					$sub_codes=split(',', $sub_alot);
					foreach ($sub_codes as $subcode) {
					echo "<option value='$subcode'>".$subcode."</option>";
					}
					?>
				</select>
			</div>
	</div>
</div>
	    
</div>
<div class="xyz">


</div>
	<?php
include '../footer.php'; 
?>
</body>
</html>