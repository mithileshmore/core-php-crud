<?php



echo "<link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css>";
echo "<script src=https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js></script>";
echo "<script src=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js></script>";
echo "<link rel=stylesheet type=text/css href=style.css>";
include 'dbconn.php';
mysqli_select_db($conn, 'test_db');
$sql = "SELECT * from employee";
$records = mysqli_query($conn, $sql);
?>
<html>
<head>
<script type="text/javascript">
function confirmation() {
    if(confirm("Are you sure you want to delete this row?"));
    if (agree)
         return true ;
    else
         return false ;
}
</script>
</head>
<body>

<div id="grad1">
<div class="page-header">
<center><h2>EMPLOYEE DATA</h2></center></div>   
<table id="reviewer_table" class="table table-hover table-striped table-condensed tasks-table">
<div id="grad">
<tr>
    <th><div class="col-xs-2">Name</div></th>
    <th>Email</th>
    <th>Introduction</th>
    <th>Update</th>
    <th>Delete</th>
</tr>

<?php
while($row = mysqli_fetch_array($records)) {
    echo "<form action=updateform.php  method=post> ";
    echo " <tr>";
    echo " <td><div class=col-xs-2><input type=text name=name value='".$row['emp_name']."' disabled></div></td> ";
    echo " <td>"."<input type=text name=email value='".$row['emp_email']."' disabled>"."</td> ";
    echo " <td><textarea rows=3 cols=20 name=textarea disabled>".$row['emp_textarea']."</textarea></td>";
    echo " <input type=hidden name=id value='".$row['id']."'>  ";
    echo "<td><button class=btn btn-default type=submit>UPDATE</button></td>";
    echo "<td><button class=btn btn-default type=submit name=delete value=Delete onclick=confirmation();>DELETE</button></td>";
    echo "</tr>";
    echo "</form>";
    echo "";
}
echo "</div>";
echo "</table>";
?>
</br>

<div class="mycontainer"> 
    <form class="form-horizontal" name="" action="updatenewform.php" onsubmit="" method="post"> 
    <div class="form-group">
    <button class="btn btn-default">ADD EMPLOYEE DATA</button>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    </form>
    <form class="form-horizontal" name="" action="logout.php" onsubmit="" method="post"> 
    <div class="form-group">
    <button type="submit" class="btn btn-default">LOGOUT</button>
    </div>
    </form>
</div>
</br>
</div>
 
</body>
</html>
