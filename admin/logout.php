<?php
include("inc_session.php");
include("inc_logaccesos.php");
session_destroy();
header("location:login.php?msg=2");
exit;
?>