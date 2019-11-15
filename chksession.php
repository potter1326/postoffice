<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start();
$sess_userid=$_SESSION['sess_userid'];
$sess_username=$_SESSION['sess_username'];
if($sess_userid<>session_id() or $sess_username=="") {
	?>
		<script language="JavaScript">
			alert("กรุณาเข้าระบบด้วยค่ะ")
		</script>
		<META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php">
	<?php
}
?>