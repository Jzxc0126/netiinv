<?php
$itemid = $_GET["id"];

try
{
    include '../includes/dbcon.php';
   
    $query = "SELECT a.itemid , a.itemcode , a.itemname, a.brand,a.departmentid,a.categoryid,a.supplierid,a.locationid,a.assetusageid,a.assetstatusid,
    b.department,
    c.category,
    g.supp_name,
    d.locationname,
    e.assetusage,
    f.consumable,
    h.assetstatus
     from inventory_tbl AS a inner join department_tbl as b on a.departmentid=b.departmentid
                              INNER join category_tbl as c on a.categoryid=c.categoryid
                             INNER JOIN supplier_tbl as g on a.supplierid=g.supplierid
                             INNER JOIN location_tbl as d on a.locationid=d.locationid
                             INNER JOIN assetusage_tbl as e on a.assetusageid=e.assetusageid
                             INNER JOIN consumabletype_tbl as f on a.consumabletypeid=f.consumabletypeid
                             INNER JOIN assetstatus_tbl as h on a.assetstatusid=h.assetstatusid
     Where itemid = $itemid ";
    $query_run = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($query_run);
    echo '<h3> Item Code : ' . $row['itemcode'] . '</h3>';

    echo '<div class="form-group row text-left"> <div class="col-sm-3 text-primary">
          <h5>
          Item Name:
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
             '. $row['itemname'] .' <br>
          </h5>
        </div>
      </div>';
      echo '<div class="form-group row text-left"> <div class="col-sm-3 text-primary">
          <h5>
          Brand:
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            '. $row['brand'] .' <br>
          </h5>
        </div>
      </div>';
      echo '<div class="form-group row text-left"> <div class="col-sm-3 text-primary">
      <h5>
      Department:
      </h5>
    </div>
    <div class="col-sm-9">
      <h5>
        '. $row['department'] .' <br>
      </h5>
    </div>
  </div>';
  echo '<div class="form-group row text-left"> <div class="col-sm-3 text-primary">
  <h5>
  Category:
  </h5>
</div>
<div class="col-sm-9">
  <h5>
    '. $row['category'] .' <br>
  </h5>
</div>
</div>';
echo '<div class="form-group row text-left"> <div class="col-sm-3 text-primary">
  <h5>
  Supplier Name:
  </h5>
</div>
<div class="col-sm-9">
  <h5>
    '. $row['supp_name'] .' <br>
  </h5>
</div>
</div>';
echo '<div class="form-group row text-left"> <div class="col-sm-3 text-primary">
  <h5>
  Location:
  </h5>
</div>
<div class="col-sm-9">
  <h5>
    '. $row['locationname'] .' <br>
  </h5>
</div>
</div>';

echo '<div class="form-group row text-left"> <div class="col-sm-3 text-primary">
  <h5>
  Asset Usage:
  </h5>
</div>
<div class="col-sm-9">
  <h5>
    '. $row['assetusage'] .' <br>
  </h5>
</div>
</div>';
echo '<div class="form-group row text-left"> <div class="col-sm-3 text-primary">
  <h5>
  Status:
  </h5>
</div>
<div class="col-sm-9">
  <h5>
    '. $row['assetstatus'] .' <br>
  </h5>
</div>
</div>';

   

}
catch (\Exception $e)
{

}
try
{
    include '../includes/dbcon.php';
    $query2 = "SELECT * from files_tbl where itemid = $itemid ORDER BY `files_tbl`.`fileid` DESC";
    $query_run2 = mysqli_query($conn, $query2);
    echo '<table id="tblfiles" class="table table-bordered border-primary table-hover text-center display" style="width:100%;">
    <tr class="bg-warning border-primary">
        <th>Id</th>
        <th>Assigned to</th>
        <th>Link</th>
        <th>Photo</th>
        

    </tr>';
    while($row2 = mysqli_fetch_assoc($query_run2))

    {
      echo '

    

      <tr>
       
          <td>'. $row2['fileid'] .'</td>
          <td>'. $row2['file_owner'] .'</td>
          <td><a href="../uploads/'. $row2['filename'] .'">'. $row2['filename'] .'</td>
          <td><img src="../uploads/'. $row2['filename'] .'" width=100px alt="'. $row2['filename'] .'"></td>
          
         
      </tr>



      
      ';
    }
}
catch (\Exception $e)
{

}
if ($row['category'] != 'Laptop')
{
  hidemenu11("tblfiles");
}
function hidemenu11($menuname)
{
    echo "<script> document.getElementById('" . $menuname . "').style.display = 'none'; </script>";
}
?>
<script>
 $(document).ready(function() {
    $('#tblfiles').DataTable( {
        dom: 'Bfrtip',
        "scrollY": 200,
        "scrollX": true,
        buttons: [
            'copy',
            'excel',
            'csv',
            'pdfHtml5',
            'print'
        ]
    } );
} );

</script>