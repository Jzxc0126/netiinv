<?php
$departmentid = $_GET["id"];

try
{
    include '../includes/dbcon.php';

    $query = "UPDATE department_tbl SET dept_deleted = '1' where departmentid = '$departmentid' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
    echo "<script> alert('Department Recover Succesfully'); </script>";
     header("location:department.php");
    }
    else
    {
        echo "<script> alert('Department Recover not Succesful'); </script>";
        header("location:department.php");
    }




}
catch (\Exception $e)
{

}

?>