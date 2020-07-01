<?php
	session_start();
	$conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

	$t1=$_POST['t1'];
	$t2=$_POST['t2'];
	$t3=$_POST['t3'];
	$s="update user set password='$t3' where reg_no='$t1'";
	$rs= mysqli_query($conn, $s);
	if($rs)
	{
		echo "<script>alert('Password Changed Successfully.');</script>";
	}
	else
		echo "<script>alert('There Seems Some Problem Changing Your Password.');</script>;";
	$conn->close();
	echo "<script>document.location.href='login.html'</script>";
?>