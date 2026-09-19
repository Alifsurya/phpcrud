<?php
session_start();
$_SESSION = []; //ada beberapa kasus
session_unset();
session_destroy();
header("Location: login.php");
exit;
?>
