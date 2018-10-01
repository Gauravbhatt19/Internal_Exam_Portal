<?php
session_start();
if(empty($_SESSION['logged_in']))
{
  header("location: ../");
}
$conn=mysqli_connect('localhost','root','','spidersd_iep');
$cpass=mysqli_escape_string($conn,$_POST['cpass']);
$npass=mysqli_escape_string($conn,$_POST['npass']);
$cnfpass=mysqli_escape_string($conn,$_POST['cnfpass']);
if(empty($cpass) or empty($npass) or empty($cnfpass))
{
header('location: ./chngepswd.php');
}
else
{
  if(!($npass===$cnfpass))
  {
echo"<script type='text/javascript'>
  window.setTimeout(function() { alert( 'Your confirm Password not match with new password..!' );
    window.location = 'chngepswd.php';},0);
  </script>";
  }
  else
  {
    $id = $_SESSION['id'];
  $result=mysqli_query($conn,"SELECT * FROM students WHERE stud_id='$id'");
  $result_id = mysqli_fetch_assoc($result);
   if(password_verify($cpass,$result_id['pass']))
   {$pass= password_hash( $cnfpass, PASSWORD_DEFAULT);
    $qry="UPDATE students SET pass='$pass' WHERE stud_id='$id'";
    mysqli_query($conn,$qry);
    echo"<script type='text/javascript'>
  window.setTimeout(function() { alert( 'Your Password has been changed..!' );
    window.location = './index.php';},100);
  </script>";}
  else {
      echo"<script type='text/javascript'>
  window.setTimeout(function() { alert( 'Your Password is not correct try again..!' );
    window.location = './chngepswd.php';},0);
  </script>";
  }
  }
}