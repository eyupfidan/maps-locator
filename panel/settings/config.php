<?php
// Start the session
session_start();
try {
     $db = new PDO("mysql:host=localhost;charset=utf8;dbname=, "", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}

?>