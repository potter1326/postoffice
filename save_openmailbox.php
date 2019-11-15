<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>::: ระบบพัสดุไปรษณีย์วัดพระธรรมกาย :::</title>
<style type="text/css">
<!--
a:link {
	color: #0000FF;
}
a:visited {
	color: #0000FF;
}
a:hover {
	color: #FF00FF;
}
-->
</style>
</head>
<body>
	<div align="center">
<table border=0 width=100%>
  <tr><td cellpading=0 cellspacing=0><!--<img src=/images/bannernew1.jpg>--></td></tr>
		<tr><td cellpading=0 cellspacing=0 align="center">

        	
  </td></tr>
  <tr><td>
<center><b><a href=index.php>หน้าแรก</a>
 </b></center>
</td></tr>
</table>


<?php

include "dbconfig.php";
$number_box=$_POST["number_box"];
$department_box=$_POST["department_box"];
$name_box=$_POST["name_box"];
$tel_box=$_POST["tel_box"];
$office_box=$_POST["office_box"];
//$date_box=date('Y-m-d');

$sqladd="INSERT INTO `ddpost`.`mailbox` (name_box,department_box,office_box,tel_box,number_box) VALUES('$name_box',$department_box,'$office_box','$tel_box',$number_box)";
//echo $sqladd;
if ($name_box=="" OR $department_box=="" OR $number_box=="") {
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
		?>

<script language="JavaScript">
  alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ")
</script>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php">

		<?php
	 }else{
		echo "<h3>ERROR : ไม่สามารถบันทึกข้อมูลได้ โปรดติดต่อผู้ดูแลระบบค่ะ</h3>";
	}
//echo "$db[name_dep] $rnumber_pc";


}

include "footer.html";
?>