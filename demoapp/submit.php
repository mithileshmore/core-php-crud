<?php
include 'dbconn.php';
mysqli_select_db($conn, 'test_db');
$name      = $_POST['name'];
$email     = $_POST['email'];
$password  = $_POST['password'];
$salary    = $_POST['salary'];
$telephone = $_POST['telephone'];
$hobby     = $_POST['hobby'];
$hobby     = "";
$telephone = "";
$message   = "";
$sql_exist = "select emp_email from user WHERE emp_email='" . $_POST['email'] . "' ";
$result    = mysqli_query($conn, $sql_exist);
$rowcount  = mysqli_num_rows($result);
if ($rowcount > 0) {
    $message = 'Username exists!';
    echo "<script type='text/javascript'>alert('" . $message . "');</script>";
    header("refresh:1; url=register.html");
}
if ($message == NULL) {
    if (isset($_FILES['picture'])) {
        $errors    = array();
        $file_name = $_FILES['picture']['name'];
        $file_tmp  = $_FILES['picture']['tmp_name'];
        $file_type = $_FILES['picture']['type'];
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, __DIR__ . "\pictures\FF.JPG");
            echo "\nSuccessfully uploaded picture..\n";
        } else {
            print_r($errors);
        }
    }
    $sql = "INSERT INTO user (emp_name, emp_email, emp_password) VALUES ('" . $name . "','" . $email . "','" . $password . "')";
    mysqli_select_db($conn, 'user');
    $retval = mysqli_query($conn, $sql);
    if (!$retval) {
        die('Could not enter data: ' . mysqli_error($conn));
    }
    echo "\nEntered login details into database successfully..\n";
    header("refresh:1; url=login.html");
}
mysqli_close($conn);
?
