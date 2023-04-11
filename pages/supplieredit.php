<?php 
session_start();
include '../includes/dbcon.php';
if(isset($_POST['updatesupp'])){
    
    
    $supp_id = $_POST['txtsuppid'];
    $suppname = $_POST['suppliername'];
    $suppcontact = $_POST['suppliercon'];
    $suppconperson = $_POST['contactperson'];
    $suppaddress = $_POST['supplieraddress'];
    // $deptid = $_POST['editselectdepartment'];
    // departmentid = '$deptid',
    $query = "UPDATE supplier_tbl SET supp_name = '$suppname', supp_number = '$suppcontact',supp_contactperson = '$suppconperson',
    	supp_address = '$suppaddress' where supplierid = '$supp_id' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run)
    {
        echo "<script> alert(Supplier Updated Succesfully'); </script>";
     header("location:supplier.php");
    }
    else
    {
        echo "<script> alert('Supplier Update not Succesful'); </script>";
    }

}
?>