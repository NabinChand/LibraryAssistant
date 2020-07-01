<?php
	$conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $tmpid= $_POST['login'];
    $tmppwd= $_POST['password'];

    $sel= "select * from user where email='$tmpid' and password='$tmppwd'";
    
    $result= mysqli_query($conn, $sel);
    $row= mysqli_fetch_assoc($result);
    $count= mysqli_num_rows($result);

    if ($count==1) 
    {
        if(strcmp($tmpid, "admin@gmail.com")==0)
    	{
    		session_start();
            $_SESSION['ur']= $tmpid;
            echo "<script>document.location.href='adminindex.php'</script>";
    	}
    	else
    	{
    		session_start();
            $_SESSION['ur']= $tmpid;
            $_SESSION['name']= $row['fname']." ".$row['lname'];
            $_SESSION['regno']= $row['reg_no'];
            echo "<script>document.location.href='readhome.php'</script>";
    	}
    }
    else
    {
    	echo "<script>alert('Incorrect Username or Password');</script>";
    	echo "<script>document.location.href='login.html'</script>";
    }
?>