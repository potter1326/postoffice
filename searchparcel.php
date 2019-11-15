<?php
include "chksession.php";
include "dbconfig.php";
include "header.html";
include "function.php";
$forsearch_pc=$_POST["forsearch_pc"];
$barcode_pc=$_POST["barcode_pc"];
$id_pc=$_POST["id_pc"];

if($barcode_pc=="" AND $forsearch_pc==""){
	?>
		<script language="JavaScript">
		  alert("กรุณากรอกข้อมูลให้ครบด้วยค่ะ")
		</script>
		<a href="javascript:history.back();">ย้อนกลับ</a>
<?php
}else if($id_pc=="" AND $barcode_pc==""){
	$sql="select * from `ddpost`.`parcel` where barcode_pc='$forsearch_pc'";
	$res=mysqli_query($connect,$sql);
	$db=mysqli_fetch_array($res);
	//echo $db[takeoutname_pc];

	if($db[takeoutname_pc]=="0"){
				$status_pc="<tr><td colspan=2 align=center><input type=submit value=รับพัสดุ class='button button3'></td></tr>";
	}else{
		$datetake_pc=displaydate($db[datetake_pc]);
		$status_pc="<tr><td>ผู้รับ : </td><td>$db[takeoutname_pc]</td></tr><tr><td>วันที่รับ : </td><td>$datetake_pc</td></tr><tr><td colspan=2 align=center><font color=green><b>พัสดุรับไปเรียบร้อยแล้ว</b></font></td></tr>";
	}
}else{
	$sql="select * from `ddpost`.`parcel` where id_pc=$id_pc";
	$res=mysqli_query($connect,$sql);
	$db=mysqli_fetch_array($res);
	//echo "id_pc=$id_pc";
	if($db[takeoutname_pc]=="0"){
		$status_pc="<tr><td colspan=2 align=center><input type=submit value=รับพัสดุ class='button button3'></td></tr>";
	}else{
		$datetake_pc=displaydate($db[datetake_pc]);
		$status_pc="<tr><td>ผู้รับ : </td><td>$db[takeoutname_pc]</td></tr><tr><td>วันที่รับ : </td><td>$datetake_pc</td></tr><tr><td colspan=2 align=center><font color=green><b>พัสดุรับไปเรียบร้อยแล้ว</b></font></td></tr>";
	}
}
?>
<h3>รายการพัสดุ</h3>
<form action="save_staffsendtoget.php" method="post" name="formnewparcel">
<table border="1" bordercolor=#3A5A64 cellspacing="0">
<?php
	echo "<tr><td>บาร์โค้ด : </td><td>$db[barcode_pc]</td></tr>";
	echo "<tr><td>วันที่ : </td><td>".displaydate($db[datepick_pc])."</td></tr>";
	echo "<tr><td>ชื่อผู้ส่ง : </td><td>$db[sendername_pc]</td></tr>";
	echo "<tr><td>ที่อยู่ผู้ส่ง : </td><td>$db[senderadd_pc]</td></tr>";
	echo "<tr><td>ชื่อผู้รับ : </td><td>$db[recievername_pc]</td></tr>";
	echo "<tr><td>หน่วยงาน : </td><td>$db[workplace_pc]</td></tr>";
	if($db[charge_pc] > 0){
		echo "<tr><td><font color=red><b>เก็บเงิน : </b></font></td><td><font color=red><b>$db[charge_pc] บาท</b></font></td></tr>";
	}
	
	$sql2="select * from `ddpost`.`department` where id_dep=$db[department_pc]";
	$res2=mysqli_query($connect,$sql2);
	$db2=mysqli_fetch_array($res2);
	echo "<tr><td>สำนัก : </td><td>$db2[name_dep]</td></tr>";
	echo "<input type=hidden name=id_pc1 value=$db[id_pc]>";
	?>
	<input type=hidden name=cr value="1">
	<?php
	




echo $status_pc;
echo "</table>";



echo "</form>";
//echo $forsearch_pc;



include "footer.html";
?>