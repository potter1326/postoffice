<?php

$dbhost="10.100.5.32";
$dbuser="dupost";
$dbpass="BorbCrt.722";
$dbname="ddpost";
$connect=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$charset = "SET NAMES'utf8'";
mysqli_query($connect,$charset) or die('Invalid query: ' . mysqli_connect_error());


if (!$connect) {
	echo "ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้";
	exit();
}


/*
	$objConnect = mysqli_connect("localhost","dupost","BorbCrt.722","ddpost");
	if($objConnect)
	{
		echo "Database Connected.";
	}
	else
	{
		echo "Database Connect Failed.";
	}

	mysqli_close($objConnect);


*/

mysqli_close($link);

?>