<?php
$categoryid = $_GET["id"];

try
{
    include '../includes/dbcon.php';

    $query = "UPDATE category_tbl SET cat_deleted = '1' where categoryid = '$categoryid' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
    echo "<script> alert('Category Recover Succesfully'); </script>";
     header("location:category.php");
    }
    else
    {
        echo "<script> alert('Category Recover not Succesful'); </script>";
        header("location:category.php");
    }




}
catch (\Exception $e)
{

}

?>