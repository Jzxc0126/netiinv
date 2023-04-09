<?php include 'categoryclass.php'; ?>
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
    <div class="container-fluid mt-3" style="max-width: 80%">
        <div class="card" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 10px;-webkit-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);-moz-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);box-shadow: 1px 1px 23px 9px rgb(0 71 171 / 55%);">
            <div class="card-header py-3" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 5px;">
                <h4 class="m-2 font-weight-bold text-primary"><i class="fa-solid fa-list-ul"></i>&nbsp;Manage Categories</h4>
            </div>
            <div class="card-body">
                <div class="row">


                    <!--add cat form-->
                    <div class="mt-3 col-md-3">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to add category?');">
                                        <label class="label">Categories</label>
                                        <input class="form-control" type="text" name="txtcategory" required>
                                        <label class="label" id="labeldepartment">Department</label>
                                        <select class="form-control" name="selectdepartment" id="selectdepartment">
                                            <option disabled value="" selected="">Select Department</option>
                                            <?php populatedepartment(); ?>
                                        </select>
                                        <input class="mt-2 btn btn-primary" type="submit" name="btnaddcategory" id="btnaddcategory" value="Add Category">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--add cat form end-->

                    <div class="mt-3 col-md-9 table-responsive" style="overflow-y:auto;max-height:650px;">
                        <!-- <div class="row">
                            <div class="col-md-4">
                                <label class="label">Department Filter</label>
                                <select class="form-control mb-2" name="fltrselectdepartment" id="fltrselectdepartment">
                                    <option disabled="" value="" selected="">Select Department</option>
                                    <?php populatedepartment(); ?>
                                </select>
                            </div>
                            <div class="col-md-8">

                            </div>

                        </div> -->

                        <table id="example" class="table table-bordered border-primary table-hover text-center display" style="width:100%;">
                            <thead class="bg-primary border-primary">
                                <tr>

                                    <th>Category ID</th>
                                    <th>Category</th>
                                    <?php if ($userlevelid == 1) {
                                        echo "<th>Department</th>";
                                    } ?>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php populatetblcategory($userlevelid, $userdeptid); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Edit category Modal -->
<div class="modal fade" id="editcatmodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Edit Category</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="categoryedit.php" method="POST" onsubmit="return confirm('Are you sure you want to edit department?');">
      <div class="modal-body">
        <input type="hidden" id="categoryid" name="categoryid">
        <div class="form-group">
            <label for="">Category</label>
            <input type="text" name="category" id="category" class="form-control" value="" required>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="updatedept" >Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Edit category Modal -->



    <!--Content End-->
    <?php include '../includes/footer.php'; ?>
    <!-- jQuery -->
    <script src="../js/category.js" type="text/javascript"></script>
    <!--dt tblend-->

</body>

</html>
<?php
if ($userlevelid == 2) {
    echo "<script>
        document.getElementById('labeldepartment').style.display = 'none';
        document.getElementById('selectdepartment').style.display = 'none';
        </script>";
}
if (isset($_POST["btnaddcategory"])) {
    $category = $_POST["txtcategory"];
    if ($userlevelid == 2) {
        $deptid = $userdeptid;
    } else if ($userlevelid == 1) {
        $deptid = $_POST["selectdepartment"];
    }
    if ($deptid == "") {
        echo "<script>alert('Please Select Category'); </script>";
    } else {
        addcategory($category, $deptid);
    }
}
?>
 <script>
    $(document).ready(function(){
        $('.edit_btn').click(function (e){
            $('#editcatmodal').modal('show');
              
              $tr = $(this).closest('tr');
              var data = $tr.children("td").map(function(){
                    return $(this).text();

              }).get();
              console.log(data);
              $('#categoryid').val(data[0]);
              $('#category').val(data[1]);

                });

        });



 </script>