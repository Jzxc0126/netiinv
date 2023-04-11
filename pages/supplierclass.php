<?php
function addsupplier($suppliername, $suppliercon,$contactperson,$supplieraddress,$deptid)
{
  try
  {
    include '../includes/dbcon.php';
    $statement = $conn->prepare("INSERT INTO supplier_tbl(supplierid,supp_name,supp_number,supp_contactperson,supp_address,departmentid,supp_deleted) Value (NULL,?,?,?,?,?,1)");
    $statement->bind_param("ssssi", $Suppliername, $Suppliercon, $Contactperson, $Supplieraddress, $Deptid);
    $Suppliername = $suppliername;
    $Suppliercon = $suppliercon;
    $Contactperson = $contactperson;
    $Supplieraddress = $supplieraddress;
    $Deptid = $deptid;
    $statement->execute();
    $conn->close();
    echo "<script>alert('Supplier Added'); </script>";
    echo "<script> window.location.replace('supplier.php'); </script>";
  }
  catch (\Exception $e)
  {

  }

}



function populatedepartment()
{
  try
  {
    include '../includes/dbcon.php';
          $statement = $conn->prepare("Select * from department_tbl where dept_deleted = 1");
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
function populatetblsupplier($userlevelid , $userdeptid)
{
  try
  {
    include '../includes/dbcon.php';
    if($userlevelid == 2)
    {
      $statement = $conn->prepare("Select a.supplierid , a.supp_name , a.supp_number , a.supp_contactperson ,
      a.supp_address, b.department from supplier_tbl as a
      inner join department_tbl as b on a.departmentid=b.departmentid where a.supp_deleted = 1 and a.departmentid = ".$userdeptid."");
    }
    else if($userlevelid == 1 || $userlevelid == 3)
    {
      $statement = $conn->prepare("Select a.supplierid , a.supp_name , a.supp_number , a.supp_contactperson ,
      a.supp_address, b.department from supplier_tbl as a
      inner join department_tbl as b on a.departmentid=b.departmentid where a.supp_deleted = 1");
    }

    $statement->execute();
    $result = $statement->get_result();
          while($row = $result->fetch_assoc())
          {
              echo "<tr>";
              echo "<td hidden>".$row["supplierid"]."</td>";
              echo "<td>".$row["supp_name"]."</td>";
              echo "<td>".$row["supp_number"]."</td>";
              echo "<td>".$row["supp_contactperson"]."</td>";
              echo "<td><textarea disabled>".$row["supp_address"]."</textarea></td>";
              
              if($userlevelid == 1)
              {
                echo "<td>".$row["department"]."</td>";
              }
              
              
              
              echo "<td> 
              <a class='btn btn-secondary btn-sm edit_btn' style='color:white;'>
              Edit
              </a>
              <a class='btn btn-danger btn-sm mt-1 ' onclick='return checkdelete()' href='categorydelete.php?id=".$row["supplierid"]."' style='color:white;'>
              Delete
              </a>
              
              
              </td>";
              echo "</tr>";
          }
    $conn->close();
  }
  catch (\Exception $e)
  {

  }
} 
function populatedeletesupptable($userlevelid , $userdeptid)
{
      try
      {
        include '../includes/dbcon.php';
        if($userlevelid == 2)
        {
          $statement = $conn->prepare("Select a.supplierid , a.supp_name , a.supp_number , a.supp_contactperson ,
          a.supp_address, b.department from supplier_tbl as a
          inner join department_tbl as b on a.departmentid=b.departmentid where a.supp_deleted = 0 and a.departmentid = ".$userdeptid." ");
        }
        else if($userlevelid == 1 || $userlevelid == 3)
        {
          $statement = $conn->prepare("Select a.supplierid , a.supp_name , a.supp_number , a.supp_contactperson ,
          a.supp_address, b.department from supplier_tbl as a
          inner join department_tbl as b on a.departmentid=b.departmentid where a.supp_deleted = 0 ");
        }


        
        $statement->execute();
        $result = $statement->get_result();
              while($row = $result->fetch_assoc())
              {
                echo "<tr>";
              
                echo "<td>".$row["supp_name"]."</td>";
                echo "<td>".$row["supp_number"]."</td>";
                echo "<td>".$row["supp_contactperson"]."</td>";
                // echo "<td><textarea disabled>".$row["supp_address"]."</textarea></td>";
                
                if($userlevelid == 1)
                {
                  echo "<td>".$row["department"]."</td>";
                }
                
                
                
                echo "<td>
                <a class='btn btn-success btn-sm mb-1' href='supplierdeleterecover.php?id=".$row["supplierid"]."' style='color:white;'>
                Recover
                </a>
                <a class='btn btn-danger btn-sm ' href='supplierdeletepermanently.php?id=".$row["supplierid"]."' style='color:white;'>
                Delete Permanently
                </a>

                </td>";
                echo "</tr>";
              }
        $conn->close();
      }
      catch (\Exception $e) {

      }
    }







?>