<?php

include('db.php');
session_start();

$badge_id = $_GET['q'];

$get_data = "SELECT * FROM like_post WHERE post_id = $badge_id ";
$run_data = mysqli_query($con,$get_data);

$count = mysqli_num_rows($run_data);

if($count==0){

	echo "

	       <div class='container' style='background:#F3F5F5;padding-top:20px '>
	         <div class='alert alert-danger alert-dismissible fade in col-md-3 col-md-offset-4'>
                   <a href='welcome.php' class='close'  aria-label='close'>&times;</a>
                  <p class='text-center'>No people like this comment!!</p>
             </div>
             </div>

     ";

}else{

while($row = mysqli_fetch_array($run_data))
{
	$user_name = $row['user_name'];

	echo "
             <div class='container' style='background:#F3F5F5;padding-top:20px '>
	         <div class='alert alert-danger alert-dismissible fade in col-md-3 col-md-offset-4'>
                   <a href='welcome.php' class='close'  aria-label='close'>&times;</a>
                  <p class='text-center'>$user_name</p>
             </div>
             </div>
         


	";
}


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