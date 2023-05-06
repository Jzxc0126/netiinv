<?php 
session_start();
include '../includes/dbcon.php';
if(isset($_POST['updateassetusage'])){

    $d_id = $_POST['assetusageid'];
    $d_dpt = $_POST['assetusage'];
   
    $query = "UPDATE assetusage_tbl SET assetusage = '$d_dpt' where assetusageid = '$d_id' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
        echo "<script> alert('Assetusage Updated Succesfully'); </script>";
     header("location:assetusage.php");
    }
    else
    {
        echo "<script> alert('Assetusage Update not Succesful'); </script>";
    }

}
?>