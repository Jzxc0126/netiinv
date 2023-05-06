<?php 
function addassetusage($assetusage , $deptid)
{
  try
  {
    include '../includes/dbcon.php';
    $statement = $conn->prepare("INSERT into assetusage_tbl(assetusageid,assetusage,departmentid,usage_deleted) values(NULL,?,?,1)");
    $statement->bind_param("si", $Assetusage , $Deptid);
    $Assetusage = $assetusage;
    $Deptid = $deptid;
    $statement->execute();
    $conn->close();
    echo "<script>alert('Assetusage Added'); </script>";
    echo "<script> window.location.replace('assetusage.php'); </script>";
  }
  catch (\Exception $e)
  {

  }

}

function populatetblassetusage($userlevelid , $userdeptid)
{
  try
  {
    include '../includes/dbcon.php';
    if($userlevelid == 2)
    {
      $statement = $conn->prepare("Select a.assetusageid,a.assetusage,a.usage_deleted,
                                    b.department from assetusage_tbl as a
                                    inner join department_tbl as b on a.departmentid=b.departmentid where a.departmentid = ".$userdeptid." and a.usage_deleted= 1 ");
    }
    else if($userlevelid == 1 || $userlevelid == 3)
    {
      $statement = $conn->prepare("Select a.assetusageid,a.assetusage,a.usage_deleted,
      b.department from assetusage_tbl as a
      inner join department_tbl as b on a.departmentid=b.departmentid where a.usage_deleted= 1 ");
    }

    $statement->execute();
    $result = $statement->get_result();
          while($row = $result->fetch_assoc())
          {
              echo "<tr>";
              
              echo "<td>".$row["assetusageid"]."</td>";
              echo "<td>".$row["assetusage"]."</td>";
              if($userlevelid == 1)
              {
                echo "<td>".$row["department"]."</td>";
              }
              
              
              
              echo "<td> 
              <a class='btn btn-secondary btn-sm edit_btn' style='color:white;'>
              Edit
              </a>
              <a class='btn btn-danger btn-sm ' onclick='return checkdelete()' href='assetusagedelete.php?id=".$row["assetusageid"]."' style='color:white;'>
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

function populatedeleteassetusagetable($userlevelid , $userdeptid)
{
      try
      {
        include '../includes/dbcon.php';
        if($userlevelid == 2)
        {
          $statement = $conn->prepare("Select a.assetusageid,a.assetusage,a.usage_deleted,b.department from assetusage_tbl as a
          inner join department_tbl as b on a.departmentid=b.departmentid where a.usage_deleted= 0 and a.departmentid = ".$userdeptid." ");
        }
        else if($userlevelid == 1 || $userlevelid == 3)
        {
          $statement = $conn->prepare("Select a.assetusageid,a.assetusage,a.usage_deleted,b.department from assetusage_tbl as a
        inner join department_tbl as b on a.departmentid=b.departmentid where a.usage_deleted= 0 ");
        }


        
        $statement->execute();
        $result = $statement->get_result();
              while($row = $result->fetch_assoc())
              {
                    echo "<tr>";
                    
                    echo "<td class='cat_id'>".$row["assetusageid"]."</td>";
                    echo "<td>".$row["assetusage"]."</td>";
                    if($userlevelid == 1)
              {
                echo "<td>".$row["department"]."</td>";
              }
                    
                    echo "<td>
                          <a class='btn btn-Success btn-sm mb-1' href='assetusagedeleterecover.php?id=".$row["assetusageid"]."' style='color:white;'>
                          Recover
                          </a>
                          <a class='btn btn-danger btn-sm ' onclick='return checkdelete()' href='assetusagedeletepermanently.php?id=".$row["assetusageid"]."' style='color:white;'>
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
<script>
           function checkdelete()
           {
            return confirm('Are you sure you want to delete this Asset Usage ?')
           }
        </script>