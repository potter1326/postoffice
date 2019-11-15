<?php
include "chksession.php";
include "dbconfig.php";
include "header.html";

//echo $sql;
$yeardatepick=date('Y')+543;
$monthdatepick=date('m');
$daydatepick=date('d');
$datepick_pc="$daydatepick/$monthdatepick/$yeardatepick";
?>

<h3>คีย์ข้อมูลพัสดุใหม่</h3>
<form action="save_newparcel.php" method="post" name="formnewparcel">
<table>

	<tr><td>วันที่ : </td><td><input type="text" size="10" id="datepicker-th" name="datepick_pc" value="<?php echo $datepick_pc; ?>" /></td>
	<tr><td>ชื่อผู้ส่ง : </td><td><input type="text" name="sendername_pc" /></td>
	<tr><td>ที่อยู่ผู้ส่ง : </td><td><textarea name="senderadd_pc" style="font-size: 16pt"></textarea></td>
	<tr><td>ชื่อผู้รับ : </td><td><input type="text" name="recievername_pc" size= "50" /></td>
	<tr><td>หน่วยงาน : </td><td><input type="text" name="workplace_pc" /></td>
	<tr><td>สำนัก : </td><td><select name="department_pc">
			<option value="">กรุณาเลือกสำนัก</option>
<?php
	$sql="select * from `ddpost`.`department` ORDER BY priority_dep ASC";
	$res=mysqli_query($connect,$sql);
	while($db=mysqli_fetch_array($res)) {
		$sql2="select * from `ddpost`.`parcel` WHERE department_pc=$db[id_dep] AND year_pc=$yeardatepick";
	$res2=mysqli_query($connect,$sql2);
	$num2=mysqli_num_rows($res2);
	$sqlmax="select MAX(rnumber_pc) from `ddpost`.`parcel` WHERE department_pc=$db[id_dep]";
	$resmax=mysqli_query($connect,$sqlmax);
	$total_max=mysqli_fetch_array($resmax);
					
					echo "<option value=$db[id_dep]>$db[name_dep]($num2)($total_max[0])</option>";
				}
?>
			</select>
		</td>
	<tr><td>เก็บเงิน : </td><td>
		 <select id="pagelist">
   			<option value="NoCharge">ไม่มี</option>
    		<option value="Charge">มีค่าธรรมเนียม</option>
 			</select>

		<div id="Charge" style="display:none">
  		เก็บเงิน : <input type="text" name="charge_pc" size="5" value="0" /> บาท<br />
  </div>

  
  <script language="javascript">
  $("#pagelist").change(function(){
  var viewID = $("#pagelist option:selected").val();
  $("#pagelist option").each(function(){
    var hideID = $(this).val();
    $("#"+hideID).hide();
  });
  $("#"+viewID).show(); 
  });
</script>
</td></tr>
	<tr><td>บาร์โค้ด : </td><td><input type="text" name="barcode_pc"/></td>
	<tr><td colspan="2" align="center"><input type="submit" value="บันทึกข้อมูล" class="button button3"></td></tr>
</table>
</form>

<?php

/*
$sqlmax="select MAX(rnumber_pc) from `ddpost`.`parcel` WHERE department_pc=$db[id_dep]";
	$resmax=mysqli_query($sqlmax);
	$total_max=mysqli_result($resmax,0);


$sqlmaxid="select id_pc from `ddpost`.`parcel` WHERE rnumber_pc=$total_max";
$resmaxid=mysqli_query($sqlmaxid);
$dbmaxid=mysqli_fetch_array($resmaxid);


*/



include "footer.html";
?>