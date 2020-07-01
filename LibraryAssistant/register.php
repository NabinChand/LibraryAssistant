<?php
	$conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $regno=$_POST['registration_no'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$course=$_POST['course'];
	$gender=$_POST['gender'];
	$question=$_POST['question'];
	$answer=$_POST['answer'];

	$ins= "insert into user values('$regno','$email','$pass','$fname', '$lname','$course','$gender','$question','$answer')";
    
    $run= mysqli_query($conn, $ins);
    if($run)
    {
        echo "<script>alert('Registration Successful.');</script>";
        echo "<script>document.location.href='login.html'</script>";
    }
    else
    {
    	echo "<script>alert('Registeration Failed.');</script>";
        echo "<script>document.location.href='register.html'</script>";
    }

$conn->close();
?>