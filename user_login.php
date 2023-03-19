<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Toothsome | Login</title>
  <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet"><link rel="stylesheet" href="css/login.css">

</head>
<body>
  
<div id="bg"> </div>


<section class='login' id='login'>
  <div class='head'>
  <h1 class='company'>Toothsome | Login </h1>
  <br>
</div>


  <p class='msg'>Welcome back</p>
  
  <div class='form'>

    

  <form action="" method="POST" class="text-center">

  <input type="text" placeholder='Username' class="text" name="username"  required><br>
  <input type="password" placeholder='Password' class="password" name="password" required><br>

  <!-- <input type="submit" name="submit" value="submit" class="btn-login"> -->
  <button type="submit" name="submit"  value="submit" class="btn-login">login</button>
  <a href="#" class='forgot'>Forgot?</a>
<br>
<br><br>
  <div>
    New User? <a href="user_signup.php">  Sign Up</a>
  </div>
    </form>
  </div>
 

</section>


</body>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
        $username =  $_POST['username'];
        
        $pass = $_POST['password'];
        // $password = ($conn, $raw_password);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM user WHERE `username`='$username' AND `password`='$pass'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);
        
        if($count>0)
        {
          $row = mysqli_fetch_assoc($res);
          $id=$row['id'];
            //User AVailable and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it
    $_SESSION["user_id"] = $id;
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'index.php?id='.$id);
        // echo "success full";
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //REdirect to HOme Page/Dashboard
            header('location: login.php');
        // echo " not success ";
        }


    }

?>
