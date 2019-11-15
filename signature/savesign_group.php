<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>บันทึกการรับพัสดุ</title>
<?php
error_reporting (E_ALL ^ E_NOTICE);
include "dbconfig.php";
$takeoutname_pc=$_POST["name"];
$sign_pc=$_POST["output"];

$cr=$_POST["cr"];
$datetake_pc=date('Y-m-d');
//echo $cr;

for($i=1; $i<=$cr; $i++){
    $barcode_pc=$_POST[barcode_pc."$i"];
    echo "<br>$i $barcode_pc";

//echo $sign_pc;
    
    $handle = fopen("signfile/$barcode_pc", 'w+');
if($handle){

    if(!fwrite($handle, "$sign_pc"))  die("ไม่สามารถบักทึกข้อมูลได้"); 
    

    	$sqladd="update `ddpost`.`parcel` set takeoutname_pc='$takeoutname_pc',datetake_pc='$datetake_pc' where barcode_pc='$barcode_pc'";
	$resultadd=mysqli_query($connect,$sqladd);




}

}


?>



<script language="JavaScript">
  alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ")
</script>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/postoffice/main.php">


