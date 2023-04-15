<?php
header('Access-Control-Allow-Origin: *');
include 'panel/settings/config.php';

$city_id = $_GET['city_id'];
$query = $db->prepare('SELECT * FROM plaka INNER JOIN stores ON plaka.store_id = stores.store_id WHERE plaka.plaka = ?');
$query->execute([$city_id]);
$stores = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($stores) > 0) {
  ?>
  <div class="container">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Bayi Unvanı</th>
          <th scope="col">Detay</th>
          <th scope="col">Çalıştığı İller</th>
          <th scope="col">Maps</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($stores as $store): ?>
          <?php
            $store_id = $store['store_id'];
            $store_name = $store['store_name'];
            $store_address = $store['store_adress'];
            $lat = $store['latitude'];
            $long = $store['longitude'];

            $plaka_query = $db->prepare('SELECT * FROM plaka WHERE store_id = ?');
            $plaka_query->execute([$store_id]);
            $plakas = $plaka_query->fetchAll(PDO::FETCH_ASSOC);

            $city_list = '';
            foreach ($plakas as $plaka) {
              $plaka_id = $plaka['plaka'];

              $location_query = $db->prepare('SELECT * FROM locations WHERE plaka = ?');
              $location_query->execute([$plaka_id]);
              $locations = $location_query->fetchAll(PDO::FETCH_ASSOC);

              foreach ($locations as $location) {
                if ($location['konum_adi'] == 'İSTANBUL') {
                  $city_list = $location['konum_adi'];
                } else {
                  $city_list .= $location['konum_adi'] . ' ';
                }
              }
            }
          ?>
          <tr>
            <td><?= $store_name ?></td>
            <td><?= $store_address ?></td>
            <td><?= $city_list ?></td>
            <td><a href="https://www.google.com/maps/search/<?= $lat ?>,<?= $long ?>" target="_blank"><img src="img/map.svg" width="20px" height="20px"></a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php
} else {
?>
  <div class="container">
    <div class="alert alert-warning" role="alert">
      Bu ilde bayimiz bulunmamaktadır.
    </div>
  </div>
<?php
}
?>
