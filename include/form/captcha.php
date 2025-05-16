<?php
ob_start(); // Start output buffering meaning no output is sent to the browser immediately.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
$captcha_code = '';
$length = 6;

for ($i = 0; $i < $length; $i++) {
    $captcha_code .= $characters[rand(0, strlen($characters) - 1)];
}

$_SESSION['captcha_code'] = $captcha_code;
echo $captcha_code;

ob_end_flush(); 
?>