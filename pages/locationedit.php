<?php 
session_start();
include '../includes/dbcon.php';
if(isset($_POST['updatelocation'])){

    $loc_id = $_POST['locationid'];
    $d_loc = $_POST['locationname'];
   
    $query = "UPDATE location_tbl SET locationname = '$d_loc' where locationid = '$loc_id' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
        echo "<script> alert('location Updated Succesfully'); </script>";
     header("location:location.php");
    }
    else
    {
        echo "<script> alert('location Update not Succesful'); </script>";
    }

}
?>