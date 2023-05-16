<?php
if(isset($_POST["depid"]))
{
    $statusid = $_POST["depid"];
    $deptid = $_POST["depids"];
    $query = "SELECT a.itemid,a.itemcode,a.brand, a.itemname ,
    b.category,
    c.locationname
    FROM inventory_tbl as a INNER JOIN category_tbl as b ON a.categoryid=b.categoryid
                INNER JOIN location_tbl as c on a.locationid=c.locationid
    
    
    where a.assetstatusid = ? and a.consumabletypeid = 1 and a.departmentid = $deptid ";

try 
{
    include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
    $statement = $conn->prepare($query);
    $statement->bind_param("i" , $Statusid);
    $Statusid = $statusid;
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
             
         
           <a type="button" class="btn btn-primary bg-gradient-primary" href="inventoryedit.php?ids=' . $row['itemid'] . '"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
             
           
         </div></td>';
              echo "</tr>";
            }
    $conn->close();
}
// <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 10px;margin-top:2px;" href="item_resetpass.php?ids=' . $row['itemid'] . '">
//              <i class="fa-duotone fa-key-skeleton"></i>  <i class="fa-solid fa-trash fa-xs"></i> Delete
//              </a>

catch (\Exception $e)
{

}

}
?>
<script>
        $('#tblinventory tbody tr').click(function() {
        // retrieve item data from server
        var id = $(this).attr('id');
        $.get('itemdetails.php', {id: id}, function(data) {
                // display modal with item details
                $('#animalModal .modal-body').html(data);
                $('#animalModal').modal('show');
        });
    });
</script>