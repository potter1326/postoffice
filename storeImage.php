<?php
include "dbconfig.php";
   $id_pc=$_POST['id_pc'];
    $img = $_POST['image'];
    $folderPath = "img_cam/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = $id_pc . '.jpg';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
    $sqladd="update `ddpost`.`parcel` set img_pc=1 WHERE id_pc=$id_pc";
    //echo "$sqladd";
        $resultadd=mysqli_query($connect,$sqladd);
    print_r($fileName);
  
?>