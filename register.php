<?php
	/*connect to the database*/
	$db_connect = mysql_connect("localhost", "jamez21", "");
	$db_select = mysql_select_db("cheapomail");
	
	session_start();
	$insert_qstring = "INSERT INTO users 
			(
				firstname,
				lastname,
				password,
				username
			) 
			VALUES
			(
				'$_POST[fname]',
				'$_POST[lname]',
				'$_POST[pass]',
				'$_POST[username]')";
	$register_query = mysql_query($insert_qstring, $connect);
	if(!$register_query)
	{
		die('Query error'.mysql_error($connect));
	}
	else
	{
		echo"<script>alert('Registration complete')</script>";
		echo "<script>location.replace('homepage.php')</script>";
	}
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Cheapo Mail</title>
 		<link rel="stylesheet" type="text/css" href="register.css" />
 		<script type="text/javascript" src="register.js"></script>
	</head>

	<body>

		<div>

			<div id="header">
				<h1>CheapoMail</h1>
			</div>

			<div id="menu">
				<h4><a href="homepage.php">Inbox</a></h4>
				<h4><a href="register.php">Register</a></h4>
				<h4><a href="logout.php">Logout</a></h4>
			</div>

			<div id="content">
				<form action='register.php' method='post'> 
				Register<br> 
				<label>First Name</label> 
				<input type='text' name='fname'><br /><br />
				<label>Last Name</label>
				<input type='text' name='lname'><br /><br />
				<label>Password </label>
				<input type='password' name='pass'><br /><br />
				<label>Username</label>
				<input type='text' name='username'><br />
				<input type=submit value='Register'></input>
				</form>

			</div>


		</div>
	</body>
</html>
	