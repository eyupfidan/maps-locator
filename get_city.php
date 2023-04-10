<?php
header('Access-Control-Allow-Origin: *');

include('panel/settings/config.php');

$city_id = $_GET['city_id'];

$query = $db->prepare('SELECT * FROM plaka INNER JOIN stores ON plaka.store_id = stores.store_id WHERE plaka.plaka = ?');
$query->execute([$city_id]);

if($query->rowCount() > 0) {
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
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
        <?php foreach ($result as $row): ?>
          <?php
            $store_id = $row['store_id'];
            $store_name = $row['store_name'];
            $store_address = $row['store_adress'];
            $lat = $row['latitude'];
            $long = $row['longitude'];
            $plaka = $row['plaka'];

            $query_pl = $db->prepare('SELECT * FROM plaka WHERE store_id = ?');
            $query_pl->execute([$store_id]);
            $plaka_result = $query_pl->fetchAll(PDO::FETCH_ASSOC);

            $city_list = '';
            foreach ($plaka_result as $qua) {
              $son_pl = $qua['plaka'];

              $query_ct = $db->prepare('SELECT * FROM locations WHERE plaka = ?');
              $query_ct->execute([$son_pl]);
              $ct_result = $query_ct->fetchAll(PDO::FETCH_ASSOC);

              foreach ($ct_result as $ct) {
                if ($ct['konum_adi'] == 'İSTANBUL') {
                  $city_list = $ct['konum_adi'];
                } else {
                  $city_list .= $ct['konum_adi'] . ' ';
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
