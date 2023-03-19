
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Toothsome | User Signup</title>
  <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet"><link rel="stylesheet" href="css/login.css">

</head>
<body>
<div id="bg"> </div>

<?php include('config/constants.php'); ?>



<section class='login' id='login'>
  <div class='head'>
  <h1 class='company'>Toothsome | Signup</h1>
  </div>
  <?php 
 
?>
  <p class='msg'>Enter the details</p>
  
  <div class='form'>
  <form action="" method="POST">

  <input type="text" placeholder='Username' class="text" name='username' required><br><br>
  <input type="text" placeholder='Fullname' class="text" name='fullname' required><br><br>
  <input type="text" placeholder='Email' class="text" name='email' required><br><br>
  <input type="text" placeholder='Contact' class="text" name='contact' required><br><br>
  <input type="text" placeholder='Address' class="text" name='address' required><br>
  <input type="password" placeholder='Password' class="password" name="password" required><br><br>
  <!-- <input type="text" placeholder='address' class="address" required><br><br> -->

  <input type="submit" name="submit" value="Sign up" class="btn-login">
<br>
<br><br>
    </form>
  </div>
 

</section>


<?php 
    
    if(isset($_POST['submit']))
    {
        // Button Clicked
        //1. Get the Data from form
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $password = $_POST['password'];  //Password Encryption with MD5

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO user SET 
            fullname='$fullname',
            username='$username',
            email='$email',
            contact='$contact',
            address='$address',
            password='$password'
        ";
 
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='text-center text-white'>Signup Successfull! please login using the details.</div>";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'user_login.php');
        }
        else
        {
            //FAiled to Insert DAta
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error text-center'>Failed to Sign up, please try again.</div>";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'user/user_signup.php');
        }

    }
    
?>
</body>
</html>

