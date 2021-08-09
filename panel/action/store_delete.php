<?php require('../settings/config.php');  ?>
<?php 
$store_id = $_GET['store_id'];

$delete = $db->exec("DELETE FROM stores WHERE store_id =$store_id ");
if($delete){

        $delete_plaka = $db->exec("DELETE FROM plaka WHERE store_id =$store_id ");

    header('location:http://localhost/panel/store_list.php?durum=1');
}
?>
