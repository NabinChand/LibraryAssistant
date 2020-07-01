<?php
	session_start();
	$rnm= $_SESSION['name'];
	include('readheader.html');
	echo "</br></br></br></br></br></br>
		<center><font face='Arabic Typesetting' size='12'><b>--Welcome! $rnm--</b></font></center>
		</br></br></br>";
	include('footer.html');
?>