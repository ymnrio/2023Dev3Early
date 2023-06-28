<?php
session_start();
$_SESSION = array();
session_destroy();
header('Location:01_トップ画面.php');
?>