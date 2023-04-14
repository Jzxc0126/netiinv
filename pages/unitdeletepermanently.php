<?php
$unitid = $_GET["id"];

try
{
    include '../includes/dbcon.php';

    $query = "UPDATE unit_tbl SET unit_deleted = '2' where unitid = '$unitid' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
    echo "<script> alert('Unit Deleted Succesfully'); </script>";
     header("location:unit.php");
    }
    else
    {
        echo "<script> alert('Unit Delete not Succesful'); </script>";
        header("location:unit.php");
    }




}
catch (\Exception $e)
{

}

?>