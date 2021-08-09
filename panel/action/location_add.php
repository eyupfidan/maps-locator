<?php include('../settings/config.php');  ?>
<?php 
$konum_name = mb_strtoupper($_POST['konum_name']);
$konum_plaka = $_POST['konum_plaka'];

/** ilçe eklenmiş */
$query = $db->prepare("INSERT INTO locations SET
konum_adi = ?,
plaka = ?");
$insert = $query->execute(array(
    $konum_name, $konum_plaka
));

if ($insert){
    $last_id = $db->lastInsertId();
    header('location:http://localhost/panel/location_view.php'); 
}
?>