<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
include 'dbconn.php';
mysqli_select_db($conn, 'test_db');
$sql = " select * from user WHERE emp_email='".$email."' ";
$query = mysqli_query($conn, $sql);
$exists = mysqli_num_rows($query);
$table_users = "";
$table_password = "";

if($exists > 0) {
    while($row = mysqli_fetch_assoc($query)) {
    $table_users = $row['emp_email'];
    $table_password = $row['emp_password'];
    }
    if(($email == $table_users) && ($password == $table_password)) {
    $_SESSION['email'] = $table_users; 
    header("location: view.php");
    } else {
        Print '<script>alert("Incorrect Email or Password! Please try again!");</script>'; 
        Print '<script>window.location.assign("login.html");</script>'; 
    }
} else {
    Print '<script>alert("Incorrect Email or Password! Please try again!");</script>'; 
    Print '<script>window.location.assign("login.html");</script>';
}
?>
