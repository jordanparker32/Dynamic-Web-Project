
<?php include('server.php'); ?>
<?php
// define variables and set to empty values
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = test_input($_POST["username"]);
  $password = test_input($_POST["password"]);
    print($username);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<html>
  <head>
    <title>Digital Address Book</title>
  </head>
  <link rel="stylesheet" type="text/css" href="homeStyleSheet.css" />

  <body>
    <h1>Digital Address Book</h1>
    <!-- <img src="placeholder-circle.png" alt="placeholder circle image" /> -->
    <br />
    <form action="/choose_sites.html" method="post">
      Username:<br />
      <input type="text" name="username" required="required" placeholder="" autofocus required /><br />
      Password:<br />
      <input type="text" name="pass" required="required" placeholder="" required/><br /><br />
      <input type="submit" value="Submit" />
      <!--<input type="reset" /> -->
    </form>
    <?php
	if (isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($con, $_POST['user']);
			$password = mysqli_real_escape_string($con, $_POST['pass']);
			
			$query 		= mysqli_query($con, "SELECT * FROM users WHERE  password='$password' and username='$username'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
			if ($num_row > 0) 
				{			
					$_SESSION['user_id']=$row['user_id'];
					header('location:home.php');
					
				}
			else
				{
					echo 'Invalid Username and Password Combination';
				}
		}
  ?>
    <br />
    <br />
    <a href="sign_up_page.php">Click here to sign up!</a>
  </body>
</html>
