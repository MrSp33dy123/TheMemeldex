<?php
try {
    $SQLservername = "127.0.0.1";
    $SQLusername = "root";
    $SQLpassword = "";
    $SQLdbname = "USERDETAILS";
    $tableinfo1 = [
        "ACCOUNTINFO", // The table name
        "ID int(10) AUTO_INCREMENT",
        "USERCODE varchar(8) NOT NULL",
        "USERNAME varchar(100) NOT NULL",
        "PASSWORD varchar(255) NOT NULL",
        "EMAIL varchar(255) NOT NULL",
        "SHORTBIO varchar(255)",
        "LONGBIO TEXT",
        "RANK INT(3) NOT NULL DEFAULT 0",
        "REGISTERDATE TIMESTAMP",
        "TIMEZONE varchar(32) NOT NULL",
        "PRIMARY KEY (ID)"
    ];
    
    //SETUP CONNECTION
    $conn = new mysqli($SQLservername, $SQLusername, $SQLpassword);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    //CREATE TABLE OR DATABASE IF NOT EXISTS
    $conn->query("CREATE DATABASE IF NOT EXISTS ".$SQLdbname);
    $conn->select_db($SQLdbname);
    if (empty($conn->query("SELECT ID FROM ".$tableinfo1[0]))) {
        echo $tableinfo1[0]." table not found, creating now! Database ".$SQLdbname." may have been created as well.";
        $sql = "CREATE TABLE " . $tableinfo1[0] . " (" . implode(",",array_slice($tableinfo1, 1)) . ")";
        if (! $conn->query($sql)) {
            printf("SQL create table failure: %s\n", $conn->error);
        }
    }
    
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>
