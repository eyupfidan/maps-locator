<?php require('../settings/config.php');  ?>
<?php 
$api_key = $_POST['api_key'];
$update = $db->prepare("UPDATE api_key SET api_key = ?");
$update_check = $update->execute(array(
    $api_key
));
if ($update){
    $last_id = $db->lastInsertId();
    header('location:http://localhost/panel/api/'); 
}
?>