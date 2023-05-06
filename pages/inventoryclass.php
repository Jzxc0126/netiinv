<?php
function addinventory($itemcode , $itemname , $brand, $departmentid , $categoryid  , $supplierid , $location ,
$assetusageid, $unitid , $quantity , $datepurchased )
{
 //procedure for checking property code
 include '../includes/dbcon.php';
 $statement = $conn->prepare("Select COUNT(itemcode) from inventory_tbl where itemcode LIKE '%".$itemcode."%' ");
 $statement->execute();
 $result = $statement->get_result();
 $num_rows = mysqli_num_rows($result);
 while ($row = $result->fetch_assoc())
 {
   $count = $row["COUNT(itemcode)"];
   if($count == 0)
   {
     $codecount = 1;
   }
   else
   {
     $codecount = $count;
     $quantity = $quantity + 1;
   }
 }
//adding of item
for ($x = 0; $x < $quantity; $x++)
{
    if(strlen($codecount) == 1){ $newcodecount = "00".$codecount; }
    else if(strlen($codecount) == 2){ $newcodecount = "0".$codecount; }
    else if(strlen($codecount) == 3){ $newcodecount = $codecount; }
    $statement2 = $conn->prepare("insert into inventory_tbl(itemid,itemcode,itemname,brand,departmentid,categoryid,supplierid,locationid,
                                  assetusageid,consumabletypeid,unitid,piece,assetstatusid,datepurchased) values (NULL,?,?,?,?,?,?,?,?,1,?,?,1,?)");
    $statement2->bind_param("sssiiiiiiis" ,$Itemcodee , $Itemname , $Brand, $Departmentid , $Categoryid  , $Supplierid , $Location ,
    $Assetusageid, $Unitid , $Quantity , $Datepurchased );

    $Itemcodee = $itemcode."-".$newcodecount;
    $Itemname = $itemname;
    $Brand = $brand;
    $Departmentid = $departmentid;
    $Categoryid = $categoryid;
    $Supplierid = $supplierid;
    $Location = $location;
    $Assetusageid = $assetusageid;
    $Unitid = $unitid;
    $Quantity = $quantity;
    $Datepurchased = $datepurchased;
    
    $statement2->execute();
    $codecount++;
}
//adding of item end

$conn->close();
echo "<script> window.location.replace('inventory.php'); </script>";
//filter for adding  unit end


}
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
                 
             
               <a type="button" class="btn btn-primary bg-gradient-primary" href="edit_item_details.php?ids=' . $row['itemid'] . '"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                 <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 10px;margin-top:2px;" href="item_resetpass.php?ids=' . $row['itemid'] . '">
                 <i class="fa-duotone fa-key-skeleton"></i>  <i class="fa-solid fa-trash fa-xs"></i> Delete
                 </a>
               
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
function populateselectlocation($userdeptid)
{
  $query = "Select * from location_tbl where loc_deleted = 1 and departmentid = ?";
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
                echo "<option value='".$row["locationid"]."' >".$row["locationname"]."</option>";
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
