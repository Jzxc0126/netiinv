<?php 
session_start();
include '../includes/dbcon.php';
if(isset($_POST['updateunit'])){

    $u_id = $_POST['unitid'];
    $u_unit = $_POST['unit'];
   
    $query = "UPDATE unit_tbl SET unit = '$u_unit' where unitid = '$u_id' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
        echo "<script> alert('Unit Updated Succesfully'); </script>";
     header("location:unit.php");
    }
    else
    {
        echo "<script> alert('Unit Update not Succesful'); </script>";
        header("location:unit.php");
    }

}
?>