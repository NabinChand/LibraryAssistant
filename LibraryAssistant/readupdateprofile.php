<?php
	session_start();
	include('readheader.html');
	$conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
	$rnm=$_SESSION['ur'];
	$rid=$_SESSION['regno'];
  	$s="select * from user where reg_no='$rid'";
    $rs= $result= mysqli_query($conn, $s);
    $row= mysqli_fetch_assoc($rs);
		$reg_no=$row['reg_no'];
		$unm=$row['fname'];
		$crs=$row['lname'];
		$eid=$row['email'];
?>
<script language="JavaScript">
function show()
{
 alert("Update succesfull");
}
</script>
<div style="margin:0 auto; outline:none; padding:40px 15px; max-width:640px;">
		<form action="readupdateprofile1.php" method="post" class="j-forms" novalidate>
			<div class="header">
				<p style="color:#fff;margin:0;padding:10px 5px;font-size:30px;text-transform:uppercase;">Your Profile</br></p>
				<p style="color:#fff;margin:0;padding:5px 5px;font-size:20px;text-transform:uppercase;">
					<input type="hidden" name="t1" required="required" value="<?php echo $reg_no;?>"><?php echo $reg_no;?></p>    
			</div>
			            <div class="content">
						 <table style="width:95%">
							<!--<tr>
							   <td><b>Your ID</b></td>
							   <td><input type="hidden" name="t2" value="<?php echo $rid?>">&nbsp;&nbsp;&nbsp;<b><?php echo $rid?></b>&nbsp;&nbsp;&nbsp;&nbsp;
								   <input type="hidden" name="t3" required="required" value="<?php echo $rnm;?>"><?php echo $rnm;?></td>
							</tr>-->
							<tr>
							   <td><b>First Name</b></td>
							   <td><input type="text" name="t4" value="<?php echo $unm?>" required="required"></td>
							</tr>
							<tr> 
								<td><b>Last Name</b></td>
								<td><input type="text" name="t5" value="<?php echo $crs;?>" required="required"></td>
							</tr>
							<tr> 
								<td><b>Email ID</b></td>
								<td><input type="text" name="t7" value="<?php echo $eid;?>" required="required"></td>
							</tr>
							</table>
						</div>
                    <div style="background-color:#e8eaf6; border-top:1px solid #784212; padding:10px 25px;">
					<center>
						<button type="submit" name="s1" style="border:none; border-radius:3px; color:#fff; background:#784212; font:16px 'Open Sans',Helvetica,Arial,sans-serif; height:48px; margin:10px 0 10px 20px; outline:none; padding:0 25px;">Update</button>
						<!--<button type="reset" name="s2" style="border:none; border-radius:3px; color:#fff; background:#784212; font:16px 'Open Sans',Helvetica,Arial,sans-serif; height:48px; margin:10px 0 10px 20px; outline:none; padding:0 25px;">Cancel</button>-->
					</center>
					</div>
		</form>			
</div>

<?php
include('footer.html');
?>					