 
 <?php include 'departmentclass.php'; ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <?php include 'head.php'; ?>
 </head>

 <body>

     <?php include '../includes/navbar.php'; ?>
     <?php include '../includes/dbcon.php'; ?>


     <!--Content-->
     <div class="container-fluid mt-3" style="max-width: 80%">
         <div class="card" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 10px;-webkit-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);-moz-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);box-shadow: 1px 1px 23px 9px rgb(0 71 171 / 55%);">
             <div class="card-header py-3" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 5px;">
                 <h4 class="m-2 font-weight-bold text-primary"><i class="fas fa-building"></i>&nbsp;Manage Departments</h4>
             </div>
             <div class="card-body">
                 <div class="row">


                     <!--add dept form-->
                     <div class="mt-3 col-md-3">
                         <div class="form-group">
                             <div class="form-row">
                                 <div class="col-md-12">
                                     <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to add department?');">
                                         <label class="label">Department</label>
                                         <input class="form-control" type="text" name="txtdepartment" id="txtdepartment" required>
                                         <input class="mt-2 btn btn-primary" type="submit" name="btnadddepartment" id="btnadddepartment" value="Add Department">
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!--add dept form end-->
                     <div class="mt-3 col-md-9 table-responsive" style="overflow-y:auto;max-height:650px;">
                     <div class="row">
                        <div class="col-md-8 ">

                        </div>
                        <div class="col-md-4 mb-2 d-flex justify-content-end">
                        <button type="button" data-toggle="modal" data-target="#deleteddptmodal" class="btn btn-warning" >Deleted Department</button>
                        </div>

                     </div>
                    
                         <table id="dataTable" class="table table-bordered border-primary table-hover text-center" style="width:100%;">
                         <thead class="bg-primary border-primary">
                                 <tr>
                                     
                                     <th>Department ID</th>
                                     <th>Department</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php populatedepartmenttable(); ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 <!--Content End-->
<!-- Edit Department Modal -->
<div class="modal fade" id="editdptmodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Edit Department</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="departmentedit.php" method="POST" onsubmit="return confirm('Are you sure you want to edit department?');">
      <div class="modal-body">
        <input type="hidden" id="departmentid" name="departmentid">
        <div class="form-group">
            <label for="">Department</label>
            <input type="text" name="department" id="department" class="form-control" value="" required>

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
<!-- End Edit Department Modal -->
<!-- Deleted Department Modal -->
<div class="modal fade" id="deleteddptmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLongTitle">Deleted Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table id="" class="table table-bordered border-primary table-hover text-center" style="width:100%;">
                         <thead class="bg-primary border-primary">
                                 <tr>
                                     
                                     <th>Department ID</th>
                                     <th>Department</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php populatedeletedepartmenttable(); ?>
                             </tbody>
                         </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- End Deleted Department Modal -->

     <?php include '../includes/footer.php'; ?>
     <!-- jQuery -->
     <script src="../js/users.js" type="text/javascript"></script>
     <!--dt tblend-->

 </body>

 </html>
 <script>
    $(document).ready(function(){
        $('.edit_btn').click(function (e){
            $('#editdptmodal').modal('show');
              
              $tr = $(this).closest('tr');
              var data = $tr.children("td").map(function(){
                    return $(this).text();

              }).get();
              console.log(data);
              $('#departmentid').val(data[0]);
              $('#department').val(data[1]);

                });

        });



 </script>
 <?php 
 if(isset($_POST["btnadddepartment"]))
 {
     $department = $_POST["txtdepartment"];
     adddepartment($department);
 }
 
 ?>