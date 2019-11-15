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
<form method="post" action="savesign_group.php" class="sigPad">
<label for="name">กรอกชื่อผู้รับ</label>
    <input type="text" name="name" id="name" class="name">
<?php
error_reporting (E_ALL ^ E_NOTICE);

$cdep=$_POST["cdep"];

for($j=0; $j<=$cdep; $j++){
  $barcode_pcj=$_POST[barcode_pc."$j"];
  if($barcode_pcj<>""){
    $cr++;
    
    
  }
}
//echo $cr;
$ii=0;
echo "<input type=hidden name=cr value=$cr>";
for($i=0; $i<=$cdep; $i++){
    $barcode_pc=$_POST[barcode_pc."$i"];
    if($barcode_pc<>""){
        $ii++;
   // echo "<br>$i $barcode_pc";
    echo "<input type=hidden name=barcode_pc$ii value=$barcode_pc>";
    }
}


?>
 <p class="drawItDesc">ลงชื่อรับ</p>
    <ul class="sigNav">
      <li class="drawIt"><a href="#draw-it" >เซ็นชื่อ</a></li>
      <li class="clearButton"><a href="#clear">ลบลายเซ็น</a></li>
    </ul>
    <div class="sig sigWrapper">
      <div class="typed"></div>
      <canvas class="pad" width="250" height="100"></canvas>
      <input type="hidden" name="output" class="output">
      
      
    </div>
    

  <script src="jquery.signaturepad.js"></script>
  <script>
    $(document).ready(function() {
      $('.sigPad').signaturePad({drawOnly:true});
    });
  </script>
  <script src="assets/json2.min.js"></script>


  <p><br><button type="submit">บันทึกข้อมูล</button>
  </form>
</body>
