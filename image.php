<?php

session_start();

include('db.php');



if(isset($_POST['submit'])){

	$user_id = $_GET['q'];

	 //Upload image

    $msg = "";
	$image = $_FILES['image']['name'];
	$target = "images/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

  	$insert_data = "INSERT INTO user_image (user_id,image) VALUES ('$user_id','$image')";
    $run_data = mysqli_query($con,$insert_data);

   

}



header('location:welcome.php');

?>