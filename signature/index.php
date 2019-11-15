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
<?php
error_reporting (E_ALL ^ E_NOTICE);
$barcode_pc=$_GET["barcode_pc"];
$takeoutname_pc=$_GET["takeoutname_pc"];
echo $barcode_pc;
?>
  <form method="post" action="savesign.php" class="sigPad">
    <label for="name">กรอกชื่อผู้รับ</label>
    <input type="text" name="name" id="name" class="name" value="<?php echo $takeoutname_pc; ?>">
    <p class="drawItDesc">ลงชื่อรับ</p>
    <ul class="sigNav">
      <li class="drawIt"><a href="#draw-it" >เซ็นชื่อ</a></li>
      <li class="clearButton"><a href="#clear">ลบลายเซ็น</a></li>
    </ul>
    <div class="sig sigWrapper">
      <div class="typed"></div>
      <canvas class="pad" width="198" height="55"></canvas>
      <input type="hidden" name="output" class="output">
      <input type="hidden" name="barcode_pc" id="barcode_pc" value="<?php echo $barcode_pc; ?>">
    </div>
    <button type="submit">บันทึกข้อมูล</button>
  </form>

  <script src="jquery.signaturepad.js"></script>
  <script>
    $(document).ready(function() {
      $('.sigPad').signaturePad({drawOnly:true});
    });
  </script>
  <script src="assets/json2.min.js"></script>
</body>
