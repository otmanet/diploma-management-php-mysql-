<?php


include "config.php";

$id = $_GET['id'];

$del = mysqli_query($con, "delete from user where id = '$id'");

if ($del) {
    mysqli_close($con);
    header("location:consulterUser.php");
    exit;
} else {
    echo "Error deleting record";
}