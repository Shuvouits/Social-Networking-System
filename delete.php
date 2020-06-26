<?php
 include('db.php');

 session_start();

 $id = $_GET['q'];
 $current_id = $_SESSION['user_id'];

 $get_data = "SELECT * FROM post WHERE id = $id AND user_id=$current_id";
 $get_result = mysqli_query($con,$get_data);
 $count = mysqli_num_rows($get_result);

 if($count==1){
 	$delete = "DELETE FROM post WHERE id=$id  AND user_id=$current_id ";
    $run_data = mysqli_query($con,$delete);
    header('location:welcome.php');

 }else{

 	echo "

	       <div class='container' style='background:#F3F5F5;padding-top:20px '>
	         <div class='alert alert-danger alert-dismissible fade in col-md-3 col-md-offset-4'>
                   <a href='welcome.php' class='close'  aria-label='close'>&times;</a>
                  <p class='text-center' style='font-weight:bold'>Sorry!! You aren't author from this post</p>
             </div>
             </div>

     ";

 }


?>


<!DOCTYPE html>
<html>
<head>
	<title>Badge page</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

</body>
</html>