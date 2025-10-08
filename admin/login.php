<?php
session_start();
include 'includes/db.php';
include 'includes/fonksiyon.php';

$hata = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kullanici = temizle($_POST['kullanici'] ?? '');
    $sifre = temizle($_POST['sifre'] ?? '');

    if ($kullanici && $sifre) {
        // Veritabanından kullanıcıyı sorgula
        $sql = "SELECT * FROM users WHERE kullanici_adi = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$kullanici]);
        $user = $stmt->fetch();

        if ($user && password_verify($sifre, $user['sifre'])) {
            $_SESSION['admin_id'] = $user['id'];
            header('Location: index.php');
            exit;
        } else {
            $hata = 'Kullanıcı adı veya şifre hatalı!';
        }
    } else {
        $hata = 'Lütfen kullanıcı adı ve şifreyi giriniz!';
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Giriş</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Admin Paneli Giriş</h2>
    <?php if ($hata) flashMesaj('danger', $hata); ?>
    <form method="post">
        <label for="kullanici">Kullanıcı Adı:</label>
        <input type="text" name="kullanici" id="kullanici" required>
        <br>
        <label for="sifre">Şifre:</label>
        <input type="password" name="sifre" id="sifre" required>
        <br>
        <button type="submit">Giriş Yap</button>
    </form>
</body>
</html>