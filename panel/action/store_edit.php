<?php
require_once __DIR__ . '/../settings/config.php'; // Dosya yolu için __DIR__ kullanıldı.

/**
 * Mağaza kaydını günceller.
 * 
 * @param int $store_id Mağaza ID'si
 * @param string $store_name Mağaza adı
 * @param string $store_adress Mağaza adresi
 * @param string $store_detail Mağaza detayı
 * @param float $latitude Enlem bilgisi
 * @param float $longitude Boylam bilgisi
 * @param array $plaka_list Plaka kodları listesi
 * 
 * @return bool Güncelleme işlemi başarılı ise true, aksi halde false döner.
 */
function updateStore(int $store_id, string $store_name, string $store_adress, string $store_detail, float $latitude, float $longitude, array $plaka_list): bool
{
    $db = Database::getInstance(); // Singleton tasarım deseni kullanarak veritabanı bağlantısını alır.
    $update = $db->prepare("UPDATE stores SET store_name = ?, store_adress = ?, store_detail = ?, latitude = ?, longitude = ? WHERE store_id = ?");
    $update_check = $update->execute([$store_name, $store_adress, $store_detail, $latitude, $longitude, $store_id]);

    if ($update_check) {
        $db->exec("DELETE FROM plaka WHERE store_id = $store_id");
        if (isset($_POST['submit']) && !empty($_POST['skills'])) {
            foreach ($_POST['skills'] as $selected) {
                $query_plaka = $db->prepare("INSERT INTO plaka SET store_id = ?, plaka = ?");
                $insert = $query_plaka->execute([$store_id, $selected]);
            }
        }
        header('location:http://localhost/panel/store_edit.php?durum=1&store_id=' . $store_id);
        exit(); // header() fonksiyonu sonrası işlemler devam etmemeli. Bu yüzden exit() kullanılır.
    }

    return false;
}

// POST isteği ile gönderilen veriler alınır ve işlenir.
$store_id = intval($_GET['store_id'] ?? 0);
$store_name = trim($_POST['store_name'] ?? '');
$store_adress = trim($_POST['store_adress'] ?? '');
$store_detail = trim($_POST['editordata'] ?? '');
$latitude = floatval($_POST['latitude'] ?? 0.0);
$longitude = floatval($_POST['longitude'] ?? 0.0);
$plaka_list = $_POST['skills'] ?? [];

// Mağaza güncelleme işlemi gerçekleştirilir.
updateStore($store_id, $store_name, $store_adress, $store_detail, $latitude, $longitude, $plaka_list);
