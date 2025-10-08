<?php
session_start();
include 'includes/fonksiyon.php';

// Oturum kontrolü: Giriş yapılmadıysa login.php'ye yönlendir
oturumKontrol();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Paneli</title>
</head>
<body>
    <h2>Hoşgeldiniz, Admin Paneli!</h2>
    <p>Başarılı bir şekilde giriş yaptınız.</p>
    <a href="logout.php">Çıkış Yap</a>
</body>
</html>