<?php
error_reporting(E_ALL & ~E_NOTICE);

try {
    include("activatedatabase.php");
    $findUsername = $_GET['username'];
    
    //--------------------------------------BEGIN QUERY---------------------------------------------
    $sql = "SELECT * FROM ".$tableinfo1[0]." WHERE USERNAME = '".$findUsername."'";
    $databaseRecords = $conn->query($sql);
    
    if ($databaseRecords->num_rows == 0) {
        echo 'TRUE';
    } else {
        echo 'FALSE';
    }
    
    $conn->close();
    
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>
