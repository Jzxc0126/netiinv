<?php
$supplierid = $_GET["id"];

try
{
    include '../includes/dbcon.php';

    $query = "UPDATE supplier_tbl SET supp_deleted = '3' where supplierid = '$supplierid' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
    echo "<script> alert('Supplier Deleted Succesfully'); </script>";
     header("location:supplier.php");
    }
    else
    {
        echo "<script> alert('Supplier Delete not Succesful'); </script>";
        header("location:supplier.php");
    }

}
catch (\Exception $e)
{

}

?>