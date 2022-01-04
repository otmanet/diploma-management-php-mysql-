<?php
    

include "config.php"; 

$id = $_GET['id']; 

$del = mysqli_query($con,"delete from etudiant where id = '$id'"); 

if($del)
{
    mysqli_close($con); 
    header("location:admin.php"); 
    exit;	
}
else
{
    echo "Error deleting record"; 
}
?>