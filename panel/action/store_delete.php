<?php
require_once __DIR__ . '/../settings/config.php'; // Dosya yolu için __DIR__ kullanıldı.

/**
 * Mağaza kaydını siler.
 * 
 * @param int $store_id Mağaza ID'si
 * 
 * @return bool Silme işlemi başarılı ise true, aksi halde false döner.
 */
function deleteStore(int $store_id): bool
{
    $db = Database::getInstance(); // Singleton tasarım deseni kullanarak veritabanı bağlantısını alır.
    $delete = $db->exec("DELETE FROM stores WHERE store_id = $store_id");

    if ($delete) {
        $db->exec("DELETE FROM plaka WHERE store_id = $store_id");
        header('location:http://localhost/panel/store_list.php?durum=1');
        exit(); // header() fonksiyonu sonrası işlemler devam etmemeli. Bu yüzden exit() kullanılır.
    }

    return false;
}

// GET isteği ile gönderilen veriler alınır ve işlenir.
$store_id = intval($_GET['store_id'] ?? 0);

// Silme işlemi gerçekleştirilir.
deleteStore($store_id);
