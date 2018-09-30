<?php
$fname='Vivek';
$lname='Kumar';
$dept='CSE';
$id='VKCSE01';
$pass='12345';
$cls_inch=0;
$sub_alot='TCS301,TCS501,TCS701,TCS703';
$pass= password_hash($pass,PASSWORD_DEFAULT);
$conn=mysqli_connect("localhost","root","","spidersd_iep");
$qry="INSERT INTO faculty (fname,lname,dept,id,pass,cls_inch,sub_alot) VALUES ('{$fname}','{$lname}','{$dept}','{$id}','{$pass}','{$cls_inch}','{$sub_alot}')";
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