<?php
	session_start();
	include('readheader.html');
	$conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

	$rid=$_SESSION['regno'];
	$rnm=$_SESSION['ur'];
	$s="select * from issued where reg_no='$rid' and return_status='issued'";
	$rs= mysqli_query($conn, $s);
	$count= mysqli_num_rows($rs);
	if($count>0)
	{
		 echo "<br><br><br><center><table border ='2'  align='center'>
		        <tr>
		        	<th  align='center'><b>Issue ID</B></th>
		        	<th align='center'><b>Book ID</B></th>
					<th align='center'><b>Issue Date</b></th>
					<th align='center'><b>Return Date</b></th>
				</tr>";
		 while($row= mysqli_fetch_assoc($rs))
		 { 
			  echo"<tr>
			  		<td height='30' align='center'>".$row['issue_id']."</td>
			        <td height='30' align='center'>".$row['book_id']."</td>
			        <td height='30' align='center'>".$row['issue_date']."</td>
			        <td height='30' align='center'>".$row['return_date']."</td>";
			  echo "</tr>";
		 }
		echo "</table></center>";
	}
	else
		echo "<script>alert('No active books.');</script>";
	echo "<br><br><br><br><br><br><br><br>";
	include('footer.html');
?>