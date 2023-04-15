<?php
require_once __DIR__ . '/../settings/config.php'; // Dosya yolu için __DIR__ kullanıldı.

/**
 * Konum kaydını günceller.
 * 
 * @param int $konum_id Konum ID'si
 * @param string $konum_adi Konum adı
 * @param string $plaka Plaka kodu
 * 
 * @return bool Güncelleme işlemi başarılı ise true, aksi halde false döner.
 */
function updateLocation(int $konum_id, string $konum_adi, string $plaka): bool
{
    $db = Database::getInstance(); // Singleton tasarım deseni kullanarak veritabanı bağlantısını alır.
    $stmt = $db->prepare("UPDATE locations SET konum_adi = ?, plaka = ? WHERE konum_id = ?");
    $result = $stmt->execute([$konum_adi, $plaka, $konum_id]);

    if ($result) {
        header('location:http://localhost/panel/location_view.php');
        exit(); // header() fonksiyonu sonrası işlemler devam etmemeli. Bu yüzden exit() kullanılır.
    }

    return false;
}

// GET ve POST istekleri ile gönderilen veriler alınır ve işlenir.
$konum_id = intval($_GET['konum_id'] ?? 0);
$konum_plaka = trim($_POST['konum_plaka'] ?? '');
$konum_name = mb_strtoupper(trim($_POST['konum_name'] ?? ''));

// Güncelleme işlemi gerçekleştirilir.
updateLocation($konum_id, $konum_name, $konum_plaka);
