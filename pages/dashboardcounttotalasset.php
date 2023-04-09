<?php
    if($_SESSION["userlevelid"]=="1")
    {
      include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
$statement  = $conn->prepare("Select COUNT(itemid) from inventory_tbl");
$statement->execute();
$result = $statement->get_result();
        while($row = $result->fetch_assoc())
        {
          $ITEMCOUNT = $row["COUNT(itemid)"];
          echo $ITEMCOUNT;
        }
$conn->close();
    }
    else if($_SESSION["userlevelid"]=="2")
    {
      include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
      $statement  = $conn->prepare("Select COUNT(itemcode) from inventory_tbl where departmentid = ".$userdeptid." ");
      $statement->execute();
      $result = $statement->get_result();
              while($row = $result->fetch_assoc())
              {
                $ITEMCOUNT = $row["COUNT(itemcode)"];
                echo $ITEMCOUNT;
              }
      $conn->close();
    }
    if($_SESSION["userlevelid"]=="3"){
      include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
      $statement  = $conn->prepare("Select COUNT(itemid) from inventory_tbl");
      $statement->execute();
      $result = $statement->get_result();
              while($row = $result->fetch_assoc())
              {
                $ITEMCOUNT = $row["COUNT(itemid)"];
                echo $ITEMCOUNT;
              }
      $conn->close();
    }

?>
