
<?php
	session_start();
	$conn = new mysqli("localhost", "root", "", "library");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

	include('header.html');
	$rid=$_SESSION['ur'];
	/*if (isset($_SESSION['msg']))
	        {
				echo "<h1>".$_SESSION['msg']."</h1></centeR>";
				unset($_SESSION['msg']);
			}
	else
	{*/
		$s="select * from user where email='$rid'";
		$result= mysqli_query($conn, $s);
		$row= mysqli_fetch_assoc($result);
		$unm=$_SESSION['name'];
		$eid=$row['email'];  
		$rno=$row['reg_no'];
?>
	<script language="JavaScript">
	function show()
	{
	 alert("Password updation Accepted");
	}
	</script>
	<div style="margin:0 auto; outline:none; padding:40px 15px; max-width:640px;">
					<form action="readchangepass1.php" method="post" class="j-forms" novalidate>
						<div class="header">
							<p>
						       <input type="hidden" name="t1" size="60" required="required" value="<?php echo $rno;?>"><?php echo $rno;?>&nbsp;&nbsp;
						       <input type="hidden" name="f2" size="60" required="required" value="<?php echo $unm;?>"><?php echo $unm;?></p>
						</div>
						<div class="content">
								<label>Email ID</label>
								</br>
								<input type="hidden" name="f1" size="60" required="required" value="<?php echo $eid;?>"><?php echo $eid;?>
								</br>
								<label>Password</label>
								<input type="password" id="password" name="t2" required="required" placeholder="current password...">
								&nbsp;<i class="fa fa-lock"></i>
								</br>
								<label>New Password</label>
								<input type="password" id="confirm_password" name="t3"  required="required" placeholder="New password...">
								&nbsp;<i class="fa fa-unlock"></i>
								</br>		
						</br>
					</div>
					<!-- end /.content -->
					<div style="background-color:#e8eaf6; border-top:1px solid #784212; padding:10px 25px;"><center>
						<button type="submit" name="s1" style="border:none; border-radius:3px; color:#fff; background:#784212; font:16px 'Open Sans',Helvetica,Arial,sans-serif; height:48px; margin:10px 0 10px 20px; outline:none; padding:0 25px;">Set</button>
					    <button type="reset" name="s2" style="border:none; border-radius:3px; color:#fff; background:#784212; font:16px 'Open Sans',Helvetica,Arial,sans-serif; height:48px; margin:10px 0 10px 20px; outline:none; padding:0 25px;">Reset</button></center>
					</div>
				</form>			
			</div>
<?php
	include('footer.html');
?>