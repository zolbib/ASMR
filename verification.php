<?php
session_start();

$serverName = "LAPTOP-VER9JBS9\SQLEXPRESS"; // serverName\instanceName
$connectionInfo = array("Database"=>"ASMR", "UID"=>"reda1234", "PWD"=>"reda1234");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn) {
    echo "Connection established.<br />";
} else {
    echo "Connection could not be established.<br />";
    die(print_r(sqlsrv_errors(), true));
}

// Get input values from login page
$user = $_POST['username'];
$pass = $_POST['password'];

// SQL query to check if the user exists in Person table
$sql = "SELECT * FROM Person WHERE utilisateur = '$user' AND mdp = '$pass'";

// Prepare the SQL query
$stmt = sqlsrv_prepare($conn, $sql);

// Check for errors in the statement and the SQL server execution
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (sqlsrv_execute($stmt) === false) {
    die(print_r(sqlsrv_errors(), true));
} 

// Fetch the user's data from the Person table
$person_row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

// Check if the user exists in Person table
if (empty($person_row)) {
    echo ('Cet utilisateur n\'existe pas');
    $_SESSION['error'] = 'Wrong Login, Try again.'; 
    header("location: login.php");
    exit(); // Stop executing the rest of the code
}

$id_person = $person_row['id_person'];

$_SESSION['id_person']=$person_row['id_person'];
// SQL query to check if the user exists in Serie_liked table
$sql_liked_check = "SELECT * FROM Serie_liked WHERE id_person = ?";
$params_liked_check = array($id_person);
$stmt_liked_check = sqlsrv_prepare($conn, $sql_liked_check, $params_liked_check);

// Check for errors in the statement and the SQL server execution
if ($stmt_liked_check === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (sqlsrv_execute($stmt_liked_check) === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Count the number of liked rows returned
$liked_rows = 0;

while ($row_liked_check = sqlsrv_fetch_array($stmt_liked_check, SQLSRV_FETCH_ASSOC)) {
    $liked_rows++;
}

// Check if the user exists in Serie_liked table
if ($liked_rows > 0) {
    unset($_SESSION['error']);
    header("location: welcome.php");
    exit(); // Stop executing the rest of the code
} else {
    // User exists in the Person table but not in Serie_liked table
    // You can add additional checks here if needed
    // ...
    header("location: first_visit.php");
    exit(); // Stop executing the rest of the code
}
?>
