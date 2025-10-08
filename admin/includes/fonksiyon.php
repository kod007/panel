<?php
// Ortak fonksiyonlar burada tanımlanacak

/**
 * Güvenli giriş için veri temizleme
 */
function temizle($veri) {
    return htmlspecialchars(trim($veri), ENT_QUOTES, 'UTF-8');
}

/**
 * Oturum kontrolü
 */
function oturumKontrol() {
    if (!isset($_SESSION['admin_id'])) {
        header('Location: /admin/login.php');
        exit;
    }
}

/**
 * Flash mesaj gösterimi
 */
function flashMesaj($tip, $mesaj) {
    echo "<div class='alert alert-{$tip}'>{$mesaj}</div>";
}
?>