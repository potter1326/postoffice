<?php

require_once 'signature-to-image.php';
$id_pc=$_GET["id_pc"];
//echo $barcode_pc;
$img = sigJsonToImage(file_get_contents("$id_pc"));

// Save to file
//imagepng($img, 'signature.png');

// Output to browser
header('Content-Type: image/png');
imagepng($img);

// Destroy the image in memory when complete
imagedestroy($img);
