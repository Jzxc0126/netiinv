<?php
$departmentid = $_GET["id"];

try
{
    include '../includes/dbcon.php';

    $query = "UPDATE department_tbl SET dept_deleted = '0' where departmentid = '$departmentid' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
    echo "<script> alert('Department Deleted Succesfully'); </script>";
     header("location:department.php");
    }
    else
    {
        echo "<script> alert('Department Deleted not Succesful'); </script>";
        header("location:department.php");
    }




}
catch (\Exception $e)
{

}

?>

