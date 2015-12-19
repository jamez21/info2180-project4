<?php
    /*connect to the database*/
	$db_connect = mysql_connect("localhost", "jamez21", "");
	$db_select = mysql_select_db("cheapomail");
	
	session_start();
	
	if(isset($_SESSION['id'])) {
		//Set current logged in user_id
		$cUser = $_SESSION['id'];
		/*Get data from form*/
		$recipient_ids = $_POST['recipient_ids'];
		$subject = $_POST['subject'];
		$body = $_POST['body'];
		$checkids = "/^[0-9 ]|;$/";

		if (!preg_match($checkids, $recipient_ids)) {
			echo "Please enter the recipient ids in the specified format.";
		} elseif (($body == NULL) || ($subject == NULL)) {
			echo "Please complete the required fields.";
		} else {
			$recipients = explode(";", $recipient_ids);
			for ($i = 0; $i < count($recipients); $i++) {
				str_replace(" ", "", $recipients[$i]);
				/*Query that will insert the message into the database*/
				$insert = "INSERT INTO Message (recipient_ids, subject, body, user_id) VALUES ('$recipients[$i]', '$subject', '$body', '$cUser')";
				/*Insert the message to the database*/
				mysql_query($insert);
			}
			echo "Message sent!";
		}
	
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cheapo Mail </title>
    </head>
    <body>
        <form action='compose.php' method='post'>
            <center>
                    <h1>Compose a new message</h1>
                        
                    <input type="text" id="recipient_ids" placeholder="Recipients" class="bxes"/><br><br>
                    <input type="text" id="sudject" placeholder="Subject" class="bxes"/><br><br>
                    <textarea cols="50" rows="8" id="body" placeholder="Your message..." style="resize:none"></textarea><br>
                    <button class="button">SEND</button>
                    
            </center>
        </form>

    </body>
</html>