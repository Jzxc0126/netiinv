<?php
include 'addinventoryclass.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
</head>
<style>
    .inputfield {
        border-color: white;
        border-style: inset;
    }
    body{
        background-image: url(../img/Under-Maintenance.jpeg);
    }
</style>

<body>

    <?php include '../includes/navbar.php'; ?>
    <div class="container-fluid">
        <span class="glyphicon glyphicon-dashboard"></span>
        <h1>Consumable Asset</h1>
    </div>
    


    <!--MAIN PANEL-->
    <div class="mt-3 container<?php if ($userdeptid == 4) {
                                    echo "-fluid";
                                } else {
                                    echo "";
                                } ?>">
<div class="container-fluid d-flex justify-content-center mt-5 ">
        <span class="glyphicon glyphicon-dashboard"></span>
       <img src="../img/Under-Maintenance.jpeg" alt="">
    </div>


        <!-- <button type="button" form="none" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Item
        </button> -->


        <!-- ADD ITEM MODAL -->
        <div class="modal fade rounded" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Add item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- ADD ITEM FORM -->
                    <div class="modal-body">

                        <div class="form-group">
                            <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to add item?');">

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="inputfield input-group-text" style="width:136px;">Item Code</span>
                                            </div>
                                            <input type="text" id="propertycode" class="inputfield form-control" name="txtitemcode" maxlength="10" placeholder="Enter Item Code" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="inputfield input-group-text" style="width:136px;">Brand</span>
                                            </div>
                                            <input type="text" class="inputfield form-control" name="txtbrandname" placeholder="Enter Brand" value=" ">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="inputfield input-group-text" style="width:136px;">Item Name</span>
                                            </div>
                                            <input type="text" class="inputfield form-control" name="txtitemname" placeholder="Enter Item Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="inputfield input-group-text" style="width:136px;">Category</span>
                                            </div>
                                            <select class="inputfield form-control" name="selectcategory" id="selectcategory" required>
                                                <?php populateselectcategory($userdeptid); ?>
                                                <option class="btn btn-secondary" value="click">--CLICK ME TO ADD NEW CATEGORY!--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="inputfield input-group-text" style="width:136px;">Supplier</span>
                                            </div>
                                            <select class="inputfield form-control" name="selectsupplier" id="selectsupplier" required>
                                                <?php populateselectsupplier($userdeptid); ?>
                                                <option class="btn btn-secondary" value="clicksupplier">--CLICK ME TO ADD NEW SUPPLIER!--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="inputfield input-group-text">Date Purchased</span>
                                            </div>
                                            <input type="date" class="inputfield form-control" name="txtdatepurchased" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="inputfield input-group-text" style="width:136px;">Asset Usage</span>
                                            </div>
                                            <select class="inputfield form-control" name="selectassetusage" id="selectassetusage" required>
                                                <?php populateassetusage($userdeptid); ?>
                                                <option class="btn btn-secondary" value="clickassetusage">--CLICK ME TO ADD NEW ASSET USAGE!--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-1" id="divdepartment">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="inputfield input-group-text" style="width:136px;">Department</span>
                                            </div>
                                            <select class="inputfield form-control" name="selectdepartment" id="selectdepartment" required>
                                                <?php populateselectdepartment(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-6">
                                                                      <label>Item Group</label>
                                                                      <select class="form-control" name="selectitemgroup" id="selectitemgroup">
                                                                      <?php //populateselectitemgroup($userdeptid); 
                                                                        ?>
                                                                      </select>
                                                            </div>-->
                                    <div class="col-md-6 mt-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="inputfield input-group-text" style="width:136px;">Quantity</span>
                                            </div>
                                            <input type="number" class="inputfield form-control" min="1" name="txtquantity" value="1">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="inputfield input-group-text" style="width:184px;">Unit</span>
                                            </div>
                                            <select class="inputfield form-control" name="selectunit" required>
                                                <?php populateselectunit(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="inputfield input-group-text" style="width:136px;">Item Type</span>
                                            </div>
                                            <select class="inputfield form-control" name="selectconsumable" id="selectconsumable" required>
                                                <?php populateselectconsumable(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-1" id="daysremaining">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="inputfield input-group-text">Days before Expiration</span>
                                            </div>
                                            <input type="number" class="inputfield form-control" name="txtdaysremaining" min="1" id="txtdaysremaining" value="1">
                                        </div>

                                    </div>

                                </div>
                                <input type="submit" class="mt-2 btn btn-primary btn-block" name="btnadditem" value="Add Item">
                            </form>
                        </div>

                    </div>
                    <!-- ADD ITEM FORM END-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ADD ITEM MODAL -->







































    </div>
    </div>
    </div>
    <!--MAIN PANEL END-->
    <script src="../js/addinventory.js" ></script>
    <?php include '../includes/footer.php'; ?>
    <!--Chart Script End-->
</body>

</html>


<?php
if($userlevelid == 2 || $userlevelid == 3)
{
  echo "<script> document.getElementById('divdepartment').style.display='none'; </script>";
}
?>
<?php
if(isset($_POST["btnadditem"]))
{
  $itemcode = strtoupper($_POST["txtitemcode"]);
  $itemname = $_POST["txtitemname"];
  if($userlevelid == 2 || $userlevelid == 3)
  {
    $departmentid = $userdeptid;
  }
  else
  {
    $departmentid = $_POST["selectdepartment"];
  }

  $categoryid = $_POST["selectcategory"];
  $supplierid = $_POST["selectsupplier"];
  $assetusageid = $_POST["selectassetusage"];
  $consumabletypeid = $_POST["selectconsumable"];
  $daysremaining = $_POST["txtdaysremaining"];
  $unitid  = $_POST["selectunit"];
  $quantity = $_POST["txtquantity"];
  $datepurchased = $_POST["txtdatepurchased"];
  $brand = $_POST["txtbrandname"];
  if($departmentid == "4")
  {
    addinventory($itemcode , $itemname , $departmentid , $categoryid  , $supplierid ,
                          $assetusageid, $consumabletypeid , $daysremaining , $unitid , $quantity , $datepurchased, $brand , $userdeptid);
  }
  else
  {
    addinventoryunitcontroller($itemcode , $itemname , $departmentid , $categoryid  , $supplierid ,
                          $assetusageid, $consumabletypeid , $daysremaining , $unitid , $quantity , $datepurchased, $brand , $userdeptid);
  }

}
?>
