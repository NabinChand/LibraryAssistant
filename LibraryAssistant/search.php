<?php
	$conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $search=$_POST['search'];

    $res= "select b.bookid, b.bname, b.author, b.qty, s.shelf_no, s.floor, s.row, s.col from book b, shelf s where s.bookid=b.bookid and b.bname LIKE '%$search%'";
    $result= mysqli_query($conn, $res);
    $count= mysqli_num_rows($result);
    if($count>0)
    {
    	include("header.html");
        echo "<center>";
    	echo "<br><br><h1>Book Details</h1>";
    	echo "<centeR><table border ='2' style='width:30%' align='center'>";
    	echo "<tr>";
    		echo "<th>Book ID</th>";
    		echo "<th>Book Name</th>";
    		echo "<th>Author</th>";
    		echo "<th>Quantity</th>";
    		echo "<th>Floor</th>";
    		echo "<th>Shelf No.</th>";
    		echo "<th>Row</th>";
    		echo "<th>Column</th>";
    	echo "</tr>";
    	while($row= mysqli_fetch_assoc($result))
		{
			echo "<tr>";
				echo "<td>".$row['bookid']."</td>";
				echo "<td>".$row['bname']."</td>";
				echo "<td>".$row['author']."</td>";
				echo "<td>".$row['qty']."</td>";
				echo "<td>".$row['floor']."</td>";
				echo "<td>".$row['shelf_no']."</td>";
				echo "<td>".$row['row']."</td>";
				echo "<td>".$row['col']."</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "</center>";
    }
    else
    {
    	echo "<script>alert('No book found.');</script>";
    	echo "<script>document.location.href='main page.html'</script>";
    }
?>