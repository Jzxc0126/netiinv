<?php 
session_start();
$userid = $_SESSION["userid"];
$userfullname = $_SESSION["name"];
$userdeptid = $_SESSION["departmentid"];
$userdepartment = $_SESSION["department"];
$userlevelid = $_SESSION["userlevelid"];
$userlevel = $_SESSION["userlevel"];
include '../includes/dbcon.php';
if(isset($_POST['updatesupp'])){
    
    
    $supp_id = $_POST['txtsuppid'];
    $suppname = $_POST['suppliername'];
    $suppcontact = $_POST['suppliercon'];
    $suppconperson = $_POST['contactperson'];
    $suppaddress = $_POST['supplieraddress'];
    if ($userlevelid == 2) {
        $deptid = $userdeptid;
    } else if ($userlevelid == 1) {
        $deptid = $_POST['editselectdepartment'];
    }
    if ($deptid == "") {
        echo "<script>alert('Please Select Department'); </script>";
        echo "<script> window.location.replace('supplier.php'); </script>";
    }
    else{
        $query = "UPDATE supplier_tbl SET supp_name = '$suppname', supp_number = '$suppcontact',supp_contactperson = '$suppconperson',
    	supp_address = '$suppaddress' , departmentid = '$deptid' where supplierid = '$supp_id' ";
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
    

}
?>