<?php require ('../settings/config.php');
$store_id = $_GET['store_id'];
$store_name = $_POST['store_name'];
$store_adress = $_POST['store_adress'];
$store_detail = $_POST['editordata'];
$lat = $_POST['latitude'];
$long = $_POST['longitude'];

$update = $db->prepare("UPDATE stores SET store_name = ?, store_adress = ?, store_detail = ?, latitude = ?, longitude = ? WHERE store_id ='$store_id'");
$update_check = $update->execute(array(
    $store_name,
    $store_adress,
    $store_detail,
    $lat,
    $long
));

if ($update)
{
    $delete_plaka = $db->exec("DELETE FROM plaka WHERE store_id =$store_id ");
    if(isset($_POST['submit'])){
        if(!empty($_POST['skills'])) {
          foreach($_POST['skills'] as $selected){
            $query_plaka = $db->prepare("INSERT INTO plaka SET
            store_id = ?,
            plaka = ?
            ");
            $insert = $query_plaka->execute(array(
                $store_id,$selected
            ));
            
          }          
        } 
      }
    header('location:http://localhost/panel/store_edit.php?durum=1&store_id=' . $store_id);
}
?>
