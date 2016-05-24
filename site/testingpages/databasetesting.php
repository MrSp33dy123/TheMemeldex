<center>----------This page is purely for testing SQL databases, and has no real formatting. That is to say; don't expect to understand anything on this page at all. <a href="../index">Return</a>----------</center>
<br><br>
<?php
try {
    session_start();
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "userdetails";
    $tablename = "accountinfo";

    // Create connection
    $conn = new mysqli($servername, $username, $password , $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //$sql = "INSERT INTO ".$tablename." (username, password, email, rank)
    //VALUES ('MrSp33dy123', 't3st', 'john@example.com', 'creator');";

    //if ($conn->multi_query($sql) === TRUE) {
    //    echo "New records created successfully";
    //} else {
    //    echo "Error: " . $sql . "<br>" . $conn->error;
    //}

    //--------------------------------------DISPLAY TABLE---------------------------------------------
    $sql = "SELECT id, username, email, rank, password, registerdate FROM ".$tablename." WHERE id = '1'";
    $databaseRecords = $conn->query($sql);

    //while($SQLArray = $databaseRecords->fetch_assoc()) {
    //    echo("Search Result is:" . $SQLArray['username']);
    //}

    $SQLArray = $databaseRecords->fetch_assoc();
    $_SESSION['TESTuserinfo'] = $SQLArray;

    print_r($_SESSION['TESTuserinfo']['password']); //FOR TESTING PURPOSES

    echo gettype($sql);
    echo gettype($databaseRecords);
    echo gettype($conn);
    echo gettype($SQLArray);




    //if ($databaseRecords->num_rows > 0) {
    //    echo "<table><tr><th>ID</th><th>Username</th><th>Email</th><th>Rank</th><th>Password</th><th>Register Date</th></tr>";
        // output data of each row
    //    while($row = $databaseRecords->fetch_assoc()) {
    //        echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["email"]."</td><td>".$row["rank"]."</td><td>".$row["password"]."</td><td>".$row["registerdate"]."</td></tr>";
    //    }
    //    echo "</table>";
    //} else {
    //    echo "0 results";
    //};
    //-----------------------------------------------------------------------------------------------

    $conn->close();
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>

    <!--
    id INT
    username VARCHAR
    password VARCHAR
    email VARCHAR
    rank VARCHAR
    registerdate TIMESTAMP -->
