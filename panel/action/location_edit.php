<?php require('../settings/config.php');  ?>
<?php 
$konum_id = $_GET['konum_id'];
$konum_plaka = $_POST['konum_plaka'];
$konum_name= mb_strtoupper($_POST['konum_name']);
$update = $db->prepare("UPDATE locations SET konum_adi = ?, plaka = ? WHERE konum_id ='$konum_id'");
$update_check = $update->execute(array(
    $konum_name, $konum_plaka 
));
if ($update){
    $last_id = $db->lastInsertId();
    header('location:http://localhost/panel/location_view.php'); 
}
?>