<?php
require_once __DIR__ . '/../settings/config.php'; // Dosya yolu için __DIR__ kullanıldı.

/**
 * Yeni bir konum kaydeder.
 * 
 * @param string $konum_adi Konum adı
 * @param string $plaka Plaka kodu
 * 
 * @return bool Ekleme işlemi başarılı ise true, aksi halde false döner.
 */
function addNewLocation(string $konum_adi, string $plaka): bool
{
    $db = Database::getInstance(); // Singleton tasarım deseni kullanarak veritabanı bağlantısını alır.
    $stmt = $db->prepare("INSERT INTO locations SET konum_adi = ?, plaka = ?");
    $result = $stmt->execute([$konum_adi, $plaka]);

    if ($result) {
        header('location:http://localhost/panel/location_view.php');
        exit(); // header() fonksiyonu sonrası işlemler devam etmemeli. Bu yüzden exit() kullanılır.
    }

    return false;
}

// POST isteği ile gönderilen veriler alınır ve işlenir.
$konum_adi = mb_strtoupper(trim($_POST['konum_name'] ?? ''));
$plaka = trim($_POST['konum_plaka'] ?? '');

// Ekleme işlemi gerçekleştirilir.
addNewLocation($konum_adi, $plaka);
