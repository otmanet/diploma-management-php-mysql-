<?php
include_once 'config.php';
if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $password =  PASSWORD_HASH($_POST['password'], PASSWORD_DEFAULT);
    $type_user = $_POST['type_user'];
    $et_id = $_POST['et_id'];
    $sql = "INSERT INTO user (et_id,username,password,type_user)
	 VALUES ('$et_id','$username','$password','$type_user')";
    if (mysqli_query($con, $sql)) {
        header("location:consulterUser.php");
        echo "New record created successfully !";
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($con);
    }
    mysqli_close($con);
}