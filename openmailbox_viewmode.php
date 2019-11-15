<?php
include "chksession.php";
include "header.html";
?>
<h3>ดูรายละเอียดการเปิดตู้</h3>
<table width="50%" border="1" align="center">
<form action="openmailbox_detail.php" method="POST">

  <tr>
    <td><b>กรอกหมายเลขตู้</b></td>
    <td><input name="number_box" type="text" style="font-size:36px" autofocus="autofocus" size="5" />
    </td>
  </tr>

<tr>
	<td colspan="2" align="center"><input type="submit" value="ต่อไป >>>" class="button button3"></td>
</tr>
</form>
</table>
<?php
include "footer.html";
?>