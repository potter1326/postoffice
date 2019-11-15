<?php
error_reporting (E_ALL ^ E_NOTICE);
$loginclick=$_POST['loginclick'];
$user_login=$_POST['user_login'];
$pass_login=$_POST['pass_login'];
//include "haeder.html";
//echo $user_login;
if(!$loginclick) {
}else{
	if($user_login=="" OR $pass_login=="") {
		?>
<script language="JavaScript">
  alert("กรุณากรอกข้อมูลให้ครบด้วยค่ะ")
</script>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php">
		<?php
	}else{
			include "dbconfig.php";
			$sql="select * from `ddpost`.`user` where username_user='$user_login'";
			$result=mysqli_query($connect,$sql);
			$num=mysqli_num_rows($result);
			$db=mysqli_fetch_array($result);
			if($num<=0) {
				?>
					<script language="JavaScript">
					alert("ไม่มี Username นี้ในระบบค่ะ")
					</script>
				<META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php">
				<?php
			}else{
					if($db['pass_user'] != $pass_login) {
						?>
					<script language="JavaScript">
					alert("รหัสผ่านไม่ถูกต้องค่ะ")
					</script>
				<META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php">
				<?php
					}else{
						session_start();
						$_SESSION['sess_userid']=session_id();
						$_SESSION['sess_username']=$user_login;
						//header("Location: main.php");
						//echo $user_login;
						?>
                        
                        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=main.php">
                        
                        <?php
						}
				}
		}
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />