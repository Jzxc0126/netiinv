<?php 
session_start();
include '../includes/dbcon.php';
if(isset($_POST['updatecategory'])){

    $d_id = $_POST['categoryid'];
    $d_dpt = $_POST['category'];
   
    $query = "UPDATE category_tbl SET category = '$d_dpt' where categoryid = '$d_id' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
        echo "<script> alert('Category Updated Succesfully'); </script>";
     header("location:category.php");
    }
    else
    {
        echo "<script> alert('Category Update not Succesful'); </script>";
    }

}
?>