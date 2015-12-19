<?php
	/*connect to the database*/
	$db_connect = mysql_connect("localhost", "jamez21", "");
	$db_select = mysql_select_db("cheapomail");
	
	session_start();
	
	$username = $_REQUEST["uname"];
	$password = $_REQUEST["pass"];
	
	$query = mysql_query("SELECT * FROM User");
	
	while($row = mysql_fetch_array($query)){
		if ($username == $row["username"] && $password == $row["password"]){
			$_SESSION["id"] = $row["id"];
			echo ('Login Successful');
			echo('<script>location.replace("homepage.php")</script>');
		}else{
			echo("Login Failed");
		}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cheapo Mail</title>
        <link href="cheapomail.css" type="text/css" rel="stylesheet" />
    </head>
    
    <body>
        <center>
            
        <div id="header">
            <h1>Cheapo Mail</h1>
        </div>
        
        <form id="login" action="login.php" method="post">
            <h2>Login</h2>
            <input id="uname" type="text" placeholder="Username" name="username"/><br/><br/>
            <input id="pass" type="text" placeholder="Password" name="password"/><br/><br/>
            <input type="submit" value="Submit"/>
        </form>
        
        </center>

    </body>
</html>