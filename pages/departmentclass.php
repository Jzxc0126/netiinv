<?php
function populatedepartmenttable()
{
      try
      {
        include '../includes/dbcon.php';
        $statement = $conn->prepare("select * from department_tbl where dept_deleted = 1");
        $statement->execute();
        $result = $statement->get_result();
              while($row = $result->fetch_assoc())
              {
                    echo "<tr>";
                    
                    echo "<td class='dep_id'>".$row["departmentid"]."</td>";
                    echo "<td>".$row["department"]."</td>";
                    echo "<td>
                          <a class='btn btn-secondary btn-sm edit_btn' style='color:white;'>
                          Edit
                          </a>
                          <a class='btn btn-danger btn-sm ' onclick='return checkdelete()' href='departmentdelete.php?id=".$row["departmentid"]."' style='color:white;'>
                          Delete
                          </a>

                          </td>";
                    echo "</tr>";
              }
        $conn->close();
      }
      catch (\Exception $e) {

      }
    }
    function populatedeletedepartmenttable()
{
      try
      {
        include '../includes/dbcon.php';
        $statement = $conn->prepare("select * from department_tbl where dept_deleted = 0");
        $statement->execute();
        $result = $statement->get_result();
              while($row = $result->fetch_assoc())
              {
                    echo "<tr>";
                    
                    echo "<td class='dep_id'>".$row["departmentid"]."</td>";
                    echo "<td>".$row["department"]."</td>";
                    echo "<td>
                          <a class='btn btn-success btn-sm mb-1' href='departmentdeleterecover.php?id=".$row["departmentid"]."' style='color:white;'>
                          Recover
                          </a>
                          <a class='btn btn-danger btn-sm ' href='departmentdeletepermanently.php?id=".$row["departmentid"]."' style='color:white;'>
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

    function adddepartment($department)
    {
      try
      {
            include '../includes/dbcon.php';
        $statement = $conn->prepare("insert into department_tbl(departmentid, department, dept_deleted) values(NULL,?,1)");
        $statement->bind_param("s", $Department);
        $Department = $department;
        $statement->execute();
        $conn->close();
        echo "<script>alert('Department Added'); </script>";
        echo "<script> window.location.replace('department.php'); </script>";
      }
      catch (\Exception $e)
      {

      }
    }
?>
<!-- data-toggle='modal' data-target='#exampleModalCenter' href='departmenteditclass.php?id=".$row["departmentid"]."'  -->
<script>
           function checkdelete()
           {
            return confirm('Are you sure you want to delete this department ?')
           }
        </script>