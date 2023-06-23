<?php
session_start();
session_destroy();
header('Location:01_トップ画面.php');
?>