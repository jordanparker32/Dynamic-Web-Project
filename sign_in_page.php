
<?php
include('server.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form 
  
  $myusername = mysqli_real_escape_string($db,$_POST['username']);
  $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
  
  $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $active = $row['active'];
  
  $count = mysqli_num_rows($result);
  
  // If result matched $myusername and $mypassword, table row must be 1 row

  if($count == 1) {
     session_register("myusername");
     $_SESSION['login_user'] = $myusername;
     
     header("location: home.html");
  }else {
     $error = "Your Login Name or Password is invalid";
  }
}

?>

<html>
  <head>
    <title>Digital Address Book</title>
  </head>
  <link rel="stylesheet" type="text/css" href="homeStyleSheet.css" />

  <body>
    <h1>Digital Address Book</h1>
    <img src="USM_1970_Rework.png" alt="placeholder circle image" />
    <br />
    <form action="/choose_sites.html" method="post">
      Username:<br />
      <input type="text" name="username" required="required" placeholder="" autofocus required /><br />
      Password:<br />
      <input type="text" name="password" required="required" placeholder="" required/><br /><br />
      <input type="submit" value="Submit" />
      <!--<input type="reset" /> -->
    </form>
    <br />
    <br />
    <a href="sign_up_page.php">Click here to sign up!</a>
  </body>
</html>
