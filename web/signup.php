<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			$user_id = random_num(6);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");

			die;
		}else
		{
			echo '<script>alert("Please Enter Valid Information")

		</script>';
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	body{
		margin-top: 50px;
	}
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: green;
		border: none;
		border-radius: 5px;
	}
	#button2{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: red;
		border: none;
		border-radius: 5px;
	}

	#box{
		border: 2px solid;
		border-radius: 15px;

		background-color: aquamarine;
		margin: auto;
		width: 400px;
		padding: 20px;
	}
	a{
		text-decoration: none;
		color: blue;
	}

	</style>

	<div id="box">
		
		<form method="post" name="f2" onsubmit="return matchpass()">
			<div style="font-size: 20px;margin: 10px;color: red; text-align: center;">Signup</div>
			UERNAME:<input id="text" type="text" name="user_name" placeholder="Create your Username" autocomplete="off"><br><br>
			PASSWORD:<input id="text" type="password" name="password" placeholder="Create Your Password" minlength="6"><br><br>
			CONFIRM PASSWORD:<input id="text" type="password" name="password2" placeholder="Enter Your Password Again" minlength="6"><br><br>

			<input id="button" type="submit" value="Signup"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
			<input type="reset" value="Reset" id="button2"><br><br><br>

			<center>Already Registered?<a href="login.php">Click to Login</a></center><br><br>
		</form>
	</div>
	<script type="text/javascript">
		function matchpass(){
	var pass1=document.f2.password.value;
	var pass2=document.f2.password2.value;
	if(pass1==pass2){
		return true;
	}else{
		alert('Password Must Be Same');
		return false;
	}

}
	</script>
</body>
</html>