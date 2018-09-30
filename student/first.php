<?php
$fname='Gaurav';
$lname='Bhatt';
$branch='CSE';
$stud_id='GB1924';
$roll=160970101020;
$pass='12345';
$batch=2016;
$sem=05;
$pass= password_hash($pass,PASSWORD_DEFAULT);
$conn=mysqli_connect("localhost","root","","spidersd_iep");
$qry="INSERT INTO students (fname,lname,branch,stud_id,roll,pass,batch,current_sem) VALUES ('{$fname}','{$lname}','{$branch}','{$stud_id}','{$roll}','{$pass}','{$batch}','{$sem}')";
$result=mysqli_query($conn,$qry);
if($result)
{ echo "Hello ".$fname." ".$lname." , Succesfully Registered";
}
else
{	$first=mysqli_error($conn);
	$second='Duplicate';
	if( (strpos($first,$second) !== false)) {
	echo "Duplicate Entry";
}
else {
	echo "Unknwn Error.!";}
}
?>