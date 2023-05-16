<?php include 'inventoryclass.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../css/inventory.css">

</head>

<body>
    <?php include '../includes/navbar.php'; ?>
    <?php include '../includes/dbcon.php'; ?>
    <!--magic box-->
    <input type="text" name="txtuserdeptidmagic" id="txtuserdeptidmagic" value="<?php echo $userdeptid; ?>" hidden>
    <!--magic box-->

    <?php


    if ($_SESSION["userlevelid"] == "1") {
        $dashlabel = "Admin";
    } else if ($_SESSION["userlevelid"] == "2") {
        $dashlabel = $_SESSION["department"];
    } else {
        $dashlabel = "Viewer";
    }
    ?>


    <?php

    if ($_SESSION["userlevelid"] == "1") {
        $userdeptid =  $_COOKIE['cookieName'];
    } else if ($_SESSION["userlevelid"] == "2") {
        $DASHBOARDLABEL = $_SESSION["department"];
    } else {
        $userdeptid =  $_COOKIE['cookieName'];
    }

    ?>


    <!-- <div class="container-fluid">
        <span class="glyphicon glyphicon-dashboard"></span>
         <button type="button" form="none" class="btn btn-primary ml-4" data-toggle="modal" data-target="#exampleModal">
                Add Item
            </button>
    </div> -->
    <div class="container-fluid">
        
        <span class="glyphicon glyphicon-dashboard"></span>
        <h1><?php echo $dashlabel . " "; ?>Inventory</h1>
        <div class="row">
        <div class="col-md-2">
        <h4 class="m-2 font-weight-bold text-primary" id="additembutton">Add Item&nbsp;<a href="#" data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
        </div>
        <div class="col-md-3">
        <form id="formexport" action="exportInventoryExcel.php" method="POST">
                              

                              <button type="submit" form="formexport" name="btnexportexcel" class="btn btn-success btn-icon-split" >
                                <span class="icon text-white-50">
                                  <i class="fa fa-file-excel"></i>
                                </span>
                                <span class="text">Export</span>
                              </button>
                        </form>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-3">
        <select class="ml-2 form-control-sm" name="selectstatustosearch" id="selectstatustosearch" >
                                
          <?php populateselectstatus()?>
          </select>
        </div>
        
        </div>
        
        
    </div>
    <div class="row container-fluid">
        <div class="col<?php if ($userlevelid == 1) {
                            echo "-md-2";
                        } else {
                            echo "";
                        } ?> " id="dpttohide">
            <!-- -->
            <div class="row ml-1 mt-5">
            </div>
            <div class="row ml-1">
                <div class="btn-group-vertical" role="group" name="depbtndpt" id="depbtndpt">
                    <?php populatedepartmentbuttons(); ?></div>
            </div>



        </div>
        <div class="col-md-<?php if ($userlevelid == 1) {
                                echo "10";
                            } elseif ($userlevelid == 3) {
                                echo "10";
                            } else {
                                echo "12";
                            } ?>">
            <!-- <h1 id="dptlabel" name="dptlabel"><?php echo " "; ?>Inventory</h1> -->

            <div class="mt-1 container-fluid">
                <!-- <div class="btn-group" name="catbtndpt" id="catbtndpt" style="overflow-x :auto; max-width:1000px;">
                ?php populatecategorybuttons($userdeptid); ?></div> -->

                <!-- <div class="form-row">
                    <label>Category</label>
                    <select class="ml-2 form-control-sm" name="selectcategory" id="selectcategory">
                        ?php populateselectcategory($userdeptid); ?>
                    </select>
                </div> -->

                <div class="mt-2 table-responsive" style="overflow-y:auto;max-height:650px;">
                    <table id="tblinventory" class="table table-bordered border-primary table-hover text-center display" style="width:100%;">
                        <thead class="bg-primary border-primary">

                            <th>Item Code</th>
                            <th>Brand</th>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th id="action">Action</th>

                        </thead>
                        <tbody id="tbodyinventory" style="cursor: pointer;">
                            <?php populatetblinventory($userdeptid,$userlevelid); ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


    <!-- Add Item Modal -->
    <!-- <div class="modal fade rounded" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end Add Item Modal -->
    <!-- Item Details Modal -->
    <div class="modal fade" id="animalModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">Item Details</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- animal details will be displayed here -->
                </div>
            </div>
        </div>
    </div>


    <!-- edn Item Details Modal -->



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
                                            <span class="inputfield input-group-text" style="width:136px;">Item Name</span>
                                        </div>
                                        <input type="text" class="inputfield form-control" name="txtitemname" placeholder="Enter Item Name" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="inputfield input-group-text" style="width:136px;">Brand</span>
                                        </div>
                                        <input type="text" class="inputfield form-control" name="txtbrandname" placeholder="Enter Brand">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-1" id="divdepartment">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="inputfield input-group-text" style="width:136px;">Department</span>
                                        </div>
                                        <select class="inputfield form-control" name="selectdepartment" id="selectdepartment" required>
                                            <option value="Select Department" selected disabled>Select Department</option>
                                            <?php populateselectdepartment(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="inputfield input-group-text" style="width:136px;">Category</span>
                                        </div>
                                        <select class="inputfield form-control select2" name="selectcategoryinadd" id="selectcategoryinadd" required>
                                            <option value="" selected disabled>Select Category</option>
                                            <?php populateselectcategory($userdeptid); ?>
                                            <option class="btn btn-secondary" value="clickcategory">--CLICK ME TO ADD NEW CATEGORY!--</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="inputfield input-group-text" style="width:136px;">Asset Usage</span>
                                        </div>
                                        <select class="inputfield form-control" data-live-search="true" name="selectassetusage" id="selectassetusage" required>
                                            <option value="" selected disabled>Select Usage</option>
                                            <?php populateassetusage($userdeptid); ?>
                                            <option class="btn btn-secondary" value="clickassetusage">--CLICK ME TO ADD NEW ASSET USAGE!--</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-12 mt-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="inputfield input-group-text" style="width:136px;">Location</span>
                                        </div>
                                        <select class="inputfield form-control select2" name="selectlocationinadd" id="selectlocationinadd" required>
                                            <option value="" selected disabled>Select Location</option>
                                            <?php populateselectlocation($userdeptid); ?>
                                            <option class="btn btn-secondary" value="clicklocation">--CLICK ME TO ADD NEW location!--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="inputfield input-group-text" style="width:136px;">Supplier</span>
                                        </div>
                                        <select class="inputfield form-control" name="selectsupplier" id="selectsupplier" required>
                                            <option value="" selected disabled>Select Supplier</option>
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
                                <!-- <div class="col-md-6 mt-1">
                                                                      <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                        <span class="inputfield input-group-text" style="width:136px;">Item Type</span>
                                                                                </div>
                                                                                <select class="inputfield form-control" name="selectconsumable" id="selectconsumable" required>
                                                                                ?php populateselectconsumable(); ?>
                                                                                </select>
                                                                      </div>
                                                            </div> -->
                                <!-- <div class="col-md-6 mt-1" id="daysremaining">
                                                                      <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                      <span class="inputfield input-group-text">Days before Expiration</span>
                                                                                </div>
                                                                                <input type="number" class="inputfield form-control" name="txtdaysremaining" min="1" id="txtdaysremaining" value="1">
                                                                      </div>

                                                            </div> -->

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
    <?php include '../includes/footer.php'; ?>
</body>





<script src="../js/inventory.js" type="text/javascript"></script>

</html>
<?php
if ($_SESSION["userlevelid"] == 1) {
    hidemenu1("catbtndpt");
} else if ($_SESSION["userlevelid"] == 2) {
    hidemenu1("depbtndpt");
    hidemenu1("dptlabel");
    hidemenu1("divdepartment");
    hidemenu1("dpttohide");
} else if ($_SESSION["userlevelid"] == 3) {
    hidemenu1("additembutton");
   
}


function hidemenu1($menuname)
{
    echo "<script> document.getElementById('" . $menuname . "').style.display = 'none'; </script>";
}
?>
<?php
if (isset($_POST["btnadditem"])) {
    $itemcode = strtoupper($_POST["txtitemcode"]);
    $itemname = $_POST["txtitemname"];
    $brand = $_POST["txtbrandname"];
    if ($userlevelid == 2 || $userlevelid == 3) {
        $departmentid = $userdeptid;
    } else {
        $departmentid = $_POST["selectdepartment"];
    }

    $categoryid = $_POST["selectcategoryinadd"];
    $supplierid = $_POST["selectsupplier"];
    $location = $_POST["selectlocationinadd"];
    $assetusageid = $_POST["selectassetusage"];

    $unitid  = $_POST["selectunit"];
    $quantity = $_POST["txtquantity"];
    $datepurchased = $_POST["txtdatepurchased"];


    addinventory(
        $itemcode,
        $itemname,
        $brand,
        $departmentid,
        $categoryid,
        $supplierid,
        $location,
        $assetusageid,
        $unitid,
        $quantity,
        $datepurchased
    );
}
?>
<script>
      $("#selectstatustosearch").change(function(){
        var depid =  $("#selectstatustosearch").val();
       var depids = "<?php echo $userdeptid; ?>";
        $.post("invsearchbystatus.php" , {
         depid:depid , depids :depids
        },function(data){
          $("#tbodyinventory").html(data);
        });
 });
</script>