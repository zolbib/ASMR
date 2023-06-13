<?php
session_start();


// Connect to the database
$serverName = "LAPTOP-VER9JBS9\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array( "Database"=>"ASMR", "UID"=>"reda1234", "PWD"=>"reda1234");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established purr .<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}



// Get user input
if (isset($_POST['last_name']) && !empty($_POST['last_name'])) {
  $last_name = $_POST['last_name'];
  // continue with your code
} else {
  echo "Last name is required.";
}

// Get user inputs from form
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$username = $_POST['username'];
$password = $_POST['password'];




ini_set('error_reporting', E_ALL);
// Insert user input into database
$sql_verification = "select * from Person where utilisateur= '$username'";

$stmt = sqlsrv_prepare( $conn, $sql_verification/*, array( &$user, &$pass)*/);

//checking for errors in the statement and the sql server execution
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (sqlsrv_execute($stmt) === false) {
     die(print_r(sqlsrv_errors(), true));
} 

//a counter variable to count the number of rows in the returned array/table from sql server
$i=0;


// A loop to see how many rows have been returned
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $i++;
}
// a small test to see if the returned table has any rows => if > 0 ; the user exists, else the user does exist/wrong login 
//and goes back to the login page with an error
if($i==0){
    unset($_SESSION['exist']);
    $sql = "INSERT INTO Person(nom, prenom,utilisateur,mdp) VALUES ('$last_name', '$first_name', '$username' , '$password')";

    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === FALSE) {
      $errors = sqlsrv_errors();
      foreach ($errors as $error) {
        echo "SQLSTATE: " . $error['SQLSTATE'] . "<br />";
        echo "code: " . $error['code'] . "<br />";
        echo "message: " . $error['message'] . "<br />";
      }
    } else {
        header("location: login.php?success=1");
    }
}
else{

    echo('ce nom dutilisateur est deja utilise ');
    $_SESSION['exist'] = 'ce nom dutilisateur est deja utilise' ; 
    header("location: create_account.php");
}



// Close connection
sqlsrv_close($conn);

?>