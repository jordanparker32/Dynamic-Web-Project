<?php
    include('server.php');

    session_start();
   
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
	      $email = $_POST['email'];
        $password = $_POST['password'];
 
        $query = "INSERT INTO `user` (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($connection, $query);
        if($result){
            $smsg = "User Created Successfully.";
        }else{
            $fmsg ="User Registration Failed";
        }
    }

?>
<html>
  <head>
    <title>Sign-Up</title>
  </head>
  <link rel="stylesheet" type="text/css" href="homeStyleSheet.css" />

  <body>
    <h1>Let's get you signed up!</h1>
    <br />
    <h3>Please enter required infomation below.</h3>
    <form action="choose_sites.html" method="post">
      Username:<br />
      <input type="text" name="username"/><br />
      Email:<br />
      <input type="text" name="email"/><br />
      Password:<br />
      <input type="text" name="password" /><br />
      <br>
      <input type="submit" value="Submit" />
      <!--<input type="reset" /> --> 
    </form>
  </body>
</html>
