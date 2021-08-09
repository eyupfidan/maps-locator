<?php
header('Access-Control-Allow-Origin: *');
include ('panel/settings/config.php');
$city_id = $_GET['city_id'];
$city_list = "";
$query = $db->query("SELECT * FROM plaka INNER JOIN stores ON plaka.store_id = stores.store_id WHERE plaka.plaka = $city_id ", PDO::FETCH_ASSOC);
if($query->rowCount() > 0)
{
echo '<div class="container">
<table class="table">
<thead class="thead-dark">
<tr>
        <th scope="col">Bayi Unvanı</th>
        <th scope="col">Detay</th>
        <th scope="col">Çalıştığı İller</th>
        <th scope="col">Maps</th>
      </tr>';
foreach ($query as $row)
{
    $store_id = $row['store_id'];
    $query_pl = $db->query("SELECT * FROM plaka WHERE store_id=$store_id");
    $store_name = $row['store_name'];
    $store_address = $row['store_adress'];
    $lat = $row['latitude'];
    $long = $row['longitude'];
    $plaka = $row['plaka'];
    foreach($query_pl as $qua)
    {
        $son_pl = $qua['plaka'];
        $query_ct = $db->query("SELECT * FROM locations WHERE plaka=$son_pl");
        {
            foreach($query_ct as $ct)
            {
                if($ct['konum_adi'] == "İSTANBUL")
                {
                    $city_list = $ct['konum_adi'];
                }
                else {
                    $city_list .= $ct['konum_adi'] . " ";
                }
            }
        }

    }
    echo '</thead>
    <tbody>
      <tr>
        <td>'.$store_name.'</td>
        <td>'.$store_address.'</td>
        <td>'.$city_list.'</td>
        <td><a href="https://www.google.com/maps/search/'.$lat.','.$long.'" target="_blank" ><img src="img/map.svg" width="20px" height="20px" ></a></td>
      </tr>';
}
echo '</tbody>
</table></div>';
}
else {
    echo '<div class="container">
    <div class="alert alert-warning" role="alert">
  Bu ilde bayimiz bulunmamaktadır.
</div>
</div>';
}
?>