<?php
include "chksession.php";
include "dbconfig.php";
include "header.html";

//echo $sql;
$id_pc=$_GET["id_pc"];

$sql="select * from `ddpost`.`parcel` where id_pc='$id_pc'";
	$res=mysqli_query($connect,$sql);
	$db=mysqli_fetch_array($res);

$date_array=explode("-",$db[datepick_pc]);
	$y=$date_array[0]+543;
	$m=$date_array[1];
	$d=$date_array[2];


	

$datepick_pc="$d/$m/$y";
?>

<h3>แก้ไขข้อมูลพัสดุ</h3>
<form action="save_editparcel.php" method="post" name="formnewparcel">
<table>

	<tr><td>วันที่ : </td><td><input type="text" size="10" id="datepicker-th" name="datepick_pc" value="<?php echo $datepick_pc; ?>" /></td>
	<tr><td>ชื่อผู้ส่ง : </td><td><input type="text" name="sendername_pc" value="<?php echo $db[sendername_pc]; ?>" /></td>
	<tr><td>ที่อยู่ผู้ส่ง : </td><td><textarea name="senderadd_pc"><?php echo $db[senderadd_pc]; ?></textarea></td>
	<tr><td>ชื่อผู้รับ : </td><td><input type="text" name="recievername_pc" value="<?php echo $db[recievername_pc]; ?>" /></td>
	<tr><td>หน่วยงาน : </td><td><input type="text" name="workplace_pc" value="<?php echo $db[workplace_pc]; ?>" /></td>
	<tr><td>สำนัก : </td><td>


<select name="department_pc">
		<option value="">กรุณาเลือกสำนัก</option>
<?php
			$sql1="select * from `ddpost`.`department`";
			$res1=mysqli_query($connect,$sql1);
			$num=mysqli_num_rows($res1);
			for ($i=1;$i<=$num;$i++) {
				$db1=mysqli_fetch_array($res1);
				if ($db1[id_dep]==$db[department_pc]) {
					$select="selected";
				}else{
					$select="";
	}
	echo "<option value=$db1[id_dep] $select>$db1[name_dep]</option>";


}
?>
		</select>





		</td></tr>
		<tr><td>เก็บเงิน : </td><td>
<input type="text" name="charge_pc" size="5" value="<?php echo $db[charge_pc]; ?>"> บาท
</td></tr>
	<tr><td>บาร์โค้ด : </td><td><input type="text" name="barcode_pc" value="<?php echo $db[barcode_pc]; ?>"></td>
	<input type="hidden" name="oldid_dep" value="<?php echo $db[department_pc]; ?>">
	<input type="hidden" name="id_pc" value="<?php echo $db[id_pc]; ?>">
	<tr><td colspan="2" align="center"><input type="submit" value="บันทึกข้อมูล" class="button button3"></td></tr>
</table>
</form>

<?php





include "footer.html";
?>