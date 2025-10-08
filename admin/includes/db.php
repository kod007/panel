<?php
// Veritabanı bağlantı ayarları
$host = 'localhost';
$db   = 'panel_db';
$user = 'root';
$pass = '';

// PDO ile bağlantı oluşturma
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    // Bağlantı hatası durumunda hata mesajı
    die('Veritabanı bağlantı hatası: ' . $e->getMessage());
}
?>