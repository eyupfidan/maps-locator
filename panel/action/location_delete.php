<?php
require_once __DIR__ . '/../settings/config.php'; // Dosya yolu için __DIR__ kullanıldı.

/**
 * Konum kaydını siler.
 * 
 * @param int $konum_id Konum ID'si
 * 
 * @return bool Silme işlemi başarılı ise true, aksi halde false döner.
 */
function deleteLocation(int $konum_id): bool
{
    $db = Database::getInstance(); // Singleton tasarım deseni kullanarak veritabanı bağlantısını alır.
    $delete = $db->exec("DELETE FROM locations WHERE konum_id = $konum_id");

    if ($delete) {
        header('location:http://localhost/panel/location_view.php');
        exit(); // header() fonksiyonu sonrası işlemler devam etmemeli. Bu yüzden exit() kullanılır.
    }

    return false;
}

// GET isteği ile gönderilen veriler alınır ve işlenir.
$konum_id = intval($_GET['konum_id'] ?? 0);

// Silme işlemi gerçekleştirilir.
deleteLocation($konum_id);
