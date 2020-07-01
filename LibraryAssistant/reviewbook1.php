<?php
session_start();
include('readheader.html');
mysql_connect('localhost','root','');
mysql_select_db('library'); 
$rnm=$_SESSION['rnm'];
$rid=$_SESSION['rid'];
$bid=$_GET['b'];
$d=0;
 $sa="select * from issue where b_id='$bid'";
     $rsa=mysql_query($sa);
	 while($row=mysql_fetch_array($rsa))
	 {
		$date=$row[6];
		$ld=$row[7];
		$d=date_diff(date_create($date),date_create($ld));
		$d->format("%a");
	 }
  $s="select * from addbook where b_id='$bid'";
     $rs=mysql_query($s);
	 while($row=mysql_fetch_array($rs))
	 {
		$bid=$row[0];
		$bnm=$row[1];
		$anm=$row[2];
		$cat=$row[4];
	 }
?>
<div style="margin:0 auto; outline:none; padding:40px 15px; max-width:640px;">
		<form action="rviewbook.php" method="post" class="j-forms" novalidate>
			<div class="header">
				<p style="color:#fff;margin:0;padding:10px 5px;font-size:30px;text-transform:uppercase;">My Book</br></p>
				<p style="color:#fff;margin:0;padding:5px 5px;font-size:20px;text-transform:uppercase;">
					  
			</div>
			            <div class="content">
						 <table style="width:95%">
							<tr>
							   <td><b>Book ID</b></td>
							   <td><input type="hidden" name="t2" value="<?php echo $bid?>">&nbsp;&nbsp;&nbsp;<b><?php echo $bid?></b></td>
							</tr>
							<tr>
							   <td><b>Book Name</b></td>
							   <td><input type="text" name="t4" value="<?php echo $bnm?>" required="required"></td>
							</tr>
							<tr> 
								<td><b>Author Name</b></td>
								<td><input type="text" name="t5" value="<?php echo $anm;?>" required="required"></td>
							</tr>
							<tR> 
								<td><b>Category</b></td>
								<td><input type="text" name="t6" value="<?php echo $cat;?>" required="required"></td>
							</tr>
							<tr>
							<td><b>Remaining Days</b></td>
							<td><b>&nbsp;&nbsp;&nbsp;&nbsp;<?php $c=16; if(($d->format("%a"))<=$c){echo $d->format("%a");}else { echo "you cannot access ";} ?></b></td>
							</tr>
							</table>
						</div>
                    <div style="background-color:#e8eaf6; border-top:1px solid #784212; padding:10px 25px;">
					<center>
						<button type="submit" name="s2" style="border:none; border-radius:3px; color:#fff; background:#784212; font:16px 'Open Sans',Helvetica,Arial,sans-serif; height:48px; margin:10px 0 10px 20px; outline:none; padding:0 25px;">Back</button>
					</center>
					</div>
		</form>			
</div>

<?php
include('footer.html');
?>					