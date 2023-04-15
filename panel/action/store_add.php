<?php
require_once __DIR__ . '/../settings/config.php'; // Dosya yolu için __DIR__ kullanıldı.

/**
 * Yeni bir mağaza kaydeder.
 * 
 * @param string $store_name Mağaza adı
 * @param string $store_adress Mağaza adresi
 * @param string $store_detail Mağaza detayı
 * @param float $latitude Enlem bilgisi
 * @param float $longitude Boylam bilgisi
 * @param array $plaka_list Plaka kodları listesi
 * 
 * @return bool Ekleme işlemi başarılı ise true, aksi halde false döner.
 */
function addNewStore(string $store_name, string $store_adress, string $store_detail, float $latitude, float $longitude, array $plaka_list): bool
{
    $db = Database::getInstance(); // Singleton tasarım deseni kullanarak veritabanı bağlantısını alır.
    $stmt = $db->prepare("INSERT INTO stores SET store_name = ?, store_adress = ?, store_detail = ?, latitude = ?, longitude = ?");
    $result = $stmt->execute([$store_name, $store_adress, $store_detail, $latitude, $longitude]);

    if ($result) {
        $last_id = $db->lastInsertId();
        if (isset($_POST['submit']) && !empty($_POST['skills'])) {
            foreach ($_POST['skills'] as $selected) {
                $query_plaka = $db->prepare("INSERT INTO plaka SET store_id = ?, plaka = ?");
                $insert = $query_plaka->execute([$last_id, $selected]);
            }
        }
        header('location:http://localhost/panel/store_add.php?durum=1');
        exit(); // header() fonksiyonu sonrası işlemler devam etmemeli. Bu yüzden exit() kullanılır.
    }

    return false;
}

// POST isteği ile gönderilen veriler alınır ve işlenir.
$store_name = trim($_POST['store_name'] ?? '');
$store_adress = mb_convert_case(trim($_POST['store_adress'] ?? ''), MB_CASE_TITLE, "UTF-8");
$store_detail = trim($_POST['editordata'] ?? '');
$latitude = floatval($_POST['latitude'] ?? 0.0);
$longitude = floatval($_POST['longitude'] ?? 0.0);
$plaka_list = $_POST['skills'] ?? [];

// Mağaza ekleme işlemi gerçekleştirilir.
addNewStore($store_name, $store_adress, $store_detail, $latitude, $longitude, $plaka_list);
