<?php
include "function.php";
include "dbconfig.php";
$number_box=$_POST["number_box"];
if($number_box==""){
	?>

<script language="JavaScript">
  alert("กรุณากรอกหมายเลขตู้ด้วยค่ะ")
</script>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=openmailbox.php">
<?php
}else{

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เปิดตู้จดหมาย</title>
<link rel="stylesheet" href="script/jquery-ui.css" type="text/css" media="all" />
<!-- เรียกไฟล์ css ของ jquery ui -->
<script src="script/jquery.min.js" type="text/javascript"></script>
<!-- เรียกไฟล์ jquery -->
<script src="script/jquery-ui.min.js" type="text/javascript"></script>
 <style>
.ui-autocomplete-loading {
background: white url('ui-anim_basic_16x16.gif') right center no-repeat;/*แสดงตัวโหลด*/
}
.ui-corner-all{
font-size:14px; 
}
</style>

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


<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}


.button3 {border-radius: 8px;}

</style>

</head>
 

</style>
<script language="javascript" src="js/jquery-3.3.1.js"></script>
		

</head>
<body onload="Realtime();">
<div align="center">

	<a href=openmailbox.php>ย้อนกลับ</a>

<h3>กรอกรายละเอียดการเปิดตู้</h3>
<h1>ตู้ที่ <?php echo $number_box; ?></h1>
<form action="save_openmailbox.php" method="post" name="formnewparcel">
<table>

	<tr><td>วันที่ : </td><td><?php echo displaydate(date('Y-m-d')); ?></td></tr>
	<tr><td>เวลา : </td><td><div id="divDetail"><?php echo date("H:i:s"); ?></div></td></tr>
	<tr><td>ชื่อผู้เปิด : </td><td><input type="text" name="name_box" style="font-size:36px" /></td></tr>
	<tr><td>เบอร์โทร : </td><td><input type="text" name="tel_box" style="font-size:36px" /></td></tr>
	<tr><td>กอง/หน่วยงาน : </td><td><input type="text" name="office_box" style="font-size:36px" /></td></tr>
	<tr><td>สำนัก : </td><td><select name="department_box" style="font-size:36px" />
			<option value="">กรุณาเลือกสำนัก</option>
<?php
	$sql="select * from `ddpost`.`department` ORDER BY priority_dep ASC";
	$res=mysqli_query($connect,$sql);
	while($db=mysqli_fetch_array($res)) {
					echo "<option value=$db[id_dep]>$db[name_dep]</option>";
				}
?>
			</select>
		</td>
	<input type="hidden" name="number_box" value="<?php echo $number_box; ?>">
	<tr><td colspan="2" align="center"><input type="submit" value="บันทึกข้อมูล" class="button button3"></td></tr>
</table>
</form>

<?php
}
include "footer.html";
?>