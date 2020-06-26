<?php

include('db.php');

session_start();

if(isset($_POST['submit']))
{
  $email = $_POST['email'];
  $password = $_POST['password'];

  $_SESSION['email'] = $email;

  $get_data = "SELECT * FROM signup WHERE email='$email' AND password = '$password' ";
  $run_data =  mysqli_query($con,$get_data);

  $count = mysqli_num_rows($run_data);

  if($count ==1 ){
    header('location:welcome.php');
  }else{
    echo "<div class='alert alert-danger col-md-4 col-md-offset-4'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
             <p class='text-center'>Your Email or Password is not correct</p>

           </div> <br><br><br><br>";
  }
}


?>



<!DOCTYPE html>
<html>
<head>

  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
  <div class="container" style="background:#E3E6E7 ;">

    <div style="margin-bottom: 110px;">
      
    </div>

    

        <div class="col-md-6 col-md-offset-3 jumbotron" style="margin-bottom: 120px;">

          <h5 class="text-center" style="font-weight: bold">If you aren't Sign_Up please go to Sign-Up page</h5>
     <h2 class="text-center">
            Login Form
            <span style="margin-left: 50px;">
              <a href="index.php" class="btn-lg btn-primary" style="text-decoration: none;">Sign-Up</a>
            </span>

        </h2> 



          <form action="" method="POST" enctype="multipart/form-data">

             <div class="form-group required">
                    <label for="usr">Email:</label>
                    <input type="email" class="form-control" id="usr" name="email">
              </div>

              <div class="form-group required">
                    <label for="usr">Password:</label>
                    <input type="password" class="form-control" id="usr" name="password">
              </div>

               <div class="form-group">
                   
                   <input type="submit" class=" form-control btn btn-primary"  name="submit">
                </div>


          </form>
          <br>
          
          <p class="text-center" style="font-size:10px; font-weight:bold">Forgot your password?? <a href="forgot.php">click here</a></p>
        </div>
  </div>

</body>
</html>