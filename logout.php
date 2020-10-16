<?php
session_start();
session_unset();
header("refresh:3; url = login.php");
?>
