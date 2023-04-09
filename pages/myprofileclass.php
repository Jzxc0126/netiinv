<?php
function updateaccount($fname,$mi,$lname,$mail,$con,$user,$pass,$userid)
{
    $query = "update user_tbl set
              firstname = ?,
              middlename = ?,
              lastname = ?,
              email = ?,
              contactnumber = ?,
              username = ?,
              password = ?
              where userid = ?";
    include 'C:\xampp\htdocs\netiinv\dbcon.php';
    $statement = $conn->prepare($query);
    $statement->bind_param("sssssssi" , $Fname , $Mi , $Lname , $Mail , $Con , $User , $Pass , $Userid);
    $Fname = $fname;
    $Mi = $mi;
    $Lname = $lname;
    $Mail = $mail;
    $Con = $con;
    $User = $user;
    $Pass = $pass;
    $Userid = $userid;
    $statement->execute();
    $conn->close();
    echo "<script> window.location.replace('myprofile.php'); </script>";


}
?>
