<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>บันทึกการรับพัสดุ</title>
<?php
include "dbconfig.php";
$takeoutname_pc=$_POST["name"];
$sign_pc=$_POST["output"];
$barcode_pc=$_POST["barcode_pc"];
$datetake_pc=date('Y-m-d');
//echo $sign_pc;



$handle = fopen("signfile/$barcode_pc", 'w+');
if($handle){

    if(!fwrite($handle, "$sign_pc"))  die("ไม่สามารถบักทึกข้อมูลได้"); 
    

    	$sqladd="update `ddpost`.`parcel` set takeoutname_pc='$takeoutname_pc',datetake_pc='$datetake_pc' where barcode_pc='$barcode_pc'";
    	//$sqladd="UPDATE `ddpost`.`parcel` SET `takeoutname_pc` = '$takeoutname_pc', `datetake_pc` = '$datetake_pc' WHERE `parcel`.`barcode_pc` = '$barcode_pc'";
//echo $sqladd;

	$resultadd=mysqli_query($connect,$sqladd);
	if ($resultadd) {
		
		?>

<script language="JavaScript">
  alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ")
</script>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/postoffice/main.php">

		<?php
	 }else{
		echo "<h3>ERROR : ไม่สามารถบันทึกข้อมูลได้ โปรดติดต่อผู้ดูแลระบบค่ะ</h3>";
	}




}



?>
<body>
  
</body>
