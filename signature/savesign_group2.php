<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>บันทึกการรับพัสดุ</title>
<?php
error_reporting (E_ALL ^ E_NOTICE);
include "dbconfig.php";
$takeoutname_pc=$_POST["name"];
$sign_pc=$_POST["output"];

//$cr=$_POST["cr"];
$datetake_pc=date('Y-m-d');

$sql="select * from `ddpost`.`parcel_tmp`";
$res=mysqli_query($connect,$sql);
while ($db=mysqli_fetch_array($res)) {
	 $handle = fopen("signfile/$db[id_pc]", 'w+');
if($handle){

    if(!fwrite($handle, "$sign_pc"))  die("ไม่สามารถบักทึกข้อมูลได้"); 
    

    	$sqladd="update `ddpost`.`parcel` set takeoutname_pc='$takeoutname_pc',datetake_pc='$datetake_pc' where id_pc=$db[id_pc]";
		$resultadd=mysqli_query($connect,$sqladd);
		$sqlempty="delete from `ddpost`.`parcel_tmp`";
		$resultempty=mysqli_query($connect,$sqlempty);




}

}

?>



<!--<script language="JavaScript">
  alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ")
</script>-->
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/postoffice/index.php">


