<?php
	$conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

	$name=$_POST['name'];
	$email=$_POST['email'];
	$sub=$_POST['subject'];
	$msg=$_POST['message'];

	$ins= "insert into contact_form values('$name', '$email', '$sub', '$msg', CURDATE())";
    
    $run= mysqli_query($conn, $ins);
    
    if($run)
    {
        echo "<script>alert('Message Sent Successfully.');</script>";
    }
    else
    {
    	echo "<script>alert('Some Error Occured.');</script>";
    }
    echo "<script>document.location.href='contact.html'</script>";

	$conn->close();
?>