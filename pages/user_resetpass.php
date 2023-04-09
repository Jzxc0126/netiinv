<?php
$userID = $_GET["ids"];
$query="update user_acc_tbl set
    u_password = 'neti123'
    where u_ids = $userID";
    include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
    $statement = $conn->prepare($query);
    $statement->execute();
    $conn->close();
    echo "<script> alert('Password Reset to neti123'); </script>";
    echo "<script> window.location.replace('users.php'); </script>";
    

?>