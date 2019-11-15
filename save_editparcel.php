<?php
include "chksession.php";
include "dbconfig.php";
include "function.php";
include "header.html";
$id_pc=$_POST["id_pc"];
$barcode_pc=$_POST["barcode_pc"];
$id_dep=$_POST["department_pc"];
$oldid_dep=$_POST["oldid_dep"];
$datepick=$_POST["datepick_pc"];
$charge_pc=$_POST["charge_pc"];
$datepickarray=explode("/", $datepick);
$datepickyear=$datepickarray[2]-543;
$datepick_pc="$datepickyear-$datepickarray[1]-$datepickarray[0]";

$sendername_pc=$_POST["sendername_pc"];
$senderadd_pc=$_POST["senderadd_pc"];
$recievername_pc=$_POST["recievername_pc"];
$workplace_pc=$_POST["workplace_pc"];
$forsearch_pc="$barcode_pc $recievername_pc";

if ($datepick=="" OR $sendername_pc=="" OR $recievername_pc=="" OR $id_dep=="" OR $barcode_pc=="") {

	?>
		<script language="JavaScript">
		  alert("กรุณากรอกข้อมูลให้ครบด้วยค่ะ")
		</script>
		<a href="javascript:history.back();">ย้อนกลับ</a>
<?php
}else{
//echo $datepick_pc;
	if($oldid_dep==$id_dep){
		
		$sqladd="update `ddpost`.`parcel` set barcode_pc='$barcode_pc',datepick_pc='$datepick_pc',sendername_pc='$sendername_pc',senderadd_pc='$senderadd_pc',recievername_pc='$recievername_pc',workplace_pc='$workplace_pc',forsearch_pc='$forsearch_pc',charge_pc=$charge_pc WHERE id_pc=$id_pc";

		//echo "$sqladd";
		$resultadd=mysqli_query($connect,$sqladd);
	if ($resultadd) {
		
		?>

	<script language="JavaScript">
	  alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ")
	</script>
	<META HTTP-EQUIV="Refresh" CONTENT="0;URL=main.php">

			<?php
		 }else{
			echo "<h3>ERROR : ไม่สามารถบันทึกข้อมูลได้ โปรดติดต่อผู้ดูแลระบบค่ะ</h3>";
		}
	}else{


		//กรณีเปลี่ยนสำนัก 


		$sql="select * from `ddpost`.`department` WHERE id_dep=$id_dep";
		$res=mysqli_query($connect,$sql);
		$db=mysqli_fetch_array($res);
		$rnumber_pc=$db[runnumber_dep]+1;

		$sqladd="update `ddpost`.`parcel` set barcode_pc='$barcode_pc',datepick_pc='$datepick_pc',sendername_pc='$sendername_pc',senderadd_pc='$senderadd_pc',recievername_pc='$recievername_pc',workplace_pc='$workplace_pc',department_pc=$id_dep,forsearch_pc='$forsearch_pc',rnumber_pc=$rnumber_pc,charge_pc=$charge_pc WHERE id_pc=$id_pc";

		
		$resultadd=mysqli_query($connect,$sqladd);
	if ($resultadd) {
		$sqladdrunnumber="UPDATE `ddpost`.`department` SET runnumber_dep=$rnumber_pc WHERE id_dep=$id_dep";
			//echo $sqladdrunnumber;
			$resultrnumber=mysqli_query($connect,$sqladdrunnumber);
		?>

	<script language="JavaScript">
	  alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ")
	</script>
	<META HTTP-EQUIV="Refresh" CONTENT="0;URL=main.php">

			<?php
		 }else{
			echo "<h3>ERROR : ไม่สามารถบันทึกข้อมูลได้ โปรดติดต่อผู้ดูแลระบบค่ะ</h3>";
		}


		
	}
}

include "footer.html";
?>