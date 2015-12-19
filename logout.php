<?php
    echo '<script>alert("Logging out")</script>';
	session_destroy();
	echo '<script>location.replace("login.html");</script>';

?>