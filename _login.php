<?php
$conn=mysqli_connect("localhost","root","","spidersd_iep");
$id=mysqli_escape_string($conn,$_POST["lid"]);
$pass=mysqli_escape_string($conn,$_POST["lpass"]);
$stype=$_POST['stype'];
if($stype=='1')
	{
		$result=mysqli_query($conn,"SELECT * FROM students WHERE stud_id='$id'");
		if ( $result->num_rows== 0 )
{ 
 	header("location: error.php");
}
else {  $result_id = $result->fetch_assoc();
if(password_verify($pass,$result_id['pass']))
{       
		$_SESSION['id'] = $result_id['stud_id'];
        $_SESSION['name'] = $result_id['fname'];
        $_SESSION['logged_in'] = true;
    	   header("location: ../student/index.php");
    }
  else {
  header("location: error.php");
    }
	}}
else
	{
		$result=mysqli_query($conn,"SELECT * FROM faculty WHERE id='$id'");
		if ( $result->num_rows== 0 )
{ 
 	header("location: error.php");

else {  $result_id = $result->fetch_assoc();
if(password_verify($pass,$result_id['pass']))
{       
		$_SESSION['id'] = $result_id['id'];
        $_SESSION['name'] = $result_id['fname'];
        $_SESSION['logged_in'] = true;
    	   header("location: ../faculty/index.php");
    }
  else {
header("location: error.php");
    }
	}
}
?>
