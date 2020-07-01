<?php
	$conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

	$bname=$_POST['bname'];
	$author=$_POST['autname'];
	$category=$_POST['category'];
	$price=$_POST['price'];
	$pages=$_POST['pages'];
    $qty= $_POST['qty'];
	$shlfno=$_POST['shelf_no'];
    $floor=$_POST['floor'];
    $row=$_POST['row'];
    $col=$_POST['col'];

	$ins= "insert into book(bname, author, category, price, no_of_pages, qty) values ('$bname', '$author','$category','$price','$pages','$qty')";
    
    $run= mysqli_query($conn, $ins);
    
    if($run)
    {
        $sel= "select bookid from book where bname='$bname'";
        $result= mysqli_query($conn, $sel);
        $rows= mysqli_fetch_assoc($result);
        $bid= $rows['bookid'];
        $inr= "insert into shelf values($shlfno, '$floor', $row, $col, $bid)";
        $r= mysqli_query($conn, $inr);
        if($r)
        {
            echo "<script>alert('Book Details Added.');</script>";
            echo "<script>document.location.href='addbook.html'</script>";
        }
        else
            echo "<script>alert('Some Error Occured.');</script>";
    }
    else
    {
    	echo "<script>alert('Some Error Occured.');</script>";
    }
	$conn->close();
    echo "<script>document.location.href='addbook.html'</script>";
?>