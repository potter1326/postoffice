<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>บันทึกการรับพัสดุ</title>
<?php
error_reporting (E_ALL ^ E_NOTICE);
include "dbconfig.php";

$cr=$_POST["cr"];
$datetake_pc=date('Y-m-d');
//echo $cr;

for($i=1; $i<=$cr; $i++){
	$id_pc=$_POST[id_pc."$i"];
    $barcode_pc=$_POST[barcode_pc."$i"];
    echo "<br>$i $barcode_pc";

//echo $sign_pc;

    	$sqladd="INSERT INTO `ddpost`.`parcel_tmp` (id_pc,barcode_pc) VALUES($id_pc,'$barcode_pc')";
	$resultadd=mysqli_query($connect,$sqladd);




}




?>



<script language="JavaScript">
  alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ")
</script>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/postoffice/main.php">

