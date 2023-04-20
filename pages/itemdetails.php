<?php
$itemid = $_GET["id"];

try
{
    include '../includes/dbcon.php';

    $query = "SELECT a.itemid , a.itemcode , a.itemname, a.brand,
    b.department,
    c.category,
    g.supp_name,
    d.locationname,
    e.assetusage,
    f.consumable
     from inventory_tbl AS a inner join department_tbl as b on a.departmentid=b.departmentid
     						 INNER join category_tbl as c on a.categoryid=c.categoryid
                             INNER JOIN supplier_tbl as g on a.supplierid=g.supplierid
                             INNER JOIN location_tbl as d on a.locationid=d.locationid
                             INNER JOIN assetussage_tbl as e on a.assetusageid=e.assetusageid
                             INNER JOIN consumabletype_tbl as f on a.consumabletypeid=f.consumabletypeid
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

    



    mysqli_close($conn);

}
catch (\Exception $e)
{

}

?>