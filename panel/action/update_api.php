<?php
require_once __DIR__ . '/../settings/config.php'; // Dosya yolu için __DIR__ kullanıldı.

/**
 * API anahtarını günceller.
 * 
 * @param string $api_key API anahtarı
 * 
 * @return bool Güncelleme işlemi başarılı ise true, aksi halde false döner.
 */
function updateApiKey(string $api_key): bool
{
    $db = Database::getInstance(); // Singleton tasarım deseni kullanarak veritabanı bağlantısını alır.
    $update = $db->prepare("UPDATE api_key SET api_key = ?");
    $update_check = $update->execute([$api_key]);

    if ($update_check) {
        header('location:http://localhost/panel/api/');
        exit(); // header() fonksiyonu sonrası işlemler devam etmemeli. Bu yüzden exit() kullanılır.
    }

    return false;
}

// POST isteği ile gönderilen veriler alınır ve işlenir.
$api_key = trim($_POST['api_key'] ?? '');

// API anahtarı güncelleme işlemi gerçekleştirilir.
updateApiKey($api_key);
