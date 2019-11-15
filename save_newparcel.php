<?php
include "chksession.php";
include "dbconfig.php";
include "function.php";
include "header.html";
$barcode_pc=$_POST["barcode_pc"];
$id_dep=$_POST["department_pc"];

$sql="select * from `ddpost`.`department` WHERE id_dep=$id_dep";
$res=mysqli_query($connect,$sql);
$db=mysqli_fetch_array($res);
$rnumber_pc=$db[runnumber_dep]+1;

$datepick=$_POST["datepick_pc"];

$datepickarray=explode("/", $datepick);
$datepickyear=$datepickarray[2]-543;
$datepick_pc="$datepickyear-$datepickarray[1]-$datepickarray[0]";
//echo $datepick_pc;

$sendername_pc=$_POST["sendername_pc"];
$senderadd_pc=$_POST["senderadd_pc"];
$recievername_pc=$_POST["recievername_pc"];
$workplace_pc=$_POST["workplace_pc"];
$forsearch_pc="$barcode_pc $recievername_pc";
$year_pc=date('Y')+543;
$charge_pc=$_POST["charge_pc"];

$sqladd="INSERT INTO `ddpost`.`parcel` (barcode_pc,rnumber_pc,datepick_pc,sendername_pc,senderadd_pc,recievername_pc,workplace_pc,department_pc,forsearch_pc,year_pc,charge_pc) VALUES('$barcode_pc',$rnumber_pc,'$datepick_pc','$sendername_pc','$senderadd_pc','$recievername_pc','$workplace_pc',$id_dep,'$forsearch_pc',$year_pc,$charge_pc)";
//echo $sqladd;
if ($datepick=="" OR $sendername_pc=="" OR $recievername_pc=="" OR $id_dep=="" OR $barcode_pc=="") {
?>
		<script language="JavaScript">
		  alert("กรุณากรอกข้อมูลให้ครบด้วยค่ะ")
		</script>
		<a href="javascript:history.back();">ย้อนกลับ</a>
<?php
}else{
	$resultadd=mysqli_query($connect,$sqladd);
	//echo $sqladd;
	if ($resultadd) {
		$sqladdrunnumber="UPDATE `ddpost`.`department` SET runnumber_dep=$rnumber_pc WHERE id_dep=$id_dep";
			//echo $sqladdrunnumber;
			$resultrnumber=mysqli_query($connect,$sqladdrunnumber);
		?>

<script language="JavaScript">
  alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ")
</script>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=newparcel.php">

		<?php
	 }else{
		echo "<h3>ERROR : ไม่สามารถบันทึกข้อมูลได้ โปรดติดต่อผู้ดูแลระบบค่ะ</h3>";
	}
//echo "$db[name_dep] $rnumber_pc";


}

include "footer.html";
?>