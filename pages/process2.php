<?php 
include '..\includes\dbcon.php';
$itemidss = $_GET["ids"];
$filename = $_FILES["choosefile"]["name"];
$tempfile = $_FILES["choosefile"]["tmp_name"];
$folder = "../uploads/".$filename;
$sql = "INSERT INTO files_tbl (`fileid`, `itemid`, `filename`, `file_deleted`)VALUES(null,$itemidss,'$filename',1)";
if($filename == "")
{
    echo 
    "
    <div class='alert alert-danger' role='alert'>
        <h4 class='text-center'>Blank not Allowed</h4>
    </div>
    ";
}else{
    $result = mysqli_query($conn, $sql);
    move_uploaded_file($tempfile, $folder);
    echo 
    "
    <div class='alert alert-success' role='alert'>
        <h4 class='text-center'>Image uploaded</h4>
    </div>
    ";

    echo "<script> window.location.replace('inventory.php'); </script>";
}


?>