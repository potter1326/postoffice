<?php
include "chksession.php";
include "dbconfig.php";
include "function.php";
include "header.html";




$cdep=$_POST["cdep"];

for($j=0; $j<=$cdep; $j++){
  $id_pcj=$_POST[id_pc."$j"];
  if($id_pcj<>""){
    $cr++;
    
    
  }
}
echo "<form action=save_staffsendtoget.php method=post>";
echo "<h3>รายการพัสดุที่ต้องการรับ</h3>";
$ii=0;
echo "<input type=hidden name=cr value=$cr>";
for($i=0; $i<=$cdep; $i++){
    $id_pc=$_POST[id_pc."$i"];
    $barcode_pc=$_POST[barcode_pc."$i"];
    $charge_pc=$_POST[charge_pc."$i"];
    if($id_pc<>""){
        $ii++;
        $chargetotal=$chargetotal+$charge_pc;
   echo "<br>ชิ้นที่ $ii $barcode_pc";
    echo "<input type=hidden name=id_pc$ii value=$id_pc>";
    echo "<input type=hidden name=barcode_pc$ii value=$barcode_pc>";
    }
}
if($chargetotal > 0){
 echo "<h3>รายการพัสดุ $ii ชิ้น <font color=red>เก็บเงิน $chargetotal บาท</font></h3>";
}else{
  echo "<h3>รายการพัสดุ $ii ชิ้น</h3>";
}
?>
  <p><br><button type="submit">คลิกเพื่อส่งข้อมูล</button>
  </form>
