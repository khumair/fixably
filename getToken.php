<?php
include 'functions.php';
$tokenData = fetch_token();
$token = $tokenData['token'];
echo 'your Token: '.$token;
session_start();
$_SESSION['token'] = $token;

?>