<?php
session_start();
unset($_SESSION['sess_userid']);
unset($_SESSION['sess_username']);
session_destroy();
?>
<script language="JavaScript">
  alert("Logout Completed")
</script>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php">