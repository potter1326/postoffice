<html>


<head>

  <meta charset="utf-8">
  <title>ลงชื่อรับพัสดุ</title>
  <style>
    body { font: normal 100.01%/1.375 "Helvetica Neue",Helvetica,Arial,sans-serif; }
  </style>
  <link href="assets/jquery.signaturepad.css" rel="stylesheet">
  <!--[if lt IE 9]><script src="../assets/flashcanvas.js"></script><![endif]-->
  <script src="js/jquery.min.js"></script>
</head>

<body>

<form method="post" action="savesign_group2.php" class="sigPad">
<label for="name">พิมพ์ชื่อผู้รับ</label>
    <input type="text" name="name" id="name" class="name" style="font-size:36px" autofocus="autofocus" size=50>
<?php
error_reporting (E_ALL ^ E_NOTICE);

include "dbconfig.php";
$sql="select * from `ddpost`.`parcel_tmp`";
$res=mysqli_query($connect,$sql);
$numtmp=mysqli_num_rows($res);
echo "<h3>รับพัสดุ $numtmp ชิ้น</h3>";
if($numtmp==0){
  ?>




<script language="JavaScript">
  alert("ไม่มีพัสดุรอการรับค่ะ")
</script>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/postoffice/index.php">

<?php
}else{
?>
 <p class="drawItDesc">พิมพ์ชื่อผู้รับ</p>
    <ul class="sigNav">
      <li class="drawIt"><a href="#draw-it" >เซ็นชื่อ</a></li>
      <li class="clearButton"><a href="#clear">ลบลายเซ็น</a></li>
    </ul>
    <div class="sig sigWrapper">
      <div class="typed"></div>
      <canvas class="pad" width="350" height="150" style="border:2px solid #3300FF;"></canvas>
      <input type="hidden" name="output" class="output">
      
      
    </div>
    

  <script src="jquery.signaturepad.js"></script>
  <script>
    $(document).ready(function() {
      $('.sigPad').signaturePad({drawOnly:true});
    });
  </script>
  <script src="assets/json2.min.js"></script>


<br><br><br>

  <p><br><button type="submit">บันทึกข้อมูล</button>
  </form>
<?php
}
?>
</body>

