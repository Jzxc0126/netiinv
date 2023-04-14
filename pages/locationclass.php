<?php 
function addlocation($location , $deptid)
{
  try
  {
    include '../includes/dbcon.php';
    $statement = $conn->prepare("INSERT into location_tbl(locationid,locationname,departmentid,loc_deleted) values(NULL,?,?,1)");
    $statement->bind_param("si", $location , $Deptid);
    $location = $location;
    $Deptid = $deptid;
    $statement->execute();
    $conn->close();
    echo "<script>alert('location Added'); </script>";
    echo "<script> window.location.replace('location.php'); </script>";
  }
  catch (\Exception $e)
  {

  }

}

function populatetbllocation($userlevelid, $userdeptid)
{
  try
  {
    include '../includes/dbcon.php';
    if($userlevelid == 2)
    {
      $statement = $conn->prepare("Select a.locationid,a.locationname,a.loc_deleted,
                                b.department from location_tbl as a
                                    inner join department_tbl as b on a.departmentid=b.departmentid where a.departmentid = ".$userdeptid." and a.loc_deleted= 1 ");
    }
    else if($userlevelid == 1 || $userlevelid == 3)
    {
      $statement = $conn->prepare("Select a.locationid,a.locationname,a.loc_deleted,
                                b.department from location_tbl as a
                                    inner join department_tbl as b on a.departmentid=b.departmentid where a.loc_deleted= 1 ");
    }

    $statement->execute();
    $result = $statement->get_result();
          while($row = $result->fetch_assoc())
          {
              echo "<tr>";
              
              echo "<td>".$row["locationid"]."</td>";
              echo "<td>".$row["locationname"]."</td>";
              if($userlevelid == 1)
              {
                echo "<td>".$row["department"]."</td>";
              }
              
              
              
              echo "<td> 
              <a class='btn btn-secondary btn-sm edit_btn' style='color:white;'>
              Edit
              </a>
              <a class='btn btn-danger btn-sm ' onclick='return checkdelete()' href='locationdelete.php?id=".$row["locationid"]."' style='color:white;'>
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
function populatedeletelocationtable($userlevelid , $userdeptid)
{
      try
      {
        include '../includes/dbcon.php';
        if($userlevelid == 2)
        {
          $statement = $conn->prepare("Select a.locationid,a.locationname,a.loc_deleted,
          b.department from location_tbl as a
              inner join department_tbl as b on a.departmentid=b.departmentid where a.departmentid = ".$userdeptid." and a.loc_deleted= 0");
        }
        else if($userlevelid == 1 || $userlevelid == 3)
        {
          $statement = $conn->prepare("Select a.locationid,a.locationname,a.loc_deleted,
          b.department from location_tbl as a
              inner join department_tbl as b on a.departmentid=b.departmentid where a.loc_deleted= 0 ");
        }


        
        $statement->execute();
        $result = $statement->get_result();
              while($row = $result->fetch_assoc())
              {
                    echo "<tr>";
                    
                    echo "<td class='loc_id'>".$row["locationid"]."</td>";
                    echo "<td>".$row["locationname"]."</td>";
                    if($userlevelid == 1)
              {
                echo "<td>".$row["department"]."</td>";
              }
                    
                    echo "<td>
                          <a class='btn btn-success btn-sm mb-1' href='locationdeleterecover.php?id=".$row["locationid"]."' style='color:white;'>
                          Recover
                          </a>
                          <a class='btn btn-danger btn-sm ' onclick='return checkdelete()' href='locationdeletepermanently.php?id=".$row["locationid"]."' style='color:white;'>
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
            return confirm('Are you sure you want to delete this location ?')
           }
        </script>