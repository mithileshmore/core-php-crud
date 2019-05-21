<?php
include 'dbconn.php';
$sql = "DELETE FROM employee";
mysqli_select_db($conn, 'test_db');
$retval = mysqli_query($conn, $sql);
if(! $retval ) {
    die('Could not delete data: ' . mysqli_error($conn));
}
    echo "\nEntered data successfully\n";
    Print '<script>window.location.assign("login.html");</script>'; 
    mysqli_close($conn);
?>
