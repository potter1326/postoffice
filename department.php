<?php
include "chksession.php";
include "dbconfig.php";
include "function.php";
include "header.html";
echo "<h3>รายการพัสดุแยกสำนัก</h3>";
$sql="select * from `ddpost`.`department` ORDER BY priority_dep ASC";
$res=mysqli_query($connect,$sql);
$cdep=0;
$yearnow=date('Y')+543;
echo "<table>";
while ($db=mysqli_fetch_array($res)) {
	$cdep++;
	$sql2="select * from `ddpost`.`parcel` WHERE department_pc=$db[id_dep] AND year_pc=$yearnow";
	$res2=mysqli_query($connect,$sql2);
	$num2=mysqli_num_rows($res2);
	echo "<tr><td><a href=department_view.php?id_dep=$db[id_dep]#end>$cdep. $db[name_dep]($num2)</a></td></tr>";
}
echo "</table>";
include "footer.html";
?>