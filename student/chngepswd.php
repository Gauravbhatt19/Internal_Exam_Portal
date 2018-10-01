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
<body>
<header>
    <div class="logo">
      <img src="../img/logo.png" width="100">
      <h1>THDC Institute of Hydropower Engineering and Technology</h1>
    </div>
    <nav class="fty">
      <h1>Internal Examination Portal</h1>
      <div class="grt"> 
        <a href="./index.php" class="btn">Student Area</a>
        <a href="../index.php" class="btn" style="  height:25px; ">LogOut</a>
      </div>  
    </nav>
  </header>

<div class="xyz">
  <div class="lg">
    <form action="./_chngepswd.php" class="bx" onsubmit="validate()" method="post">
      <h1>Change Password</h1>
      <div>
        <label for="c-pass">Current Password </label>     </div>
        <div class="bo">
          <input type="Password" placeholder="Current Password" id='c-pass'  name='cpass'>
        </div>

      <div>
        <label for="n-pass">New Password</label></div>
         <div class="bo">
          <input type="Password" placeholder="New Password" id='n-pass'  name='npass'>
        </div>
      <div>
        <label for="cnf-pass">Confirm Password</label></div>
        <div class="bo"><input type="Password" id='cnf-pass' placeholder="Confirm Password"  name='cnfpass'>
      </div>
      <div class="bo">
        <input type="submit" value="Change" >
      </div>
    </form>
  </div>
</div>
  <?php
include '../footer.php'; 
?>
</body>
</html>