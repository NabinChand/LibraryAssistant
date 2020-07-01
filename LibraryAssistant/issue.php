<?php
	$conn = new mysqli("localhost", "root", "", "library");
	if ($conn->connect_error) 
	{
	   	die("Connection failed: " . $conn->connect_error);
	}

	$regno= $_POST['regno'];
	$book= $_POST['bookname'];
	$date= $_POST['date'];
	$sel= "select bookid, qty from book where bname='$book'";
    
    $result= mysqli_query($conn, $sel);
    $row= mysqli_fetch_assoc($result);

    $bid= $row['bookid'];

    if($row['qty']>0)
    {    
        $mod= "update book set qty= qty-1 where bookid=$bid";
        if($conn->query($mod)===True)
        {
            $ins= "insert into issued(book_id, reg_no, issue_date, return_date, return_status) values ('$bid', '$regno','$date',DATE_ADD('$date', INTERVAL 15 DAY),'issued')";
        
            $run= mysqli_query($conn, $ins);
            if($run)
            {
                $iss= "select issue_id from issued where book_id='$bid' and reg_no='$regno' and issue_date=CURDATE()";
                $r= mysqli_query($conn, $iss);
                $ro= mysqli_fetch_assoc($r);
                echo "<script>alert('Book Issued Successfully. Issue ID is ".$ro['issue_id']."');</script>";
            }
        }
        else
        {
        	echo "<script>alert('Some Error Occured.');</script>";
        }
    }
    else
        echo "<script>alert('Book Quantity is 0.');</script>";
    $conn->close();
    echo "<script>document.location.href='issuebook.php'</script>";
?>