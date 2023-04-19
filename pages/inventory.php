<?php include 'inventoryclass.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
</head>
<style>
    .btn-group-vertical {
        display: block;
        /* overflow-x: auto; */
        max-height: 600px;
    }

    .btn-group-vertical button {
        background-color: royalblue;
        /* Green background */
        border: 1px solid green;
        /* Green border */
        color: white;
        margin-left: 5px;
        /* White text */
        padding: 10px 24px;
        /* Some padding */
        cursor: pointer;
        /* Pointer/hand icon */
        width: 100%;
        /* Set a width if needed */
        display: block;
        /* Make the buttons appear below each other */

    }

    .btn-group-vertical button:not(:last-child) {
        border-bottom: none;
        /* Prevent double borders */
    }

    /* Add a background color on hover */
    .btn-group-vertical button:hover {
        background-color: maroon;
    }

    /* Horizontal */

    tbody {
        background-color: whitesmoke;
    }

    thead input {
        width: 100%;
    }
</style>

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


    <div class="container-fluid">
        <span class="glyphicon glyphicon-dashboard"></span>
        <h1><?php echo $dashlabel . " "; ?>Inventory</h1>
    </div>
    <div class="row container-fluid">
        <div class=col-md-2>

            <div class="row ml-1">

                <h1>Department</h1>

            </div>
            <div class="col">
                <!-- admin -->
                <div class="btn-group-vertical mt-5" role="group" name="depbtndpt" id="depbtndpt">
                    <?php populatedepartmentbuttons(); ?></div>
                <!-- user -->
            </div>



        </div>
        <div class="col-md-10">
            <h1 id="dptlabel"><?php echo "" . $userdeptid . " "; ?>Inventory</h1><button type="button" form="none" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add Item
            </button>
            <div class="mt-5 container-fluid">
                <!-- <div class="btn-group" name="catbtndpt" id="catbtndpt" style="overflow-x :auto; max-width:1000px;">
                <?php populatecategorybuttons($userdeptid); ?></div> -->

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
                            <th>Action</th>

                        </thead>
                        <tbody id="tbodyinventory">
                            <?php populatetblinventory($userdeptid); ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade rounded" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div>
</body>




<?php include '../includes/footer.php'; ?>
<script src="../js/inventory.js" type="text/javascript"></script>
</body>

</html>
<?php
if ($_SESSION["userlevelid"] == 1) {
    hidemenu1("catbtndpt");
} else if ($_SESSION["userlevelid"] == 2) {
    hidemenu1("depbtndpt");
    hidemenu1("dptlabel");
}


function hidemenu1($menuname)
{
    echo "<script> document.getElementById('" . $menuname . "').style.display = 'none'; </script>";
}
?>