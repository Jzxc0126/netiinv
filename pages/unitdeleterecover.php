<?php
$unitid = $_GET["id"];

try
{
    include '../includes/dbcon.php';

    $query = "UPDATE unit_tbl SET unit_deleted = '1' where unitid = '$unitid' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
    echo "<script> alert('Unit recover Succesfully'); </script>";
     header("location:unit.php");
    }
    else
    {
        echo "<script> alert('Unit recover not Succesful'); </script>";
        header("location:unit.php");
    }




}
catch (\Exception $e)
{

}

?>