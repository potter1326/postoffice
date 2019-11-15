<?php
include "chksession.php";
include "dbconfig.php";
include "header.html";
include "function.php";
echo "<h3>รายการพัสดุ</h3>";
$cdep=$_POST["cdep"];
$cr=0;
for($i=0; $i<=$cdep; $i++){
	$barcode_pc=$_POST[barcode_pc."$i"];
	if($barcode_pc<>""){
		//echo "$barcode_pc<br>";
		$cr++;
		$sql="select * from `ddpost`.`parcel` where barcode_pc='$barcode_pc'";
	$res=mysqli_query($connect,$sql);
	$db=mysqli_fetch_array($res);
	echo "ชิ้นที่ $i";

	
?>

<form action="signature/index_group.php" method="get" name="formnewparcel">
<table border="1" bordercolor=#3A5A64 cellspacing="0">
<?php
	echo "<tr><td>บาร์โค้ด : </td><td>$db[barcode_pc]</td></tr>";
	echo "<tr><td>วันที่ : </td><td>".displaydate($db[datepick_pc])."</td></tr>";
	echo "<tr><td>ชื่อผู้ส่ง : </td><td>$db[sendername_pc]</td></tr>";
	echo "<tr><td>ที่อยู่ผู้ส่ง : </td><td>$db[senderadd_pc]</td></tr>";
	echo "<tr><td>ชื่อผู้รับ : </td><td>$db[recievername_pc]</td></tr>";
	echo "<tr><td>หน่วยงาน : </td><td>$db[workplace_pc]</td></tr>";
	
	echo "<input type=hidden name=barcode_pc value=$db[barcode_pc]>";
	echo "<tr><td colspan=2 align=center><input type=submit value=รับพัสดุ class='button button3'></td></tr>";
	
	echo "<input type=hidden name=barcode_pc$i value=$barcode_pc>";
	echo "<input type=hidden name=cr value=$cr>";
	
	


echo "</table>";


	}
}



echo "</form>";




include "footer.html";
?>