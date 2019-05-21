<?php
include 'dbconn.php';
mysqli_select_db($conn, 'test_db');
if (isset($_POST['update'])) {
    header('location: updateform.php ');
}

if (isset($_POST['updation'])) {
    if (isset($_POST['name']) || isset($_POST['email']) || isset($_POST['salary']) || isset($_POST['telephone']) || isset($_POST['arr']) || isset($_POST['hobby']) || isset($_POST['textarea']) || isset($_POST['places'])) {
        $array  = implode(' , ', $_POST['arr']);
        $array2 = implode(' , ', $_POST['places']);
        $sql    = "UPDATE employee SET emp_name='$_POST[name]', emp_salary='$_POST[salary]', emp_email='$_POST[email]', emp_telephone='$_POST[telephone]', emp_checks='$array', emp_hobby='$_POST[hobby]', emp_textarea='$_POST[textarea]', emp_places='$array2' WHERE id='$_POST[id]' ";
        mysqli_query($conn, $sql);
        if (mysqli_query($conn, $sql)) {
            echo 'Just a sec..';
            header("refresh:1; url=view.php");
        }
    }

    if (isset($_FILES['picture'])) {
        $errors    = array();
        $file_name = $_FILES['picture']['name'];
        $file_tmp  = $_FILES['picture']['tmp_name'];
        $file_type = $_FILES['picture']['type'];
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, __DIR__ . "\pictures\FF.JPG");
        } else {
            print_r($errors);
        }
    }
}
?>
