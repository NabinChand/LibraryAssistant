<?php
	$conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

	$issueid=$_POST['issue_id'];

	$sel= "select book_id, DATEDIFF(CURDATE(), return_date) from issued where issue_id=$issueid and return_status='issued'";
	$result= mysqli_query($conn, $sel);
    $row= mysqli_fetch_assoc($result);
    $count= mysqli_num_rows($result);
    if($count=1)
    {        
    	$bid= $row['book_id'];
    	if($row['DATEDIFF(CURDATE(), return_date)']>0)
    		$fine= $row['DATEDIFF(CURDATE(), return_date)']*5;
    	else
    		$fine=0;
    	$mod= "update book set qty= qty+1 where bookid= $bid";
    	$mod1= "update issued set return_status='returned' where issue_id=$issueid";
    	if ($conn->query($mod) === TRUE && $conn->query($mod1) === TRUE)
    	{
    		$ins= "insert into returnb values($issueid, CURDATE(), $fine)";
    		$run= mysqli_query($conn, $ins);
    		if($run)
    		{
    			echo "<script>alert('Return Successfull.  Fine to be collected is Rs '+$fine);</script>";
    		}
    	} 
    	else
    		echo "<script>alert('Some Error Occured.');</script>";
    }
    else
    {
        echo "<script>alert('ID not Found.');</script>";
    	
    }
    $conn->close();
    echo "<script>document.location.href='returnbook.html'</script>";
?>