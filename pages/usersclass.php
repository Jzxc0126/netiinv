<?php 
//functions
function addacc($emp_id,$firstname,$middlename,$lastname, $emailad, $contactno, $address,$department,$uname,$upass,$acctype,$status)
{
  try
        {
          include '../includes/dbcon.php';
                    $statement = $conn->prepare("insert into user_acc_tbl(u_ids,emp_id,u_firstname,u_middlename,u_lastname,
                                                u_emailadd,u_contactno,u_address,
                                                u_departmentid,u_username,u_password,u_levelid,u_status) values
                                                (NULL,?,?,?,?,?,?,?,?,?,?,?,?)");
                    $statement->bind_param("sssssssissii" , $Emp_id , $Firstname , $Middlename , $Lastname, $Emailad, $Contactno, $Address, $Department, $Uname , $Upass , $Acctype, $Status);
                    $Emp_id = $emp_id;
                    $Firstname = $firstname;
                    $Middlename = $middlename;
                    $Lastname = $lastname;
                    $Emailad = $emailad;
                    $Contactno = $contactno;
                    $Address = $address;
                    $Department = $department;
                    $Uname = $uname;
                    $Upass = $upass;
                    $Acctype = $acctype;
                    $Status = $status;
                    $statement->execute();
                    $conn->close();
                    echo "<script>
                          alert('Account Saved');
                          window.location.replace('users.php');
                          </script>";
        }
        catch (\Exception $e)
        {

        }





}





?>
<?php
// modal
function populateselectdepartment()
{
      try
      {
              include '../includes/dbcon.php';
              $statement = $conn->prepare("Select * from department_tbl where dept_deleted= '1' ");
              $statement->execute();
              $result = $statement->get_result();
                      while($row = $result->fetch_assoc())
                      {
                          echo "<option value='".$row["departmentid"]."'>".$row["department"]."</option>";
                      }
              $conn->close();
      }
      catch (\Exception $e)
      {

      }

}
function populateselectacctype()
{
      try
      {
              include '../includes/dbcon.php';
              $statement = $conn->prepare("Select * from level_tbl");
              $statement->execute();
              $result = $statement->get_result();
                      while($row = $result->fetch_assoc())
                      {
                          echo "<option value='".$row["level_id"]."'>".$row["level"]."</option>";
                      }
              $conn->close();
      }
      catch (\Exception $e)
      {

      }

}

function updateuseraccount($editdpt, $editacctype, $userid)
{
    $query = "update user_acc_tbl set
    u_departmentid = ?,
    u_levelid = ?
    where u_ids = ?";
    include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
    $statement = $conn->prepare($query);
    $statement->bind_param("iii" ,$Editdpt, $Editacctype, $Userid);
    $Editdpt = $editdpt;
    $Editacctype = $editacctype;
    $Userid = $userid;
    $statement->execute();
    $conn->close();
    echo "<script> alert('Information Updated Succesfully'); </script>";
    echo "<script> window.location.replace('users.php'); </script>";
    


}
?>