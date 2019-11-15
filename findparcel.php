<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ค้นหาพัสดุ</title>
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


<script>
 $(function() {
$( "#forsearch_pc" ).autocomplete({//กำหนดให้ทำงานที่ ชื่อ-สกุล โดยเรากำหนด id ให้ Input ชื่อ emp_name
source: "employee_show.php",//เรียกข้อมูลจากไฟล์ employee_show.php โดยจะส่งparams ชื่อ term ไปด้วย
minLength: 2,//ทำงานเมื่อพิมพ์ตั้งแต่ 2 ตัวอักษรขึ้นไป
select: function( event, ui ) {//เมื่อกดเลือกที่ Auto Complete ก็ให้แสดง Auto Fill ใน Input ต่างๆดังนี้
	$('#datepick_pc').val(ui.item.datepick_pc);
	$('#barcode_pc').val(ui.item.barcode_pc);
    $('#id_pc').val(ui.item.id_pc);
 

}
})
});
</script>


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
 
<body>

<div align="center">
<table border=0 width=100%>
  <tr><td cellpading=0 cellspacing=0><!--<img src=/images/bannernew1.jpg>--></td></tr>
		<tr><td cellpading=0 cellspacing=0 align="center">

        	
  </td></tr>
  <tr><td>
<center><b><a href=main.php>หน้าหลัก</a> | <a href=logout.php>ออกจากระบบ</a>  
 </b></center>
</td></tr>
</table>

<table width="50%" border="1" align="center">
<form action="searchparcel.php" method="POST">

  <tr>
    <td>ชื่อ หรือหมายเลขพัสดุ</td>
    <td><input name="forsearch_pc" type="text" id="forsearch_pc" style="font-size:36px" autofocus="autofocus" />
    </td>
  </tr>
<tr>
    <td>วันที่รับเข้าระบบ</td>
  
    <td><input name="datepick_pc" readonly type="text" id="datepick_pc" style="font-size:36px" /></td>
    </tr>
  
<tr>
    <td>บาร์โค้ด</td>
  
    <td><input name="barcode_pc" readonly type="text" id="barcode_pc" style="font-size:36px" /></td>
    </tr>
    <tr>
    <td>ID</td>
  
    <td><input name="id_pc" type="text" id="id_pc" style="font-size:36px" readonly /></td>
    </tr>
<tr>
	<td colspan="2" align="center"><input type="submit" value="ค้นหาพัสดุ/รับพัสดุ" class="button button3"></td>
</tr>
</form>
</table>
<?php
include "footer.html";
?>