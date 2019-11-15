<?php
include "chksession.php";
include "dbconfig.php";
include "function.php";
include "header.html";
$sql="select * from `ddpost`.`user` where username_user='$sess_username'";
$result=mysqli_query($connect,$sql);
$db=mysqli_fetch_array($result);
//echo $sql;
?>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<body onLoad="MM_preloadImages('images/find2.jpg','images/addparcel2.jpg','images/dep2.jpg')">

สวัสดี <b><?php echo $db['name_user']; ?> <?php echo $db['lname_user']; ?> </b> ยินดีต้อนรับท่านเข้าสู่ระบบพัสดุไปรษณีย์วัดพระธรรมกาย<br>
วันนี้วันที่ <?php echo displaydate(date('Y-m-d'));?>
<p><a href="findparcel.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('find','','images/find2.jpg',1)"><img src="images/find1.jpg" alt="ค้นหาพัสดุ" width="287" height="119" id="find"></a><br>


<a href="newparcel.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('newparcel','','images/addparcel2.jpg',1)"><img src="images/addparcel1.jpg" alt="เพิ่มพัสดุใหม่" width="287" height="119" id="newparcel"></a><br>


<a href="department.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('dep','','images/dep2.jpg',1)"><img src="images/dep1.jpg" alt="รายการพัสดุแยกสำนัก" width="287" height="119" id="dep"></a><a href="newparcel.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('newparcel','','images/addparcel2.jpg',1)"></a>
<br>
<a href="openmailbox_viewmode.php" target="_blank"><img src="images/openmailbox.jpg" alt="เปิดตู้" width="287" height="119" border="0" /></a>

<p>
  <?php
include "footer.html";
?>