<?php
$categoryid = $_GET["id"];

try
{
    include '../includes/dbcon.php';

    $query = "UPDATE category_tbl SET cat_deleted = '2' where categoryid = '$categoryid' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
    echo "<script> alert('category Deleted Succesfully'); </script>";
     header("location:category.php");
    }
    else
    {
        echo "<script> alert('category Delete not Succesful'); </script>";
        header("location:category.php");
    }




}
catch (\Exception $e)
{

}

?>