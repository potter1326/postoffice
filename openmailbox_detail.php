<?php
include "chksession.php";
include "dbconfig.php";
include "function.php";
include "header.html";
$number_box=$_POST["number_box"];

?>
<h3>รายละเอียดการเปิดตู้หมายเลข <?=$number_box;?></h3>
<a href="#end"> ไปล่างสุด</a> | <a href=openmailbox_viewmode.php>ย้อนกลับ</a>
<table border="1" cellspacing="0" bordercolor="#00CCFF">
<tr bgcolor="#FFFF99">
	<td align="center"><b>ลำดับที่</b></td>
	<td align="center"><b>ว/ด/ป เวลา</b></td>
	<td align="center"><b>ชื่อผู้เปิด</b></td>
	<td align="center"><b>หน่วยงาน</b></td>
	<td align="center"><b>เบอร์โทร</b></td>
	
</tr>
<?php
$sql="select * from `ddpost`.`mailbox` where number_box=$number_box ORDER BY time_box ASC";
$res=mysqli_query($connect,$sql);
while ($db=mysqli_fetch_array($res)) {
	$cdep++;
	echo "<tr>";
	echo "<td>$cdep</td>";
	echo "<td>$db[time_box]</td>";
	echo "<td>$db[name_box]</td>";
	echo "<td>$db[office_box]</td>";
	echo "<td>$db[tel_box]</td>";
	echo "</tr>";
	}
	
?>


	
<?php

echo "</table>";
echo "<a href=#top>ขึ้นบนสุด</a> | <a href=openmailbox_viewmode.php>ย้อนกลับ</a>";
echo "<a name=end>";
include "footer.html";
?>
