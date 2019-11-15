<?php
include "chksession.php";
include "dbconfig.php";
include "function.php";
include "header.html";
$id_pc=$_GET["id_pc"];
$id_dep=$_GET["id_dep"];
/*$sqlempty="DELETE FROM `ddpost`.`parcel_tmp`";
$resultempty=mysqli_query($connect,$sqlempty);
*/

$sql="update `ddpost`.`parcel` set datetake_pc='0000-00-00',takeoutname_pc='0' WHERE id_pc=$id_pc";
$res=mysqli_query($connect,$sql);
//echo $sql;
unlink("signature/signfile/$id_pc");
?>

<script language="JavaScript">
  alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ")
</script>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=department_view.php?id_dep=<?php echo $id_dep; ?>#end">