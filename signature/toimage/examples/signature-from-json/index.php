<?php

require_once '../../signature-to-image.php';

$img = sigJsonToImage(file_get_contents('e11'));

// Save to file
//imagepng($img, 'signature.png');

// Output to browser
header('Content-Type: image/png');
imagepng($img);

// Destroy the image in memory when complete
imagedestroy($img);
