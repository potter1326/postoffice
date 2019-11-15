<?php
include "chksession.php";
include "dbconfig.php";
include "function.php";
include "header.html";
$id_dep=$_GET["id_dep"];
$sqlempty="DELETE FROM `ddpost`.`parcel_tmp`";
$resultempty=mysqli_query($connect,$sqlempty);
?>
<script language="JavaScript">
  alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ")
</script>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=department_view.php?id_dep=<?php echo $id_dep; ?>#end">