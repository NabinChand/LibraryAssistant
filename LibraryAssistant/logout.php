<?php
	session_start();
	session_destroy();
	echo "<script>window.open ('https://www.viralpatel.net/','mywindow','status=1,toolbar=0');</script>";
	header('location:login.html');
?>