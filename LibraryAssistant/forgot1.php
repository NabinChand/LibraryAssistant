<?php
	$conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

	include('header.html');
	$tmpid= $_POST['email'];

    $sel= "select * from user where email='$tmpid'";
    
    $result= mysqli_query($conn, $sel);
    $row= mysqli_fetch_assoc($result);
    $count= mysqli_num_rows($result);
    if ($count==1) 
    {
    		session_start();
            $_SESSION['ur']= $tmpid;
            $_SESSION['name']= $row['fname']." ".$row['lname'];
            echo "<script>document.location.href='validate.php'</script>";
    }
    else
    {
    	echo "<script>alert('Incorrect Username or Password');</script>";
    	echo "<script>document.location.href='login.html'</script>";
    }

	include('footer.html');
?>