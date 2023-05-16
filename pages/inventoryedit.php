<?php
include 'inventoryclass.php';
include 'head.php';
include '../includes/navbar.php';
include '../includes/dbcon.php';

$query2 = 'SELECT a.itemid , a.itemcode , a.itemname, a.brand,a.departmentid,a.categoryid,a.supplierid,a.locationid,a.assetusageid,a.assetstatusid,
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
 Where itemid =' . $_GET['ids'];

$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($result2)) {
    $itemid = $row['itemid'];
    $itemcode = $row['itemcode'];
    $itemname = $row['itemname'];
    $brand = $row['brand'];
    $dprtmntid = $row['departmentid'];
    $department = $row['department'];
    $categoryid = $row['categoryid'];
    $category = $row['category'];
    $supplierid =  $row['supplierid'];
    $supp_name = $row['supp_name'];
    $locationid = $row['locationid'];
    $locationname = $row['locationname'];
    $assetusageid = $row['assetusageid'];
    $assetusage = $row['assetusage'];
    $statusid = $row['assetstatusid'];
    $status = $row['assetstatus'];
    $consumable = $row['consumable'];
}
$file_ids = $_GET['ids'];

$statement2 = $conn->prepare("SELECT fileid,filename from files_tbl where itemid = $file_ids");
                    $statement2->execute();
                    $result2 = $statement2->get_result();
                    $num_rows = mysqli_num_rows($result2);
                    if(empty($num_rows) == true)
                    {
                            $filename = "Template.pdf";
                    }
                    else
                    {
                            if($rows2 = $result2->fetch_assoc())
                            {
                                $fileid = $rows2['fileid'];
                                $filename = $rows2['filename'];
                           
                            }
                            else{
                              $filename = "Template.pdf";
                            }
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

<div class="container-fluid mt-3" style="max-width:800px;">
    <div class="card" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 10px;-webkit-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);-moz-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);box-shadow: 1px 1px 23px 9px rgb(0 71 171 / 55%);">
        <div class="card-header py-3" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 5px;">
            <h4 class="m-2 font-weight-bold text-primary"><i class="fa-solid fa-user-tie"></i>&nbsp;Edit <?php echo $itemcode; ?>'s Details</h4>
        </div>
        <div class="row">
            <div class="col-md-2" style="margin-left: 20px;">
                <a href="inventory.php?" type="button" class="btn btn-primary bg-gradient-primary"><i class="fa-solid fa-arrow-left"></i></i> Back</a>

            </div>
            <div class="col-md-6">
           
            
                
            </div>

        </div>
        <div class="form-group mt-2">
            <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to Edit item?');">

                <div class="form-row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="inputfield input-group-text" style="width:136px;">Item Code</span>
                            </div>
                            <input type="text" id="propertycode" class="inputfield form-control" name="txtitemcode" maxlength="10" placeholder="Enter Item Code" value="<?php echo $itemcode ?>" disabled required>
                        </div>
                    </div>
                    <div class="col-md-12 mt-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="inputfield input-group-text" style="width:136px;">Item Name</span>
                            </div>
                            <input type="text" class="inputfield form-control" name="txtitemname" placeholder="Enter Item Name" value="<?php echo $itemname ?>" required>
                        </div>
                    </div>
                    <div class="col-md-12 mt-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="inputfield input-group-text" style="width:136px;">Brand</span>
                            </div>
                            <input type="text" class="inputfield form-control" name="txtbrandname" placeholder="Enter Brand" value="<?php echo $brand ?>" required>
                        </div>
                    </div>
                    <div class="col-md-12 mt-1" id="divdepartment">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="inputfield input-group-text" style="width:136px;">Department</span>
                            </div>
                            <select class="inputfield form-control" name="editselectdepartment" id="editselectdepartment" value="<?php echo $dprtmntid ?>">
                                <option value="<?php echo $dprtmntid ?>" style="background-color :rgb(1 105 250);color:white;"><?php echo $department ?></option>
                                <?php populateselectdepartment(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mt-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="inputfield input-group-text" style="width:136px;">Category</span>
                            </div>
                            <select class="inputfield form-control select2" name="selectcategory" id="selectcategory" value="<?php echo $category ?>" required>
                                <option value="<?php echo $categoryid ?>" style="background-color :rgb(1 105 250);color:white;"><?php echo $category ?></option>

                                <?php populateselectcategory($userdeptid); ?>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mt-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="inputfield input-group-text" style="width:136px;">Asset Usage</span>
                            </div>
                            <select class="inputfield form-control" data-live-search="true" name="selectassetusage" id="selectassetusage" value="<?php echo $assetusage ?>" required>
                                <option value="<?php echo $assetusageid ?>" style="background-color :rgb(1 105 250);color:white;"><?php echo $assetusage ?></option>

                                <?php populateassetusage($userdeptid); ?>

                            </select>

                        </div>
                    </div>
                    <div class="col-md-12 mt-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="inputfield input-group-text" style="width:136px;">Location</span>
                            </div>
                            <select class="inputfield form-control select2" name="selectlocation" id="selectlocation" value="<?php echo $locationname ?>" required>
                                <option value="<?php echo $locationid ?>" style="background-color :rgb(1 105 250);color:white;"><?php echo $locationname ?></option>

                                <?php populateselectlocation($userdeptid); ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mt-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="inputfield input-group-text" style="width:136px;">Supplier</span>
                            </div>
                            <select class="inputfield form-control" name="selectsupplier" id="selectsupplier" value="<?php echo $supp_name ?>" required>
                                <option value="<?php echo $supplierid ?>" style="background-color :rgb(1 105 250);color:white;"><?php echo $supp_name ?></option>

                                <?php populateselectsupplier($userdeptid); ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mt-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="inputfield input-group-text" style="width:136px;">Status</span>
                            </div>
                            <select class="inputfield form-control" name="selectstatus" id="selectstatus" value="<?php echo $status ?>" required>
                                <option value="<?php echo $statusid ?>" style="background-color :rgb(1 105 250);color:white;"><?php echo $status ?></option>

                                <?php populateselectstatus(); ?>

                            </select>
                        </div>
                    </div>
                    <!-- <div class="col-md-12 mt-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="inputfield input-group-text">Date Purchased</span>
                                        </div>
                                        <input type="date" class="inputfield form-control" name="txtdatepurchased" required>
                                    </div>
                                </div> -->


                    <!--<div class="col-md-6">
                                                                      <label>Item Group</label>
                                                                      <select class="form-control" name="selectitemgroup" id="selectitemgroup">
                                                                      <?php //populateselectitemgroup($userdeptid);
                                                                        ?>
                                                                      </select>
                                                            </div>-->
                    <!-- <div class="col-md-6 mt-1">
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
                                </div> -->
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
                <input type="submit" class="mt-2 btn btn-primary btn-block" name="btnupdateitem" value="Update Item">
            </form>

        </div>
        <div class="col-md-12 mt-1"  id="fileupload">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="inputfield input-group-text" style="width:120px;">Current File</span>
                            </div>
                            <a href="../uploads/<?php echo $filename ?>">
                            <input type="text" class="inputfield form-control" name="txtcurrent" placeholder="txtcurrent" value="<?php echo $filename ?>" disabled>
                        </div>
                        <form action="process2.php?ids=<?php echo $itemid ?>" method="post"  enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to Upload ?');">
                  <input type="file" class="form-control" name="choosefile"  required>
                           
                  <button type="submit" name="btn_img" class="btn btn-outline-success m-2">
                            Upload
                        </button>
                 

                </form>
                    </div>
        
    </div>
    
</div>
</div>
<?php
if ($category != 'Laptop')
{
hidemenu("fileupload");
hidemenu("tblfiles");
}
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

if (isset($_POST["btnupdateitem"])) {
    $itemid = $u_ids;
    $edititemname = $_POST["txtitemname"];
    $editbrand = $_POST["txtbrandname"];
    if ($userlevelid == 2 || $userlevelid == 3) {
        $editdpt = $userdeptid;
    } else {
        $editdpt = $_POST["editselectdepartment"];
    }

    $editcategory = $_POST["selectcategory"];
    $editassetusage = $_POST["selectassetusage"];
    $editlocation = $_POST["selectlocation"];
    $editsupplier = $_POST["selectsupplier"];
    $editstatus = $_POST["selectstatus"];


    updateitem($itemid, $edititemname, $editbrand, $editdpt, $editcategory, $editassetusage, $editlocation, $editsupplier, $editstatus);
}
?>