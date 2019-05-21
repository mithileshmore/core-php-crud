<?php
include 'dbconn.php';
mysqli_select_db($conn, 'test_db');
include 'dbconn.php';

$name = $_POST['name'];
$email = $_POST['email'];
$salary = $_POST['salary'];
$telephone = $_POST['telephone'];
$hobby = $_POST['hobby'];
$textarea = $_POST['textarea'];

if(isset($_POST['updatenewdata'])) {
    $message = "";
    $sql_exist = " select emp_email from employee WHERE emp_email='".$_POST['email']."' ";
    $result=mysqli_query($conn, $sql_exist);
    $rowcount= mysqli_num_rows($result);
    if($rowcount > 0) {
        $message = 'Username exists!';
        echo "<script type='text/javascript'>alert('".$message."');</script>";
        header("refresh:1; url=updatenewform.php");
    }
    if($message == NULL) {
        $array = implode(' , ', $_POST['arr']);
        $array2 = implode(' , ', $_POST['places']);
        $sql = "INSERT INTO employee (emp_name, emp_email, emp_salary, emp_telephone, emp_hobby, emp_checks, emp_textarea, emp_places) VALUES ('".$name."','".$email."','".$salary."','".$telephone."','".$hobby."','".$array."','".$textarea."','".$array2."')";
        mysqli_select_db($conn, 'test_db');
        $retval = mysqli_query($conn, $sql);
        if(! $retval ) {
            die('Could not enter data: ' . mysqli_error($conn));
        }
       echo "\nEntered data successfully..\n";
       header("refresh:1; url=view.php");
    }
mysqli_close($conn);
}
?>
