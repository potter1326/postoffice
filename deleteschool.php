<?php
include "chksession.php";
include "dbconfig.php";
include "function.php";
include "header.html";
$id_delete=$_GET["id_delete"];
$delwhat=$_GET["delwhat"];
$idwhat=$_GET["idwhat"];
$sqloldsch="select * from `ddpost`.`parcel` where id_pc=$id_delete";
$resultoldsch=mysqli_query($connect,$sqloldsch);
$numoldsch=mysqli_num_rows($resultoldsch);
echo $sqloldsch;
if ($numoldsch <= 0) {
	?>
		<script language="JavaScript">
		alert("ไม่สามารถลบข้อมูลได้ค่ะ")
		</script>
		<META HTTP-EQUIV="Refresh" CONTENT="0;URL=javascript:history.back()">
	<?php
}else{
		
		
			$sqldelsch="delete from `ddpost`.`$delwhat` where $idwhat=$id_delete";
			$resultdelsch=mysqli_query($connect,$sqldelsch);
			
			if ($resultdelsch) {
				?>
				<script language="JavaScript">
				alert("ลบข้อมูลเรียบร้อยแล้วค่ะ")
				</script>
				<META HTTP-EQUIV="Refresh" CONTENT="0;URL=main.php">
				<?php
				 }else{
					echo "<h3>ERROR : ไม่สามารถลบข้อมูลได้โปรดติดต่อผู้ดูแลระบบค่ะ</h3>";
				}
			
	
}
?>