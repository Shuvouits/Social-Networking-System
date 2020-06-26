<?php

include('db.php');
session_start();

$current_id = $_SESSION['user_id'];
$current_name = $_SESSION['user_first_name'];
$current_image = $_SESSION['user_image'];


$post_id = $_GET['q'];

$get_data = "SELECT * FROM post WHERE id = $post_id ";
$run_data = mysqli_query($con,$get_data);
$row = mysqli_fetch_array($run_data);

$id = $row['id'];
$user_id = $row['user_id'];
$user_name = $row['user_name'];




$count = $row['count'];

$count = $count+1;

    $check = "SELECT * FROM like_post WHERE user_id =$current_id AND post_id = $id ";
    $run_check = mysqli_query($con,$check);
    $value = mysqli_num_rows($run_check);


  if($value == 0){

  	$update_post = "UPDATE post SET count = '$count' WHERE id = $id ";
    $run_update_data = mysqli_query($con,$update_post);

    $insert_like_post = "INSERT INTO like_post (user_id,user_name,post_id,image) VALUES ('$current_id','$current_name','$id','$current_image')";
    $run_insert_like_post = mysqli_query($con,$insert_like_post);


    header('location:welcome.php');

  } else{

  	echo "
  	     <div class='alert alert-success alert-dismissible container'>
            <a href='welcome.php' class='close'  aria-label='close'>&times;</a>
             <p class='text-center'>You are already like this comment <span style='color:red; font-weight:bold'>$current_name</span> !!!</p>
        </div>



  	";

  }


?>




<!DOCTYPE html>
<html>
<head>
	<title>Like Page</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

</body>
</html>