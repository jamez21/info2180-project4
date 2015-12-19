<?php
	/*connect to the database*/
	$db_connect = mysql_connect("localhost", "jamez21", "");
	$db_select = mysql_select_db("cheapomail");
	
	session_start();
	
	if (isset($_SESSION['id'])) {
		//set current user id
		$cUser = $_SESSION['id'];
		//set current message id
		$message_id = $_GET['id'];
		
		$read = "INSERT INTO Message_read (message_id, reader_id) VALUES ('$message_id', '$cUser')";
		mysql_query($read);

		//get message contents
		$get_message = "SELECT * FROM Message WHERE id=$message_id";
	} else {
		echo "Please login to continue.";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Cheapo Mail</title>
	</head>
	<body>
		<?php
			$row = mysql_fetch_array(mysql_query($get_message));
		?>
		<div class="subject"><?php echo $row['subject']; ?></div>
		<div class="body"><?php echo $row['body']; ?></div>

		<a href="compose.php">Reply</a>
	</body>
</html>