<?php include 'supplierclass.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
</head>
<style>
    thead input {
        width: 100%;
    }
</style>

<body>

    <?php include '../includes/navbar.php'; ?>
    <?php include '../includes/dbcon.php'; ?>


    <!--Content-->
    <div class="container-fluid mt-3" style="max-width: 90%">
        <div class="card" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 10px;-webkit-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);-moz-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);box-shadow: 1px 1px 23px 9px rgb(0 71 171 / 55%);">
            <div class="card-header py-3" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 5px;">
                <h4 class="m-2 font-weight-bold text-primary"><i class="fa-sharp fa-solid fa-boxes-packing"></i>&nbsp;Manage Suppliers</h4>
            </div>
            <div class="card-body">
                <div class="row">


                    <!--add cat form-->
                    <div class="mt-3 col-md-3">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to add supplier?');">
                                        <!-- name -->
                                        <label class="label">Supplier Name</label>
                                        <input class="form-control" type="text" name="txtsuppname" required>
                                        <!-- Supplier Contact Number -->
                                        <label class="label">Supplier Contact Number</label>
                                        <input class="form-control" type="text" name="txtcontactnumber" required>
                                        <!-- Supplier Contact Person -->
                                        <label class="label">Contact Person</label>
                                        <input class="form-control" type="text" name="txtcontactperson" required>
                                        <!-- Supplier Address -->
                                        <label class="label">Supplier Address</label>
                                        <textarea class="form-control" type="text" name="txtaddress" required></textarea>

                                        <label class="label" id="labelsupplier">Department</label>
                                        <select class="form-control" name="selectdepartment" id="selectdepartment">
                                            <option disabled value="" selected="">Select Department</option>
                                            <?php populatedepartment(); ?>
                                        </select>
                                        
                                        <input class="mt-2 btn btn-primary" type="submit" name="btnaddsupplier" id="btnaddsupplier" value="Add Supplier">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--add cat form end-->

                    <div class="mt-3 col-md-9 table-responsive" style="overflow-y:auto;max-height:650px;">

                        <div class="row">
                            <div class="col-md-8 ">

                            </div>
                            <div class="col-md-4 mb-2 d-flex justify-content-end">
                                <button type="button" data-toggle="modal" data-target="#deletedcatmodal" class="btn btn-danger">Deleted Supplier</button>
                            </div>

                        </div>
                        <table id="example" class="table table-bordered border-primary table-hover text-center display" style="width:100%;">
                            <thead class="bg-primary border-primary">
                                <tr>
                                <th hidden>  Supplier ID</th>
                                    <th>Supplier Name</th>
                                    <th>Contact Number</th>
                                    <th>Contact Person</th>
                                    <th>Address</th>
                                    <?php if ($userlevelid == 1) {
                                        echo "<th>Department</th>";
                                    } ?>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php populatetblsupplier($userlevelid, $userdeptid); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit category Modal -->
    <div class="modal fade" id="editsuppmodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Edit Supplier</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="supplieredit.php" method="POST" onsubmit="return confirm('Are you sure you want to edit Supplier?');">
                    <div class="modal-body">
                        <input type="hidden" id="txtsuppid" name="txtsuppid">
                        <div class="form-group">
                            <label for="">Supplier Name</label>
                           
                            <input type="text" name="suppliername" id="suppliername" class="form-control" value="" required>
                            <label for="">Contact Number</label>
                            <input type="text" name="suppliercon" id="suppliercon" class="form-control" value="" required>
                            <label for="">Contact Person</label>
                            <input type="text" name="contactperson" id="contactperson" class="form-control" value="" required>
                            <label class="label">Supplier Address</label>
                                        <textarea class="form-control" type="text" name="supplieraddress" id="supplieraddress" value="" required></textarea>
                            
                            <!-- <label class="label" id="editlabeldepartment">Department</label>
                            <select class="form-control" name="editselectdepartment " id="editselectdepartment " required>
                                            <?php populatedepartment(); ?>
                                        </select> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="updatesupp">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Edit category Modal -->
    <!-- Deleted Category Modal -->
    <div class="modal fade" id="deletedcatmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="width: 800px;">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Deleted Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="tbldeletedsupp" class="table table-bordered border-primary table-hover text-center" style="width:100%;">
                        <thead class="bg-danger border-primary">
                            <tr>
                                
                                <th>Supplier Name</th>
                                <th>Contact Number</th>
                                <th>Contact Person</th>
                                <!-- <th>Address</th> -->
                                <?php if ($userlevelid == 1) {
                                    echo "<th>Department</th>";
                                } ?>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php populatedeletesupptable($userlevelid, $userdeptid); ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!-- End Deleted category Modal -->


    <!--Content End-->
    <?php include '../includes/footer.php'; ?>
    <!-- jQuery -->
    <script src="../js/supplier.js" type="text/javascript"></script>
    <!--dt tblend-->

</body>

</html>
<?php
if ($userlevelid == 2) {
    echo "<script>
        document.getElementById('labelsupplier').style.display = 'none';
        document.getElementById('selectdepartment').style.display = 'none';
        </script>";
}
if (isset($_POST["btnaddsupplier"])) {
    $suppname = $_POST["txtsuppname"];
    $suppcontact = $_POST["txtcontactnumber"];
    $suppconperson = $_POST["txtcontactperson"];
    $suppaddress = $_POST["txtaddress"];

    if ($userlevelid == 2) {
        $deptid = $userdeptid;
    } else if ($userlevelid == 1) {
        $deptid = $_POST["selectdepartment"];
    }
  

        $sql1 = "SELECT supplierid,supp_name
        FROM supplier_tbl WHERE 
        supp_name='$suppname' ";
        include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
        $result = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result) > 0) {
            echo "<script> alert('Supplier Already Exist! Try Again!'); </script>";
        } 
        else {
            if ($deptid == "") {
                echo "<script>alert('Please Select Category'); </script>";
                echo "<script> window.location.replace('supplier.php'); </script>";
            } else {
            addsupplier($suppname, $suppcontact,$suppconperson,$suppaddress,$deptid);
            }
        }
    
}
?>
<script>
    $(document).ready(function() {
        $('.edit_btn').click(function(e) {
            $('#editsuppmodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();

            }).get();
            console.log(data);
             $('#txtsuppid').val(data[0]);
            $('#suppliername').val(data[1]);
            $('#suppliercon').val(data[2]);
            $('#contactperson').val(data[3]);
            $('#supplieraddress').val(data[4]);
            // $('#editselectdepartment').val(data[5]);

        });

    });
    
</script>