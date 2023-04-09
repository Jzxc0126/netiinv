<?php
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
function populateselectcategory($userdeptid)
{
      try
      {
              include '../includes/dbcon.php';
              $statement = $conn->prepare("Select * from category_tbl where departmentid = ".$userdeptid." ");
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
function populateselectitemgroup($userdeptid)
{
      try
      {
              include '../includes/dbcon.php';
              $statement = $conn->prepare("Select * from tblitemgroup where deleted = 0 and departmentid = ".$userdeptid." ");
              $statement->execute();
              $result = $statement->get_result();
                      while($row = $result->fetch_assoc())
                      {
                          echo "<option value='".$row["itemgroupid"]."'>".$row["itemgroupname"]."</option>";
                      }
              $conn->close();
      }
      catch (\Exception $e)
      {

      }
}
function populateselectsupplier($userdeptid)
{
      try
      {
              include '../includes/dbcon.php';
              $statement = $conn->prepare("Select * from supplier_tbl where departmentid = ".$userdeptid." ");
              $statement->execute();
              $result = $statement->get_result();
                      while($row = $result->fetch_assoc())
                      {
                          echo "<option value='".$row["supplierid"]."'>".$row["suppliername"]."</option>";
                      }
              $conn->close();
      }
      catch (\Exception $e)
      {

      }
}
function populateassetusage($userdeptid)
{
      try
      {
              include '../includes/dbcon.php';
              $statement = $conn->prepare("Select * from assetusage_tbl wher departmentid = ".$userdeptid." ");
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
function populateselectunit()
{
      try
      {
              include '../includes/dbcon.php';
              $statement = $conn->prepare("Select * from unit_tbl");
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
function populateselectconsumable()
{
      try
      {
              include '../includes/dbcon.php';
              $statement = $conn->prepare("Select * from consumabletype_tbl order by consumable desc");
              $statement->execute();
              $result = $statement->get_result();
                      while($row = $result->fetch_assoc())
                      {
                          echo "<option value='".$row["consumableid"]."'>".$row["consumable"]."</option>";
                      }
              $conn->close();
      }
      catch (\Exception $e)
      {

      }
}
function populatetableinventory($userlevelid , $userdeptid , $editid , $deleteid)
{
      try
      {
                include '../includes/dbcon.php';
                if($userlevelid == 2 || $userlevelid == 3)
                {
                  $statement = $conn->prepare("Select a.itemcode,a.itemname,a.serialnumber,a.macaddress,a.datepurchased,a.daysremaining,a.brand,a.piece,
                                              b.department,
                                              c.category,
                                              e.suppliername,
                                              g.location,h.specificlocation,a.dateissued,
                                              f.assetusage,
                                              i.assetstatus,
                                              j.unit
                                              from
                                              inventory_tbl as a inner join tbldepartment as b
                                              on a.departmentid=b.departmentid
                                              inner join category_tbl as c
                                              on a.categoryid=c.categoryid
                                              inner join tblsupplier as e
                                              on a.supplierid=e.supplierid
                                              inner join tblassetusage as f
                                              on a.assetusageid=f.assetusageid
                                              inner join tbllocation as g
                                              on a.locationid=g.locationid
                                              inner join tblspecificlocation as h
                                              on a.specificlocationid=h.specificlocationid
                                              inner join tblassetstatus as i
                                              on a.assetstatusid=i.assetstatusid
                                              inner join tblunit as j
                                              on a.unitid=j.unitid
                                              where a.deleted = 0 and a.departmentid = ".$userdeptid." order by a.itemid asc limit 10 ");
                }
                else
                {
                  $statement = $conn->prepare("Select a.itemcode,a.itemname,a.serialnumber,a.macaddress,a.datepurchased,a.daysremaining,a.brand,a.piece,
                                              b.department,
                                              c.category,
                                              e.suppliername,
                                              g.location,h.specificlocation,a.dateissued,
                                              f.assetusage,
                                              i.assetstatus,
                                              j.unit
                                              from
                                              inventory_tbl as a inner join tbldepartment as b
                                              on a.departmentid=b.departmentid
                                              inner join category_tbl as c
                                              on a.categoryid=c.categoryid
                                              inner join tblsupplier as e
                                              on a.supplierid=e.supplierid
                                              inner join tblassetusage as f
                                              on a.assetusageid=f.assetusageid
                                              inner join tbllocation as g
                                              on a.locationid=g.locationid
                                              inner join tblspecificlocation as h
                                              on a.specificlocationid=h.specificlocationid
                                              inner join tblassetstatus as i
                                              on a.assetstatusid=i.assetstatusid
                                              inner join tblunit as j
                                              on a.unitid=j.unitid
                                              where a.deleted = 0 order by a.itemid asc limit 10");
                }

                $statement->execute();
                $result = $statement->get_result();
                        while($row = $result->fetch_assoc())
                        {
                            echo "<tr>";
                            echo "<td>";

                            switch ($deleteid) {
                              case '0':
                                    echo "<a class='btn btn-primary btn-sm' href='deleteinventory.php?itemcode=".$row["itemcode"]."&&itemname=".$row["itemname"]."' style='color:white;font-size:11px;width:52px;'>
                                      Delete
                                      </a>";
                                    break;
                              default: break;
                            }

                            switch ($editid) {
                              case '0':
                              echo "<a class='btn btn-secondary btn-sm' href='editinventory.php?itemcode=".$row["itemcode"]."' style='color:white;font-size:11px;width:52px;'>
                                    Edit
                                    </a>";
                                    break;

                              default: break;
                            }

                            echo "
                                  </td>";
                            echo "<td>".$row["itemcode"]."</td>
                                  <td>".$row["brand"]."</td>
                                  <td>".$row["itemname"]."</td>
                                  <td>".$row["category"]."</td>";
                            if($userdeptid == 4)
                            {
                                echo "<td>".$row["serialnumber"]."</td>
                                      <td>".$row["macaddress"]."</td>";
                            }
                            echo "<td hidden>".$row["department"]."</td>
                                  <td>".$row["location"]."</td>
                                  <td>".$row["specificlocation"]."</td>
                                  <td>".$row["suppliername"]."</td>
                                  <td>".$row["datepurchased"]."</td>
                                  <td>".$row["dateissued"]."</td>
                                  <td>".$row["assetusage"]."</td>
                                  <td>".$row["assetstatus"]."</td>";
                            echo "<td>".$row["daysremaining"]."</td>";
                            echo "<td>".$row["piece"]." ".$row["unit"]."</td>";
                            echo "</tr>";
                        }
      }
      catch (\Exception $e)
      {

      }

}
function addinventory($itemcode , $itemname , $departmentid , $categoryid  , $supplierid ,
                      $assetusageid, $consumabletypeid , $daysremaining , $unitid , $quantity , $datepurchased , $brand ,$userdeptid)
{
      $originalquantity = $quantity;
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
      //procedure for checking property code end

      //switch location and specific location
      switch ($userdeptid)
      {
        case '1': $locid = 70 ; $specloc = 328; break;
        case '2': $locid = 71 ; $specloc = 329; break;
        case '3': $locid = 72 ; $specloc = 330; break;
        case '4': $locid = 1 ; $specloc = 1; break;
        case '5': $locid = 73 ; $specloc = 331; break;
        case '6': $locid = 74 ; $specloc = 332; break;
        case '7': $locid = 75 ; $specloc = 333; break;
        case '8': $locid = 76 ; $specloc = 334; break;
        case '9': $locid = 78 ; $specloc = 339; break;
      }
      //switch location and specific location


              //adding of item
              for ($x = 0; $x < $quantity; $x++)
              {
                  if(strlen($codecount) == 1){ $newcodecount = "00".$codecount; }
                  else if(strlen($codecount) == 2){ $newcodecount = "0".$codecount; }
                  else if(strlen($codecount) == 3){ $newcodecount = $codecount; }
                  $statement2 = $conn->prepare("insert into inventory_tbl(itemid,itemcode,itemname,departmentid,categoryid,supplierid,
                                                assetusageid,consumabletypeid,daysremaining,unitid,locationid,specificlocationid,assetstatusid,datepurchased,brand,piece) values (NULL,?,?,?,?,?,?,?,?,?,".$locid.",".$specloc.",1,?,?,1)");
                  $statement2->bind_param("ssiiiiiiiss" , $Itemcodee , $Itemname, $Departmentid , $Categoryid  , $Supplierid , $Assetusageid,
                                          $Consumabletypeid , $Daysremaining , $Unitid , $Datepurchased , $Brand);

                  $Itemcodee = $itemcode."-".$newcodecount;
                  $Itemname = $itemname;
                  $Departmentid = $departmentid;
                  $Categoryid = $categoryid;
                  $Supplierid = $supplierid;
                  $Assetusageid = $assetusageid;
                  $Consumabletypeid = $consumabletypeid;
                  $Daysremaining = $daysremaining;
                  $Unitid = $unitid;
                  $Datepurchased = $datepurchased;
                  $Brand = $brand;
                  $statement2->execute();
                  $codecount++;
              }
              //adding of item end

              $conn->close();
              echo "<script> window.location.replace('addinventory.php'); </script>";
      //filter for adding  unit end


}

function addinventoryunitcontroller($itemcode , $itemname , $departmentid , $categoryid  , $supplierid ,
                      $assetusageid, $consumabletypeid , $daysremaining , $unitid , $quantity , $datepurchased , $brand ,$userdeptid)
{
      $originalquantity = $quantity;
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
          echo $codecount;
        }
        else
        {
          $codecount = $count + 1;
          echo $codecount;
        }
      }
      //procedure for checking property code end

      //switch location and specific location
      switch ($userdeptid)
      {
        case '1': $locid = 70 ; $specloc = 328; break;
        case '2': $locid = 71 ; $specloc = 329; break;
        case '3': $locid = 72 ; $specloc = 330; break;
        case '4': $locid = 1 ; $specloc = 1; break;
        case '5': $locid = 73 ; $specloc = 331; break;
        case '6': $locid = 74 ; $specloc = 332; break;
        case '7': $locid = 75 ; $specloc = 333; break;
        case '8': $locid = 76 ; $specloc = 334; break;
        case '9': $locid = 78 ; $specloc = 339; break;
      }
      //switch location and specific location


              //adding of item
                  if(strlen($codecount) == 1){ $newcodecount = "00".$codecount; }
                  else if(strlen($codecount) == 2){ $newcodecount = "0".$codecount; }
                  else if(strlen($codecount) == 3){ $newcodecount = $codecount; }
                  $statement2 = $conn->prepare("insert into inventory_tbl(itemid,itemcode,itemname,departmentid,categoryid,supplierid,
                                                assetusageid,consumabletypeid,daysremaining,unitid,locationid,specificlocationid,assetstatusid,datepurchased,brand,piece) values (NULL,?,?,?,?,?,?,?,?,?,".$locid.",".$specloc.",1,?,?,'".$originalquantity."')");
                  $statement2->bind_param("ssiiiiiiiss" , $Itemcodee , $Itemname, $Departmentid , $Categoryid  , $Supplierid , $Assetusageid,
                                          $Consumabletypeid , $Daysremaining , $Unitid , $Datepurchased , $Brand);

                  $Itemcodee = $itemcode."-".$newcodecount;
                  $Itemname = $itemname;
                  $Departmentid = $departmentid;
                  $Categoryid = $categoryid;
                  $Supplierid = $supplierid;
                  $Assetusageid = $assetusageid;
                  $Consumabletypeid = $consumabletypeid;
                  $Daysremaining = $daysremaining;
                  $Unitid = $unitid;
                  $Datepurchased = $datepurchased;
                  $Brand = $brand;
                  $statement2->execute();
              //adding of item end

              $conn->close();
              echo "<script> window.location.replace('addinventory.php'); </script>";
      //filter for adding  unit end


}
?>
