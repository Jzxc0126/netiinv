<?php
function populatetblinventory($userdeptid)
{
  $query = "SELECT a.itemid,a.itemcode,a.brand, a.itemname ,
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
                  echo "<tr id=".$row["itemid"].">";
                 
                  echo "<td>".$row["itemcode"]."</td>";
                  echo "<td>".$row["brand"]."</td>";
                  echo "<td>".$row["itemname"]."</td>";
                  echo "<td>".$row["category"]."</td>";
                  echo "<td>".$row["locationname"]."</td>";
                 echo '<td>
                 <a type="button" class="btn btn-primary bg-gradient-primary" href="user_details.php?ids=' . $row['itemid'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
               <div class="btn-group">
                 <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                 ... <span class="caret"></span></a>
               <ul class="dropdown-menu text-center" role="menu">
                   <li>
                     <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 10px;" href="user_edit_details.php?ids=' . $row['itemid'] . '">
                       <i class="fas fa-fw fa-edit"></i> Edit
                     </a>
                   </li>
                   <li>
                   <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 10px;margin-top:2px;" href="user_resetpass.php?ids=' . $row['itemid'] . '">
                   <i class="fa-duotone fa-key-skeleton"></i>  <i class="fa-solid fa-lock fa-2xs"></i> Reset Password
                   </a>
                 </li>
                   
           
               </ul>
               </div>
             </div></td>';
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
              echo "<option value='".$row["categoryid"]."'>".$row["category"]."</option>";

              
            }
    $conn->close();
  }
  catch (\Exception $e)
  {

  }

}
function populateselectsupplier($userdeptid)
{
  $query = "Select * from supplier_tbl where supp_deleted = 1 and departmentid = ?";
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
              echo "<option value='".$row["supplierid"]."'>".$row["supp_name"]."</option>";

              
            }
    $conn->close();
  }
  catch (\Exception $e)
  {

  }

}
function populateselectdepartment()
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
function populateselectunit()
{
      try
      {
              include '../includes/dbcon.php';
              $statement = $conn->prepare("Select * from unit_tbl where unit_deleted = 1 ");
              $statement->execute();
              $result = $statement->get_result();
                      while($row = $result->fetch_assoc())
                      {
                          echo "<option value='".$row["unitid"]."'>".$row["unit"]."</option>";
                      }
              $conn->close();
      }
      catch (\Exception $e)
      {

      }
}
function populateassetusage($userdeptid)
{
  $query = "Select * from assetussage_tbl where departmentid = ?";
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
              echo "<option value='".$row["assetusageid"]."'>".$row["assetusage"]."</option>";

              
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
