
<?php

session_start();
// Connect to the database
$serverName = "ASUS\SQLEXPRESS";
$connectionInfo = array("Database"=>"ASMR", "UID"=>"reda1234", "PWD"=>"reda1234");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if (!$conn) {
    die("<p>Connection failed: " . sqlsrv_errors() . "</p>");
}


$idserie=$_GET['idSerieElem'];
$id_person=$_SESSION['id_person'];


// Execute the SQL query (replace with your own query)
$sql = "INSERT INTO serie_liked  VALUES ($idserie,$id_person) ";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die("Error executing SQL query: " . print_r(sqlsrv_errors(), true));
}

// Close the database connection
sqlsrv_close($conn);
?>
