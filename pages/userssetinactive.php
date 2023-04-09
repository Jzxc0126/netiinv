<?php
$userid = $_GET["userid"];

include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
$statement = $conn->prepare("update user_acc_tbl set u_status = 0 where u_ids = ?");
$statement->bind_param("i", $Userid);
$Userid = $userid;
$statement->execute();
$conn->close();
echo "<script> alert('User $userid deactivated succesfully'); </script>";
echo "<script> window.location.replace('users.php'); </script>";
?>