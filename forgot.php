<?php

include('db.php');
session_start();

if(isset($_POST['submit'])){
	$email = $_POST['email'];

	$get_data = "SELECT * FROM signup WHERE email = '$email' ";
	$run_data=mysqli_query($con,$get_data);

	$row = mysqli_fetch_array($run_data);
	$password = $row['password'];

	echo "

	    <div class='container'>
	        <div class='alert alert-success alert-dismissible fade in'>
               <a href='login.php' class='close' aria-label='close'>&times;</a>
               <p class='text-center' style='font-weight:bold'>Your password=$password</p>
            </div>

	    </div>




	";
}




?>







<!DOCTYPE html>
<html>
<head>
	<title>Forgot page</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container jumbotron">
		<h5 class="text-center" style="font-weight: bold">Forgot Password??</h5>
		<form method="POST">
			<div class="form-group col-md-6 col-md-offset-3">
				<label>Email</label>
				<input type="Email" name="email" required="" class="form-control" placeholder="Type your email">
				<br>
				<input type="submit" name="submit" class="form-control btn-sm btn-primary">
			</div>
		</form>
		
	</div>

</body>
</html>