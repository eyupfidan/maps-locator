<?php require('../settings/config.php');  ?>
<?php 

$store_name = $_POST['store_name'];

$store_adress = mb_convert_case(($_POST['store_adress']), MB_CASE_TITLE, "UTF-8");
$store_detail = $_POST['editordata'];
$lat = $_POST['latitude'];
$long = $_POST['longitude'];



$query = $db->prepare("INSERT INTO stores SET
store_name = ?,
store_adress = ?,
store_detail = ?,
latitude = ?,
longitude = ?
");
$insert = $query->execute(array(
    $store_name, $store_adress, $store_detail, $lat, $long
));
if ($insert){
    $last_id = $db->lastInsertId();
    if(isset($_POST['submit'])){
        if(!empty($_POST['skills'])) {
          foreach($_POST['skills'] as $selected){
            $query_plaka = $db->prepare("INSERT INTO plaka SET
            store_id = ?,
            plaka = ?
            ");
            $insert = $query_plaka->execute(array(
                $last_id,$selected
            ));
            
          }          
        } 
      }
    header('location:http://localhost/panel/store_add.php?durum=1'); 
}

?>