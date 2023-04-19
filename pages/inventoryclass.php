<?php
function populatetblinventory($userdeptid)
{
  $query = "SELECT a.itemcode,a.brand, a.itemname ,
  b.category,
  c.locationname
  FROM inventory_tbl as a INNER JOIN category_tbl as b ON a.categoryid=b.categoryid
              INNER JOIN location_tbl as c on a.locationid=c.locationid
  
  
  where a.departmentid = ? and a.consumabletypeid = 1";
  try
  {
    include '../includes/dbcon.php';
        $statement = $conn->prepare($query);
        $statement->bind_param("i" , $Userdeptid);
        $Userdeptid = $userdeptid;
        $statement->execute();
        $result = $statement->get_result();
                while($row = $result->fetch_assoc())
                {
                  echo "<tr>";
                  echo "<td>".$row["itemcode"]."</td>";
                  echo "<td>".$row["brand"]."</td>";
                  echo "<td>".$row["itemname"]."</td>";
                  echo "<td>".$row["category"]."</td>";
                  echo "<td>".$row["locationname"]."</td>";
                 echo "<td>Action</td>";
                  echo "</tr>";
                }
        $conn->close();
  }
  catch (\Exception $e)
  {

  }

}
function populateselectcategory($userdeptid)
{
  $query = "Select * from category_tbl where deleted = 0 and departmentid = ?";
  try
  {
     include '../includes/dbcon.php'; 
    $statement = $conn->prepare($query);
    $statement->bind_param("i" , $Userdeptid);
    $Userdeptid = $userdeptid;
    $statement->execute();
    $result = $statement->get_result();
            while($row = $result->fetch_assoc())
            {
                echo "<option value='".$row["categoryid"]."' >".$row["category"]."</option>";
            }
    $conn->close();
  }
  catch (\Exception $e)
  {

  }

}



function populatedepartmentbuttons()
{
  $query = "Select departmentid,department from department_tbl";
  try
  {
    include '../includes/dbcon.php';
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->get_result();
            while($row = $result->fetch_assoc())
            {
             echo "<button class='btn btn-info' value='{$row['departmentid']}' onclick='filterTable({$row['departmentid']})'>{$row['department']}</button>";
            }
         
    $conn->close();
  }
  catch (\Exception $e)
  {

  }
  
}
function populatecategorybuttons($userdeptid)
{
  $query = "Select * from category_tbl where cat_deleted = 1 and departmentid = ?";
  try
  {
    include '../includes/dbcon.php';
    $statement = $conn->prepare($query);
    $statement->bind_param("i" , $Userdeptid);
    $Userdeptid = $userdeptid;
    $statement->execute();
    $result = $statement->get_result();
            while($row = $result->fetch_assoc())
            {
              echo "<button class='catbtn' value='{$row['categoryid']}' onclick='filterTableByCategoryBtn({$row['categoryid']})'>{$row['category']}</button>";

              
            }
    $conn->close();
  }
  catch (\Exception $e)
  {

  }

}


?>











<script>

  function filterTable(departmentid) {
window.location.reload();
document.cookie = "cookieName="+departmentid;
}



</script>
