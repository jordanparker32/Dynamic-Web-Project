<?php
  
    include('server.php');
    session_start();
    
    if (!$db) {
      die("Connection failed: " . mysqli_connect_error());
  }
    if (isset($_POST['username']) && isset($_POST['password'])){
      $username=mysqli_real_escape_string($db,$_POST['username']);
      $email=mysqli_real_escape_string($db,$_POST['email']);
      $password=mysqli_real_escape_string($db,$_POST['password']);
      $query = "INSERT INTO `users` (username, password, email) VALUES ('$username', '$email', '$password')";
      //$query = "UPDATE `users` SET `username` = $username, `email` = $email, `password` = $password";
      mysqli_query( $query, $db ) or trigger_error( mysql_error( $db ), E_USER_ERROR );
      $result = mysqli_query($db, $query);
    }
    mysqli_close($db);
?>
<html>
  <head>
    <title>Sign-Up</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="homeStyleSheet.css" />
  </head>

  <script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script>
  <body>
    <h1>Let's get you signed up!</h1>
    <br />
    <h3>Please enter required infomation below.</h3>
    <form action="choose_sites.html" method="post">
      Username:<br />
      <input type="text" name="username" required/><br />
      Email:<br />
      <input type="text" name="email" required/><br />
      Password:<br />
      <input type="password" name="password" value="passwrd" id="myInput"><br>
      <input type="checkbox" onclick="myFunction()">Show Password
      <br>
      <br>
      <input type="submit" value="Submit" />
      <!--<input type="reset" /> -->
    </form>
  </body>
</html>
