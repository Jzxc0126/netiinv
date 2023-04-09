<?php 
session_start();
include '../includes/dbcon.php';
if(isset($_POST['updatedept'])){

    $d_id = $_POST['departmentid'];
    $d_dpt = $_POST['department'];
   
    $query = "UPDATE department_tbl SET department = '$d_dpt' where departmentid = '$d_id' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
        echo "<script> alert('Department Updated Succesfully'); </script>";
     header("location:department.php");
    }
    else
    {
        echo "<script> alert('Department Update not Succesful'); </script>";
    }

}
?>