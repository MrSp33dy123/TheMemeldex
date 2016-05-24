<?php
error_reporting(E_ALL & E_NOTICE);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        //Set up variables
        $inputUsername = $_POST['username'];
        $inputPassword = $_POST['password'];
        $inputEmail = $_POST['email'];
        $inputShortBio = $_POST['shortbio'];
        $inputLongBio = $_POST['longbio'];
        $inputTimezone = $_POST['timezone'];
        $usernameMatches = 99;
        $seed = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_');
        shuffle($seed);
        $userCode = "";
        foreach (array_rand($seed, 8) as $k) $userCode .= $seed[$k];
        echo("RAND: $userCode\n");

        //Initialize database: $conn, $tableinfo1
        include("activatedatabase.php");
        
        echo("Username: $inputUsername\n");

        $SQLprep['checkFieldsUntaken'] = $conn->prepare("SELECT ID FROM ".$tableinfo1[0]." WHERE USERNAME=? OR EMAIL=?");
        $SQLprep['checkFieldsUntaken']->bind_param("ss", $inputUsername, $inputEmail);
        $SQLprep['checkFieldsUntaken']->execute();       
        $SQLprep['checkFieldsUntaken']->store_result();
        $usernameMatches = $SQLprep['checkFieldsUntaken']->num_rows;
        $SQLprep['checkFieldsUntaken']->close();
        
        echo("UsernameMatches: $usernameMatches\n");
        echo("Prepared statements passed.\n");
        
        if ((strlen($inputUsername) > 2 && $usernameMatches == 0) && (strlen($inputPassword) > 6 && stripos($inputPassword, "abcd") == false && stripos($inputPassword, "1234") == false) && (strlen($inputEmail) > 5 && stripos($inputEmail, "@") != false) && (strlen($inputShortBio) <= 250)) {
            
            echo("Input Valid \n");

            $SQLprep['insertUserInfo'] = $conn->prepare("INSERT INTO ".$tableinfo1[0]." (USERCODE, USERNAME, PASSWORD, EMAIL, SHORTBIO, LONGBIO, TIMEZONE) VALUES (?,?,?)");
            
            $SQLinsertRecord = $conn->query("INSERT INTO ".$tableinfo1[0]." (USERCODE, USERNAME, PASSWORD, EMAIL, SHORTBIO, LONGBIO, TIMEZONE)".
                " VALUES ('".
                $userCode."','".
                htmlspecialchars($inputUsername, ENT_QUOTES)."','".
                htmlspecialchars($inputPassword, ENT_QUOTES)."','".
                htmlspecialchars($inputEmail, ENT_QUOTES)."','".
                htmlspecialchars($inputShortBio, ENT_QUOTES)."','".
                htmlspecialchars($inputLongBio, ENT_QUOTES)."','".
                htmlspecialchars($inputTimezone, ENT_QUOTES)."')");

            if (!$conn->query($SQLinsertRecord)) {
                printf("SQL query failure: %s\n", $conn->error);
            }

        } else {
            echo "The server has detected that one or more of the fields are invalid. If you have modified the client-side code of the website, this is most likely what is causing the problem. If you have not done so however, please contact the website administrator so we can get the bug fixed as soon as possible.\n";
        }
        $conn->close();
        
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo('<p>This page is for use as part of a POST request; it is not supposed to be viewed in the browser. <a href="..">Return to homepage</a>');
}

/*
        "ACCOUNTINFO", // The table name
        "ID int(10) AUTO_INCREMENT", 
        "USERNAME varchar(100) NOT NULL",
        "PASSWORD varchar(512) NOT NULL",
        "EMAIL varchar(256) NOT NULL",
        "SHORTBIO varchar(512)",
        "LONGBIO varchar(4096)",
        "RANK int(3) DEFAULT '0'",
        "REGISTERDATE DATE NOT NULL",
        "TIMEZONE varchar(32) NOT NULL",
        "PRIMARY KEY (ID)"     
*/
?>