<?php
session_start();
include 'dbconn.php';
mysqli_select_db($conn, 'test_db');
?>
<head>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
function Validate() {
    var name = document.forms["RegForm"]["name"];              
    var email = document.forms["RegForm"]["email"];   
    var telephone = document.forms["RegForm"]["telephone"]; 
    var what =  document.forms["RegForm"]["hobby"]; 
    var password = document.forms["RegForm"]["password"]; 
    var salary = document.forms["RegForm"]["salary"]; 
    var textarea = document.forms["RegForm"]["textarea"]; 
    if (name.value == "") {
        window.alert("Please enter your name.");
        name.focus();
        return false;
    }
    if (name.value.trim() == "" ) {
        window.alert("Please enter a valid name.");
        name.focus();
        return false;
    }
    if (!/^[a-zA-Z]*$/g.test(name.value)) {
        alert("Invalid characters. Please enter alphabets only.");
        name.focus();
        return false;
    }
    if (salary.value == "") {
        window.alert("Please enter your salary.");
        salary.focus();
        return false;
    }
    if (salary.value.trim() == "" ) {
        window.alert("Please enter valid salary digits.");
        salary.focus();
        return false;
    }
    if(!(salary.value>0 && salary.value<999999)) {
        window.alert("Please enter valid salary digits.");
        salary.focus();
        return false;
    }
    if (email.value == "") {
        window.alert("Please enter a e-mail address.");
        email.focus();
        return false;
    }
    if (email.value.trim() == "" ) {
        window.alert("Please enter a valid email.");
        email.focus();
        return false;
    }
    if (telephone.value == "") {
        window.alert("Please enter telephone number.");
        telephone.focus();
        return false;
    }
    if (telephone.value.trim() == "" ) {
        window.alert("Please enter a valid telephone.");
        telephone.focus();
        return false;
    }
    if(!telephone.value.match(/^\d+/)) {
        window.alert("Please only enter numeric characters only for your telephone! (Allowed input:0-9)");
        telephone.focus();
        return false;
    }
    
    if (textarea.value == "") {
        window.alert("Please enter a your information.");
        textarea.focus();
        return false;
    }
    if (textarea.value.trim() == "" ) {
        window.alert("Please enter a valid introduction.");
        textarea.focus();
        return false;
    }
    if(arr.value == NULL) {
        window.alert("Please enter a your interest.");
        arr.focus();
        return false;
    }
    if (email.value.indexOf("@", 0) < 0) {
        exit('@ error');
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
    if (email.value.indexOf(".", 0) < 0) {
        exit('dot error');
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
    
    if (what.selectedIndex < 1) {
        alert("Please enter your hobby");
        what.focus();
        return false;
    }
    if (password.value == "") {
        window.alert("Please enter your password");
        password.focus();
        return false;
    }
    if (password.value.trim() == "" ) {
        window.alert("Please enter a valid pasword.");
        password.focus();
        return false;
    }
   return true;
}
</script>
</head>
<body>
    <div id="grad1">
        <div class="page-header">
            <h1 class="mycontainer center_div">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add employee data</h1>
        </div>
        <form class="form-horizontal" name="RegForm" action="updatenewdata.php" method="post" onsubmit="return Validate()" enctype='multipart/form-data'>
            </br>
            <div class="mycontainer center_div">
                <div class="text-primary">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-5">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="salary">Salary:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="salary" placeholder="Enter salary" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="email" placeholder="Enter email" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Telephone:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="telephone" placeholder="Enter telephone" />
                        </div>
                    </div>

                    </br>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="interests">Interest:</label>
                        <div class="col-sm-offset-20 col-sm-10">
                            <div class="button-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"> Select your interests:<span class="glyphicon glyphicon-cog"></span> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#" class="small" data-value="option1" tabIndex="-1">
                                            <input type="checkbox" name="arr[]" value="PHP" />&nbsp;PHP</a>
                                    </li>
                                    <li>
                                        <a href="#" class="small" data-value="option2" tabIndex="-1">
                                            <input type="checkbox" name="arr[]" value="Java" />&nbsp;Java</a>
                                    </li>
                                    <li>
                                        <a href="#" class="small" data-value="option3" tabIndex="-1">
                                            <input type="checkbox" name="arr[]" value="Python" />&nbsp;Python</a>
                                    </li>
                                    <li>
                                        <a href="#" class="small" data-value="option4" tabIndex="-1">
                                            <input type="checkbox" name="arr[]" value="R" />&nbsp;R</a>
                                    </li>
                                    <li>
                                        <a href="#" class="small" data-value="option5" tabIndex="-1">
                                            <input type="checkbox" name="arr[]" value="Julia" />&nbsp;Julia</a>
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
                            <option>Swimming</option>
                            <option>Poetry</option>
                            <option>Sketching</option>
                            <option>Driving</option>
                            <option>Reading</option>
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
                        <select class="js-example-basic-multiple" name="places[]" multiple="multiple">
                            <option value="Manali">Manali</option>
                            <option value="Dalhousie">Dalhousie</option>
                            <option value="Dharamshala">Dharamshala</option>
                            <option value="Chopta">Chopta</option>
                            <option value="Nainital">Nainital</option>
                            <option value="Jodhpur">Jodhpur</option>
                            <option value="Shimla">Shimla</option>
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
                            <textarea rows="4" cols="9" class="form-control" name="textarea">Enter your information</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default" name="updatenewdata">Add to DB</button>
                        </div>
                    </div>

                    </br>
                    </br>
                </div>
            </div>

        </form>
    </div>
</body>
