 
 <?php include 'unitclass.php'; ?>
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
                 <h4 class="m-2 font-weight-bold text-primary"><i class="fas fa-weight"></i>&nbsp;Manage Unit</h4>
             </div>
             <div class="card-body">
                 <div class="row">


                     <!--add dept form-->
                     <div class="mt-3 col-md-3">
                         <div class="form-group">
                             <div class="form-row">
                                 <div class="col-md-12">
                                     <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to add unit?');">
                                         <label class="label">Unit</label>
                                         <input class="form-control" type="text" name="txtunit" id="txtunit" required>
                                         <input class="mt-2 btn btn-primary" type="submit" name="btnaddunit" id="btnaddunit" value="Add Unit">
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
                        <button type="button" data-toggle="modal" data-target="#deleteunitmodal" class="btn btn-warning" >Deleted Unit</button>
                        </div>

                     </div>
                    
                         <table id="dataTable" class="table table-bordered border-primary table-hover text-center" style="width:100%;">
                         <thead class="bg-primary border-primary">
                                 <tr>
                                     
                                     <th>Unit ID</th>
                                     <th>Unit</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php populateunittable(); ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 <!--Content End-->
<!-- Edit unit Modal -->
<div class="modal fade" id="editunitmodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Edit Unit</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="unitedit.php" method="POST" onsubmit="return confirm('Are you sure you want to edit unit?');">
      <div class="modal-body">
        <input type="hidden" id="unitid" name="unitid">
        <div class="form-group">
            <label for="">Unit</label>
            <input type="text" name="unit" id="unit" class="form-control" value="" required>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="updateunit" >Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Edit unit Modal -->
<!-- Deleted unit Modal -->
<div class="modal fade" id="deleteunitmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLongTitle">Deleted Unit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table id="tbldeletedunit" class="table table-bordered border-primary table-hover text-center" style="width:100%;">
                         <thead class="bg-primary border-primary">
                                 <tr>
                                     
                                     <th>Unit ID</th>
                                     <th>Unit</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php populatedeleteunittable(); ?>
                             </tbody>
                         </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- End Deleted unit Modal -->

     <?php include '../includes/footer.php'; ?>
     <!-- jQuery -->
     <script src="../js/category.js" type="text/javascript"></script>
     <!--dt tblend-->

 </body>

 </html>
 <script>
    $(document).ready(function(){
        $('.edit_btn').click(function (e){
            $('#editunitmodal').modal('show');
              
              $tr = $(this).closest('tr');
              var data = $tr.children("td").map(function(){
                    return $(this).text();

              }).get();
              console.log(data);
              $('#unitid').val(data[0]);
              $('#unit').val(data[1]);

                });

        });



 </script>
 <?php 
 if(isset($_POST["btnaddunit"]))
 {
     $unit = $_POST["txtunit"];
     $sql1 = "SELECT unitid,unit
     FROM unit_tbl WHERE 
     unit='$unit' ";
     include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
     $result = mysqli_query($conn, $sql1);
     if (mysqli_num_rows($result) > 0) {
         echo "<script> alert('Unit Already Exist! Try Again!'); </script>";
     } 
     else {
        
        
    addunit($unit);
         
     }





 }
 
 ?>