<?php
	$conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

	$bid=$_POST['book_id'];
	$sel= "select b.bname, b.author, b.category, b. price, b.no_of_pages, b.qty, s.shelf_no, s.floor, s.row, s.col from book b, shelf s where b.bookid=s.bookid and b.bookid=$bid";

	$result= mysqli_query($conn, $sel);
    $count= mysqli_num_rows($result);
    if($count==1)
    {
    	$row= mysqli_fetch_assoc($result);
        include("adminheader.html");
        echo "<div style='margin:0 auto; outline:none; padding:40px 15px; max-width:640px;'>
            <form action='updbook.php' method='post' class='j-forms' novalidate>
                <div class='header'>
                    <p>Update Book</p>
                </div>
                <div class='content'>
                
                        <input type='text' id='bookid' name='bid' value='".$bid."' readonly>
                        &nbsp;<i class='fa fa-book fs-fw'></i>
                        <input type='text' id='bname' name='bname' value='".$row['bname']."'>
                        &nbsp;<i class='fa fa-book fa-fw'></i>
                        <input type='text' id='autname' name='autname' value='".$row['author']."'>
                        &nbsp;<i class='fa fa-users'></i>
                        <input type='text' id='category' name='category' value='".$row['category']."'>
                        &nbsp;<i class='fa fa-book fa-fw'></i>
                        <input type='text' id='price' name='price' value='".$row['price']."'>
                        &nbsp;<i class='fa fa-check-square-o'></i>
                        <input type='text' id='pages' name='pages' value='".$row['no_of_pages']."'>
                        &nbsp;<i class='fa fa-university'></i>
                        <input type='text' id='qty' name='qty' value='".$row['qty']."'>
                        &nbsp;<i class='fa fa-cart-arrow-down'></i>
                        <input type='text' id='shelf_no' name='shelf_no' value='".$row['shelf_no']."'>
                        &nbsp;<i class='fa fa-book fa-fw'></i>
                        <input type='text' id='floor' name='floor' value='".$row['floor']."'>
                        &nbsp;<i class='fa fa-check-square-o'></i>
                        <input type='text' id='row' name='row' value='".$row['row']."'>
                        &nbsp;<i class='fa fa-university'></i>
                        <input type='text' id='col' name='col' value='".$row['col']."'>
                        &nbsp;<i class='fa fa-cart-arrow-down'></i>
                </br>
            </br>

            </div>
            

            <div style='background-color:#e8eaf6; border-top:1px solid #784212; padding:10px 25px;'><center>
                <button type='submit' style='border:none; border-radius:3px; color:#fff; background:#784212; font:16px Open Sans,Helvetica,Arial,sans-serif; height:48px; margin:10px 0 10px 20px; outline:none; padding:0 25px;'>UPDATE</button></center>
            </div>
        </form>
    </div>";
    include("footer.html");
    }
    else
    {
    	echo "<script>alert('Book ID Not Found.');</script>";
        echo "<script>document.location.href='updatebook.html'</script>";
    }
?>