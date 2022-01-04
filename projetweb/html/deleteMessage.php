<?php


include "config.php";

$id = $_GET['id'];


$del = mysqli_query($con, "delete from message where id = '$id'");

if ($del) {
    mysqli_close($con);
    header("location:message.php");
    exit;
} else {
    echo "Error deleting record";
}