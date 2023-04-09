<?php
function updateaccounts($mail,$con,$add,$user,$userid)
{
    $query = "update user_acc_tbl set
    u_emailadd = ?,
    u_contactno = ?,
    u_address = ?,
    u_username = ?
    where u_ids = ?";
    include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
    $statement = $conn->prepare($query);
    $statement->bind_param("ssssi" , $Mail , $Con ,$Add, $User , $Userid);
    $Mail = $mail;
    $Con = $con;
    $Add = $add;
    $User = $user;
    $Userid = $userid;
    $statement->execute();
    $conn->close();
    echo "<script> alert('Information Updated Succesfully'); </script>";
    echo "<script> window.location.replace('profile.php'); </script>";
    


}
function updateapass($new_password,$userid)
{
    $query = "update user_acc_tbl set
    u_password = ?
    where u_ids = ?";
    include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
    $statement = $conn->prepare($query);
    $statement->bind_param("si" ,$New_password, $Userid);

    $New_password=$new_password;
    $Userid = $userid;
    $statement->execute();
    $conn->close();
    echo "<script> alert('Password Updated Succesfully'); </script>";
    echo "<script> window.location.replace('profile.php'); </script>";
   
    

}
?>
