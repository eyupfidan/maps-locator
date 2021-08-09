<?php require('../settings/config.php');  ?>
<?php 
$konum_id = $_GET['konum_id'];

/** ilçe var mı kontrol et */
    $delete = $db->exec("DELETE FROM locations WHERE konum_id =$konum_id ");
    if($delete){
        header('location:http://localhost/panel/location_view.php');
    }
?>