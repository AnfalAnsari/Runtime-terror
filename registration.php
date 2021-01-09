<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $sql_u = "SELECT * FROM users WHERE username='$username'";
  	    $sql_e = "SELECT * FROM users WHERE email='$email'";
  	    $res_u = mysqli_query($con, $sql_u);
  	    $res_e = mysqli_query($con, $sql_e);

        $result = false;
        $error= "error";
        $email_error = "";
        $name_error = "";
        

  	    if (mysqli_num_rows($res_u) > 0) {
  	      $name_error = "Sorry... username already taken"; 	
          
  	    }else if(mysqli_num_rows($res_e) > 0){
  	      $email_error = "Sorry... email already taken"; 	
          
  	    }else{
               $query = "insert into `users` (username, password, email, create_datetime)
                     values ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
               $result = mysqli_query($con, $query);
               
  	    }
        /* $query    = "insert into `users` (username, password, email, create_datetime)
                     values ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);*/
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
              if(!empty($email_error)&&empty($name_error))
                  {
                   $error = $email_error;   
                   
				  }
              if(empty($email_error)&&!empty($name_error))
                  {
                   $error = $name_error;        
				  }

              if(!empty($email_error)&&!empty($name_error))
                  {
                   $error = "sorry... eamil address and username already exist";        
				  }

            echo "<div class='form'>
                 
                  <h3>$error</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
    </form>
<?php
    }
?>
</body>
</html>
