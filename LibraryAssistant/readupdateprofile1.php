<?php
	session_start();
	$conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

	$unm=$_POST['t4'];
	$crs=$_POST['t5'];
	$reg_no=$_POST['t1'];
	$eid=$_POST['t7'];

	$s="update user set fname='$unm', email='$eid',lname='$crs' where reg_no='$reg_no'";
	$rs= mysqli_query($conn, $s);
	if($rs)
	{
		echo "<script>alert('Profile Updated.');</script>";
	}
	 else
		 echo "<script>alert('Some Error Occured.');</script>";
 	echo "<script>document.location.href='readhome.php'</script>";
 ?>