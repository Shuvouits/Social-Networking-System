<?php

include('db.php');

if(isset($_POST['submit']))
{
	$first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
  $c_password = $_POST['c_password'];
  $sex = $_POST['sex'];

	//image upload

	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "images/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}



	$get_data_check = "SELECT * FROM signup WHERE email = '$email' ";
	$run_data_check = mysqli_query($con,$get_data_check);
	$count = mysqli_num_rows($run_data_check);

	if($count == 0 && $password == $c_password){

		$get_data = "INSERT INTO signup (first_name,last_name,email,password,confirm_password,sex,image) VALUES ('$first_name','$last_name','$email','$password','$c_password','$sex','$image')";
	    $run_data = mysqli_query($con,$get_data);

	    echo "<div class = 'alert alert-success col-md-4 col-md-offset-4'>
		        <p class = 'text-center'>Hellow "; echo "<span style='color:red;text-transform:uppercase; font-weight:bold'>$first_name</span>"; echo " sign-Up successfully!!</p>
		      </div>
		      <br>
		      <br>
		      <br>


		        ";


	}else{
		echo "<div class = 'alert alert-danger col-md-4 col-md-offset-4' id='danger'>
		        <p class = 'text-center'>This email is already used!!</p>
		      </div>
		      <br>
		      <br>
		      <br>


		        ";
	}
	

	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Page</title>
	<meta charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
</head>
<body>
	<div class="container-fluid" style="background:#E3E6E7 ;">
    <br>
    <br>

        
        <div class="col-md-6 col-md-offset-3 jumbotron">

           <h2 class="text-center">
            Sign-Up Form 
            <span style="margin-left: 50px;">
              <a href="login.php" class="btn-lg btn-primary" style="text-decoration: none;">Login</a>
            </span>

           </h2>
         
          <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group required">
                    <label for="usr">First-Name:</label>
                    <input type="text" class="form-control" id="usr" name="first_name" placeholder="Enter Your First Name">
                </div>

                 <div class="form-group required">
                    <label for="usr">Last-Name:</label>
                    <input type="text" class="form-control" id="usr" name="last_name" placeholder="Enter Your last Name">
                </div>

                 <div class="form-group required">
                   <label for="pwd">E-mail</label>
                   <input type="email" class="form-control" id="pwd" name="email" placeholder="Enter your Email">
                </div>

                <div class="form-group required">
                   <label for="pwd">Password:</label>
                   <input type="password" class="form-control" id="pwd" name="password">
                </div>

                <div class="form-group required">
                   <label for="pwd">Confirm-Password:</label>
                   <input type="password" class="form-control" id="pwd" name="c_password" placeholder="Confirm password">
                </div>

                <div class="form-group required">
                   <label for="pwd">Sex</label>
                   <select class="form-control" id="pwd" name="sex">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                   </select>
                </div>

                <div class="form-group required">
                   <label for="image">Image</label>
                   <input type="file" class="form-control" id="image" name="image">
                </div>

                 <div class="form-group">
                   
                   <input type="submit" class=" form-control btn btn-primary"  name="submit">
                </div>

           </form>
         </div>
        

        
       



        
    </div>

    <script>
      $(document).ready(function(){

        $('#danger').delay(9000).hide();
      })
    </script>


</body>
</html>