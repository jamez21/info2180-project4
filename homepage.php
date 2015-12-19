<?php
	/*connect to the databease*/
	$db_connect = mysql_connect("localhost", "jamez21", "");
	$db_select = mysql_select_db("cheapomail");
	
	session_start();
	
	if(isset($_SESSION["id"])){
		
		$cUser = $_SESSION["id"];
		$messages = mysql_query("SELECT * FROM Message WHERE recipient_ids=$cUser LIMIT 10");
		
		
	}else{
		echo "Please Login.";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cheapo Mail</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="header"><h1>Cheapo Mail</h1></div>
	<div id="menu">
		<h4><a href="homepage.php">Inbox</a></h4>
		<h4><a href="register.php">Register</a></h4>
		<h4><a href="logout.php">Logout</a></h4>
	</div>
	<div id="messages">
		<h2>Recent messages</h2>
		<table>
			<thead>
				<th>Sender</th>
				<th>Subject</th>
				<th>Body</th>
			</thead>
			<tbody>
				<?php
					while ($row = mysql_fetch_array($messages)) {
						?>
						<tr>
							<td><?php print $row['user_id']; ?></td>
							<td><?php print $row['subject']; ?></td>
							<td><?php print $row['body']; ?></td>
							<td><a href=<?php echo "message.php?id=" . $row['id']; ?>>Read</a></td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>