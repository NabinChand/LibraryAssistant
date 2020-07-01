<?php
	$conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

	$bid= $_POST['bid'];
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

    $upd1= "update book set bname='$bname', author='$author', category='$category', price='$price', no_of_pages='$pages', qty='$qty' where bookid=$bid";
    $upd2= "update shelf set shelf_no=$shlfno, floor='$floor', row=$row, col=$col where bookid=$bid";
    if ($conn->query($upd1) === TRUE && $conn->query($upd2) === TRUE) 
    {
        echo "<script>alert('Book Details Updated.');</script>";
    } 
    else 
    {
        echo "<script>alert('Book Details Not Updated.');</script>";
    }
    $conn->close();
    echo "<script>document.location.href='updatebook.html'</script>";
?>