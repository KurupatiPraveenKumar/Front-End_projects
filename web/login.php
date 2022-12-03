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

			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo '<script>alert("wrong username or password!")</script>';
		}else
		{
			echo '<script>alert("username or password Should Not Be Empty")</script>';
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: red; text-align: center;">Login</div>

			USERNAME:<input id="text" type="text" name="user_name" placeholder="Enter Your Userame" autocomplete="off"><br><br>
			PASSWORD:<input id="text" type="password" name="password" placeholder="Enter Your Password"><br><br>

			<input id="button" type="submit" value="Login"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
			<input type="reset" value="Reset" id="button2"><br><br><br>

			<center>Don't Have an Account?<a href="signup.php">Signup Now</a></center><br><br>
		</form>
	</div>
</body>
</html>