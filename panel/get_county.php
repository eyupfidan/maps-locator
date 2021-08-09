<?php require('settings/config.php'); 

$get_city = $_GET['city_id'];
$konumlar_list = $db->query("SELECT * FROM locations WHERE konum_parent = $get_city", PDO::FETCH_ASSOC);
?> 



<?php foreach($konumlar_list as $row){ ?>
    <option value="<?php echo $row['konum_id']; ?>"><?php echo $row['konum_adi']; ?></option>
<?php } ?>
