<?php
session_start();

$_SESSION['trash'] = $_POST['trash'];

header('Location:05_プロフィール画面.php');
?>