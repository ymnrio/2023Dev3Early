<?php
session_start();

$_SESSION = array();
session_destroy();
unset($_SESSION['user']['id']);
header('Location:01_トップ画面.php');
?>