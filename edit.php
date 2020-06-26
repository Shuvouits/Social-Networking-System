<?php

session_start();
include('db.php');

$user_id = $_GET['q'];

//Edit data

if(isset($_POST['edit'])){
	$edit_school = $_POST['edit_school'];
	$edit_address = $_POST['edit_address'];
	$edit_hobby = $_POST['edit_hobby'];

	$edit_data = "UPDATE user_information SET user_school='$edit_school', user_address = '$edit_address', user_hobby = '$edit_hobby' WHERE user_id = $user_id ";

	$run_data = mysqli_query($con,$edit_data);
}

header('location:welcome.php');



?>
