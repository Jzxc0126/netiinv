<?php
function populateunittable()
{
      try
      {
        include '../includes/dbcon.php';
        $statement = $conn->prepare("SELECT * from unit_tbl where unit_deleted = 1");
        $statement->execute();
        $result = $statement->get_result();
              while($row = $result->fetch_assoc())
              {
                    echo "<tr>";
                    
                    echo "<td class='unitid'>".$row["unitid"]."</td>";
                    echo "<td>".$row["unit"]."</td>";
                    echo "<td>
                          <a class='btn btn-secondary btn-sm edit_btn' style='color:white;'>
                          Edit
                          </a>
                          <a class='btn btn-danger btn-sm ' onclick='return checkdelete()' href='unitdelete.php?id=".$row["unitid"]."' style='color:white;'>
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
    function addunit($unit)
    {
      try
      {
            include '../includes/dbcon.php';
        $statement = $conn->prepare("INSERT into unit_tbl(unitid, unit, unit_deleted) values(NULL,?,1)");
        $statement->bind_param("s", $unit);
        $unit = $unit;
        $statement->execute();
        $conn->close();
        echo "<script>alert('Unit Added'); </script>";
        echo "<script> window.location.replace('unit.php'); </script>";
      }
      catch (\Exception $e)
      {

      }
    }
    function populatedeleteunittable()
    {
          try
          {
            include '../includes/dbcon.php';
            $statement = $conn->prepare("SELECT * from unit_tbl where unit_deleted = 0");
            $statement->execute();
            $result = $statement->get_result();
                  while($row = $result->fetch_assoc())
                  {
                        echo "<tr>";
                        
                        echo "<td class='unit_id'>".$row["unitid"]."</td>";
                        echo "<td>".$row["unit"]."</td>";
                        echo "<td>
                              <a class='btn btn-success btn-sm mb-1' href='unitdeleterecover.php?id=".$row["unitid"]."' style='color:white;'>
                              Recover
                              </a>
                              <a class='btn btn-danger btn-sm ' onclick='return checkdelete()' href='unitdeletepermanently.php?id=".$row["unitid"]."' style='color:white;'>
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
            return confirm('Are you sure you want to delete this Unit ?')
           }
        </script>