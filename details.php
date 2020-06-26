<?php

include('db.php');

session_start();

$x= 0;


//$email = $_SESSION['email'];
//echo $email;

$email = $_SESSION['email'];



if(!isset($_SESSION['email'])){
	header('location:login.php');

} 

$get_data_sender = "SELECT * FROM signup WHERE email ='$email' ";
$run_data_sender = mysqli_query($con,$get_data_sender);

$row = mysqli_fetch_array($run_data_sender);
$sender_image = $row['image'];
$sender_name = $row['name'];
$sender_id = $row['id'];

//chatting details


//echo $sender_id;
$recevier_id = $_SESSION['q'];

//echo $recevier_id;

//$r_insert_data = "SELECT * FROM recevier_data WHERE ";





?>


<!DOCTYPE html>
<html>
<head>
	<title>Details page</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<!---start all user section---->

	<div class="container">
		<br>

		<a href="logout.php" class="btn-lg btn-primary text-left" style="text-decoration: none; right:20px; position: fixed;">Log-Out</a>
		<br>
		<h3 class="text-center" style="font-weight: bold">Welcome to Chatting System</h3>
		<div class="col-md-4" style="border-right: 1px solid black;">
			<h3 class="" style="font-weight: bold;">All user List</h3>
			<?php

			$get_data_all_user = "SELECT * FROM signup";
			$run_data_all_user = mysqli_query($con,$get_data_all_user);

			while($row = mysqli_fetch_array($run_data_all_user))
			{
				$all_user_image = $row['image'];
				$all_user_name = $row['name'];
				$user_id = $row['id'];
				echo " <a href='chat.php?q=$user_id' style='text-decoration:none;'><img src='images/$all_user_image' style='height: 50px; width: 50px; border-radius: 100%; border: 1px solid black;'>
				 <span style='margin-left:30px; font-weight:bold;'> $all_user_name</span></a>
			";

			echo "<br>";
			echo "<br>";

			}

			?>

		</div>

		<br>
		<br>

		<!---start sender area----->

		<div class="col-md-4" style="border-right: 1px solid black;">
			<h4 class="text-center" style="font-weight: bold">Sender Area</h4>
			<?php
			    

                echo " <img src='images/$sender_image' style='height: 100px; width: 100px; border-radius: 100%; border: 1px solid black;'>

                    <span style = 'font-weight:bold; margin-left:10px'>$sender_name</span>
			       <br>
			       <br>
			       <br>


                ";


			?>
			

			<div class="chatbox">
				<p>
					 <?php
					

					 

					 $get_recevier_data = "SELECT * FROM recevier_data WHERE sender_id = $recevier_id "; 
					 $run_recevier_data = mysqli_query($con,$get_recevier_data);

					 while($row = mysqli_fetch_array($run_recevier_data)){
					 	$recevier_data = $row['recevier_data'];
					 	$date = $row['date'];
					 	$id = $row['id'];
					 	echo "<p class='alert alert-success'> $recevier_data 
					 	         <span style='color:red;font-weight:bold; margin-left:30px'>$date</span>
					 	        <span style='margin-left:10px'> 
					 	             <a href='delete_r.php?q=$id'>
					 	               <i class='fa fa-times' aria-hidden='true'></i>
					 	            </a>
					 	         </span>
					 	       </p>";
					 	echo "<br>";
					 }
					  

					  ?> 
				</p>
			</div>  

			
            <?php
            echo "
			<form action='sender_data.php?q=$sender_id' method='POST'>

				<div class='form-group'>
				     <input type='text' name='sender_data' class='form-control'>
			    </div>

			    <div class='form-group'>
				     <input type='hidden' name='sender_id' class='form-control' value='$sender_id'>
			    </div>

			     <div class='form-group'>
				     <input type='hidden' name='recevier_id' class='form-control' value='$recevier_id'>
			    </div>

			     

			    <div class='form-group'>
				     <input type='submit' name='submit' class='form-control btn btn-primary'>
			    </div>
				
			</form>
			";
			?>

			

		
	</div>

	<!---Start Recevier Area--->


	<div class="col-md-4" style="border-right: 1px solid black;">
		<h4 class="text-center" style="font-weight: bold">Recevier Area</h4>

		
		<div id="recevier">
		<?php

		 
		   $recevier_id = $_SESSION['q'];
		   //echo $recevier_data;

		   $get_data_recevier = "SELECT * FROM signup WHERE id =$recevier_id ";
		   $run_data_recevier = mysqli_query($con,$get_data_recevier);

		   $row = mysqli_fetch_array($run_data_recevier);
		   $recevier_image = $row['image'];
		   $recevier_name = $row['name'];

		    echo " <img src='images/$recevier_image' style='height: 100px; width: 100px; border-radius: 100%; border: 1px solid black;'>

                    <span style = 'font-weight:bold; margin-left:10px'>$recevier_name</span>
			       <br>
			       <br>
			       <br>


                ";

		?>

		<?php
		
		 $insert_r_data = "SELECT * FROM sender_data WHERE recevier_id = $recevier_id ";
		 $run_data = mysqli_query($con,$insert_r_data);

		 while($row = mysqli_fetch_array($run_data)){
		 	$data = $row['sender_data'];
		 	$date = $row['date'];
		 	$sender_id = $row['sender_id'];
		 	$id = $row['id'];

		 	echo "<p class='alert alert-success'>
		 	        $data 
		 	        <span style='font-weight:bold;color:red;margin-left:50px;'>$date</span>

		 	        <span style='margin-left:10px'> 
					 	             <a href='delete_s.php?q=$id'>
					 	               <i class='fa fa-times' aria-hidden='true'></i>
					 	            </a>
					 	         </span>

		 	      </p>";
		 }


		?>

		 <?php
            echo "
			<form action='recevier_data.php?q=$recevier_id' method='POST'>

				<div class='form-group'>
				     <input type='text' name='recevier_data' class='form-control'>
			    </div>

			    <div class='form-group'>
				     <input type='hidden' name='recevier_id' class='form-control' value='$sender_id'>
			    </div>

			     <div class='form-group'>
				     <input type='hidden' name='sender_id' class='form-control' value='$recevier_id'>
			    </div>

			     

			    <div class='form-group'>
				     <input type='submit' name='submit' class='form-control btn btn-primary'>
			    </div>
				
			</form>
			";
			?>

	
	  </div>
	</div>


	
	

</body>
</html>