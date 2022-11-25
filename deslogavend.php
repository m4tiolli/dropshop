<?php
session_start();
session_destroy();
setcookie("emailv", "", time() -3600);
header("Location: indexvend.php");
?>