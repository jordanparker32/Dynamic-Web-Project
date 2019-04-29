<?php
    session_start();

    //initialize variables;
    $username = "";
    $email = "";

    $errors = array();

    //connect to the database
    $db = mysqli_connect("localhost","root","","login") or die("Failed to connect to the database.");

    //register users
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    //form validation
    if(empty($username)) array_push($errors, "Username is required");
    if(empty($email)) array_push($errors, "Email is required");
    if(empty($password)) array_push($errors, "Password is required");

    //check db for existing user with same username
    $user_check = "select * from user where username = '$username' or email = '$email' limit 1";
    $result = mysqli_query($db, $user_check);
    $user = mysqli_fetch_assoc($result);

    if($user){
        if($user['username'] === $username){array_push($errors, "Username already exists");}
        if($user['email'] === $email){array_push($errors, "This email has already been registered");}
    }

    //register if user no error
    if(count($errors) == 0){
        $password = md5($password); //this encrypts the password
        $query = "INSER INTO user (username,email,password) VALUES ('$username', '$email', '$password')";

        mysqli_query($db,$query);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";

        //redirect to install page
        header('location index.php');
    }
?>
