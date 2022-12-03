<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Content</title>
	<style type="text/css">
		
		h1{
			color: red;
			margin-left: 20px;
			text-decoration: 2px underline blue;
		}
		h3{
			margin-left: 100px;
			color: green;
		}
		h2{
			color: orange;
		}
		#button3{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: green;
		border: none;
		text-decoration: none;
		border-radius: 5px;
	}
	</style>
</head>
<body>

	
	<center><h2>Hello <?php echo $user_data['user_name']; ?> ,You Have Logged In Successfully!</h2><hr><hr></center>
	<center><h1>This Project Is Developed BY :-</h1>
          
           <h3>-KURUPATI PRAVEEN KUMAR</h3></center>
           


	<br><hr><hr><br><br>
	<center><a href="logout.php" id="button3">Logout</a></center>
</body>
</html>