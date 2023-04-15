<?php 
/**
 * Get the list of locations based on the selected city.
 *
 * @param int $city_id The ID of the selected city.
 * @param PDO $db The PDO object used to access the database.
 *
 * @return array The list of locations for the selected city.
 */
function getLocations($city_id, $db) {
    try {
        $statement = $db->prepare("SELECT * FROM locations WHERE konum_parent = :city_id");
        $statement->bindValue(':city_id', $city_id, PDO::PARAM_INT);
        $statement->execute();
        $locations = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $locations;
    } catch (PDOException $e) {
        // handle the exception here
    }
}
?>

<select name="location">
    <?php 
        $city_id = $_GET['city_id'];
        $locations = getLocations($city_id, $db);
        
        foreach ($locations as $location) {
            $location_id = $location['konum_id'];
            $location_name = $location['konum_adi'];
            
            echo '<option value="' . $location_id . '">' . $location_name . '</option>';
        }
    ?>
</select>
