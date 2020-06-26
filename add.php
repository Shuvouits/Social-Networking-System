<?php

include('db.php');
$user_id = $_GET['q'];

$get_data = "SELECT * FROM user_information  WHERE user_id = $user_id ";
$run_data = mysqli_query($con,$get_data);

$count = mysqli_num_rows($run_data);


if($count == 0){

	//user information data Insert

  if(isset($_POST['submit'])){
	$user_school = $_POST['user_school'];
	$user_address = $_POST['user_address'];
	$user_hobby = $_POST['user_hobby'];
	$user_id = $_POST['user_id'];

	$insert_data = "INSERT INTO user_information (user_school,user_address,user_hobby,user_id) VALUES ('$user_school','$user_address','$user_hobby','$user_id') ";
	$run_data = mysqli_query($con,$insert_data);

	header('location:welcome.php');

	

  }




}else{

	echo "

	<div class='container'>

	<div class='alert alert-danger alert-dismissible'>
         <a href='welcome.php'class='close'  aria-label='close'>&times;</a>
         <a href='welcome.php'>
         <span class='text-center'>
         <h5 style='text-center;font-weight:bold'>You are already insert your data now you can only edit</h5>
        </span>
        </a>

    </div>

    </div>


	";

}



?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Page</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

</body>
</html>