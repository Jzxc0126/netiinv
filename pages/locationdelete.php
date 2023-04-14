<?php
$locationid = $_GET["id"];

try
{
    include '../includes/dbcon.php';

    $query = "UPDATE location_tbl SET loc_deleted = '0' where locationid = '$locationid' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
    echo "<script> alert('location Deleted Succesfully'); </script>";
     header("location:location.php");
    }
    else
    {
        echo "<script> alert('location Deleted not Succesful'); </script>";
        header("location:location.php");
    }




}
catch (\Exception $e)
{

}

?>
