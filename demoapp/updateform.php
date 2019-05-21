<?php
session_start();
include 'dbconn.php';
mysqli_select_db($conn, 'test_db');

if(isset($_POST['id'])) {
    $sql = " SELECT * from employee WHERE id='$_POST[id]' ";
    $records = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($records);
}

if(isset($_POST['delete'])) {
    $sql = "DELETE from employee WHERE id= '$_POST[id]' ";
    mysqli_query($conn, $sql);
    if(mysqli_query($conn, $sql)) {
        echo 'Just a sec..';    
        header("location:view.php");
    } else {
        echo 'Not updated.';
    }
}
?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
</head>

<body>
    <div id="grad1">
        <div class="page-header">
            <h1 class="mycontainer center_div">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update Your Details </h1>
        </div>
        <form class="form-horizontal" name="RegForm" action="update.php" method="post" enctype='multipart/form-data'>
            <div class="mycontainer center_div">
                <div class="text-primary">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-5">
                            <input type="text" name="name" class="form-control" placeholder="Enter name" value="<?php echo $row['emp_name']?>" />

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="salary">Salary:</label>
                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="salary" placeholder="Enter salary" value="<?php echo $row['emp_salary']?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="email" placeholder="Enter email" value="<?php echo $row['emp_email']?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Telephone:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="telephone" placeholder="Enter telephone" value="<?php echo $row['emp_telephone']?>" />
                        </div>
                    </div>

                    </br>
                    <input type="hidden" name="id" value=< ?php echo $row[ 'id'] ?>>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="interests">Interest:</label>
                        <div class="col-sm-offset-20 col-sm-10">
                            <div class="button-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"> Select your interests:<span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></button>
                                <?php
                    $mm=explode(' , ', $row['emp_checks']);
                    ?>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#" class="small" data-value="option1" tabIndex="-1">
                                                <input type="checkbox" name="arr[]" <?php echo (in_array( 'PHP', $mm)) ? 'checked' : ''; ?> value="PHP"/>&nbsp;PHP</a>
                                        </li>
                                        <li>
                                            <a href="#" class="small" data-value="option2" tabIndex="-1">
                                                <input type="checkbox" name="arr[]" <?php echo (in_array( 'Java', $mm)) ? 'checked' : ''; ?> value="Java"/>&nbsp;Java</a>
                                        </li>
                                        <li>
                                            <a href="#" class="small" data-value="option3" tabIndex="-1">
                                                <input type="checkbox" name="arr[]" <?php echo (in_array( 'Python', $mm)) ? 'checked' : ''; ?> value="Python"/>&nbsp;Python</a>
                                        </li>
                                        <li>
                                            <a href="#" class="small" data-value="option4" tabIndex="-1">
                                                <input type="checkbox" name="arr[]" <?php echo (in_array( 'R', $mm)) ? 'checked' : ''; ?> value="R"/>&nbsp;R</a>
                                        </li>
                                        <li>
                                            <a href="#" class="small" data-value="option5" tabIndex="-1">
                                                <input type="checkbox" name="arr[]" <?php echo (in_array( 'Julia', $mm)) ? 'checked' : ''; ?> value="Julia"/>&nbsp;Julia</a>
                                        </li>
                                    </ul>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="form-group">
                    <div class="text-primary">
                        <label class="control-label col-sm-2" for="hobby">Select a hobby:</label>
                    </div>

                    <div class="col-sm-offset-20 col-sm-10">
                        <select id="selectCenter" name="hobby">
                            <option <?php if ($row[ 'emp_hobby']=="Swimming" ) echo 'selected' ; ?> value="Swimming">Swimming</option>
                            <option <?php if ($row[ 'emp_hobby']=="Poetry" ) echo 'selected' ; ?> value="Poetry">Poetry</option>
                            <option <?php if ($row[ 'emp_hobby']=="Sketching" ) echo 'selected' ; ?> value="Sketching">Sketching</option>
                            <option <?php if ($row[ 'emp_hobby']=="Driving" ) echo 'selected' ; ?> value="Driving">Driving</option>
                            <option <?php if ($row[ 'emp_hobby']=="Reading" ) echo 'selected' ; ?> value="Reading">Reading</option>
                        </select>
                        <br>
                        <br>
                    </div>
                </div>

                <div class="form-group">
                    <div class="text-primary">
                        <label class="control-label col-sm-2" for="places">Places visited:</label>
                    </div>
                    <div class="col-sm-2">
                        <?php $mmm=explode(' , ', $row['emp_places']); ?>
                            <select class="js-example-basic-multiple" name="places[]" multiple="multiple">
                                <option <?php echo (in_array( 'Manali', $mmm)) ? 'selected' : ''; ?> value="Manali">Manali</option>
                                <option <?php echo (in_array( 'Dalhousie', $mmm)) ? 'selected' : ''; ?> value="Dalhousie">Dalhousie</option>
                                <option <?php echo (in_array( 'Dharamshala', $mmm)) ? 'selected' : ''; ?> value="Dharamshala">Dharamshala</option>
                                <option <?php echo (in_array( 'Chopta', $mmm)) ? 'selected' : ''; ?> value="Chopta">Chopta</option>
                                <option <?php echo (in_array( 'Nainital', $mmm)) ? 'selected' : ''; ?> value="Nainital">Nainital</option>
                                <option <?php echo (in_array( 'Jodhpur', $mmm)) ? 'selected' : ''; ?> value="Jodhpur">Jodhpur</option>
                                <option <?php echo (in_array( 'Shimla', $mmm)) ? 'selected' : ''; ?> value="Shimla">Shimla</option>
                            </select>
                    </div>
                </div>

                <div class="text-primary">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Upload Image: </label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="picture" accept="image/*">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="textarea">Your information:</label>
                        <div class="col-sm-5">
                            <textarea rows="4" cols="9" class="form-control" name="textarea">
                                <?php echo $row['emp_textarea']; ?>
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default" name="updation">Update</button>
                        </div>
                    </div>

                    </br>
                    </br>

                </div>
            </div>
        </form>
    </div>
</body>

</html>
