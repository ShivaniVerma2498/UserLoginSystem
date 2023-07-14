<?php
session_start();
$_SESSION['login']=="";
session_unset();
?>
<script language="javascript">
window.location="index.php";
</script>