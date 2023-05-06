<?php
$assetusageid = $_GET["id"];

try
{
    include '../includes/dbcon.php';

    $query = "UPDATE assetusage_tbl SET usage_deleted = '1' where assetusageid = '$assetusageid' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
    echo "<script> alert('assetusage Deleted Succesfully'); </script>";
     header("location:assetusage.php");
    }
    else
    {
        echo "<script> alert('assetusage Delete not Succesful'); </script>";
        header("location:assetusage.php");
    }




}
catch (\Exception $e)
{

}

?>