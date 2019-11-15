<?php
include "chksession.php";
include "dbconfig.php";
include "function.php";
include "header.html";
$id_dep=$_GET["id_dep"];
$year_pc=date('Y')-1;
$datepick_pc="$year_pc-10-01";
$sql="select * from `ddpost`.`parcel` where department_pc=$id_dep and datepick_pc >= '$datepick_pc' ORDER BY rnumber_pc ASC";
$res=mysqli_query($connect,$sql);
$sql2="select * from `ddpost`.`department` where id_dep=$id_dep";
$res2=mysqli_query($connect,$sql2);
$db2=mysqli_fetch_array($res2);
?>
<style>

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>




<h3>รายการพัสดุของ<?=$db2[name_dep];?></h3>
<a href="#end"> ไปล่างสุด</a>
<table border="1" cellspacing="0" bordercolor=#36CBFE>

<tr>
  <th>ลำดับที่</th>
  <th>ว/ด/ป</th>
  <th>ชื่อผู้ส่ง</th>
  <!--<th>ที่อยู่ผู้ส่ง</th>-->
  <th>ชื่อผู้รับ</th>
  <th>หน่วยงาน</th>
  <th>บาร์โค้ด</th>
  <th>ชื่อผู้มารับ</th>
  <th>สถานะ</th>
  <th>แก้ไข</th>
  <th>ถ่ายภาพ</th>
  <th>ลบ</th>
</tr>
<?php

while ($db=mysqli_fetch_array($res)) {
  $cdep++;
  $datepick_pc=displaydate($db[datepick_pc]);
  echo "<tr><td>$db[rnumber_pc]</td>";
  echo "<td>$datepick_pc</td>";
  echo "<td>$db[sendername_pc]</td>";
  //echo "<td>$db[senderadd_pc]</td>";
  if($db[charge_pc] <= 0){
    echo "<td>$db[recievername_pc]</td>";
  }else{
    echo "<td>$db[recievername_pc] <br><b><font color=red>เก็บเงิน $db[charge_pc] บาท</b></font></td>";
  }
  
  echo "<td>$db[workplace_pc]</td>";
  echo "<td>$db[barcode_pc]</td>";
  if($db[takeoutname_pc]=="0"){
    $sql3="select * from `ddpost`.`parcel_tmp` where id_pc=$db[id_pc]";
    $res3=mysqli_query($connect,$sql3);
    $numtmp=mysqli_num_rows($res3);
    if($numtmp==0){
    echo "<form action=staffsendtoget.php method=post>
    <td><input type=checkbox name=id_pc$cdep value=$db[id_pc] class=largerCheckbox></td>
    <input type=hidden name=barcode_pc$cdep value=$db[barcode_pc]>
    <input type=hidden name=charge_pc$cdep value=$db[charge_pc]>
    <td><input type=submit value=รับพัสดุ></td>
    ";
    }else{
      echo "<td><b><font color=red>รอรับของ</font></b></td><td><b><a href=cancelpc.php?id_dep=$id_dep>ยกเลิกรับของ</a></b></td>";

    }
  }else{
    
      $datetake_pc=displaydate($db[datetake_pc]);
      //echo "<td><a href=signature/signfile/index.php?id_pc=$db[id_pc] target=_blank>$db[takeoutname_pc]</a></td><td>$datetake_pc</td>";
    echo "<td><a href=signature/signfile/index.php?id_pc=$db[id_pc] target=_blank>$db[takeoutname_pc]</a></td>";
    echo "<td><a href=cancelgetparcel.php?id_pc=$db[id_pc]&id_dep=$id_dep>ยกเลิกรับของ</a>";
    //echo $numtmp;
  }
  echo "<td><a href=editparcel.php?id_pc=$db[id_pc]>แก้ไข</a></td>";
  if($db[img_pc]==0){
    echo "<td><a href=cam.php?id_pc=$db[id_pc] target=_blank><img src=images/2.jpg width=30 height=20></a></td>";
  }else{
    //echo "<td><a href=img_cam/$db[id_pc].jpg target=_blank><img src=images/idcard.jpg width=30 height=20></a></td>";
    ?>
        <td><img id="myImg" src="img_cam/<?php echo $db[id_pc]; ?>.jpg" alt="ภาพผู้รับ" style="width:40%;max-width:300px"></td>

        <!-- The Modal -->
        <div id="myModal" class="modal">
          <span class="close">&times;</span>
          <img class="modal-content" id="img01">
          <div id="caption"></div>
        </div>

        <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
          modal.style.display = "none";
        }
        </script>


    <?php
  }
?>

  <td align=center><a href=deleteschool.php?id_delete=<?php echo "$db[id_pc]"; ?>&delwhat=parcel&idwhat=id_pc onClick="return confirm('ต้องการลบออกจากระบบจริงหรือไม่')"><img src=images/DeleteRed.png border=0></a></td>




  </tr>
<?php
}
echo "</table>";
echo "<input type=hidden name=cdep value=$cdep>";
echo "</form>";
echo "<a href=#top>ขึ้นบนสุด</a>";
echo "<a name=end>";
include "footer.html";
?>
