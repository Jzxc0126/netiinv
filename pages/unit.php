<!DOCTYPE html>
 <html lang="en">

 <head>
     <?php include 'head.php'; ?>
 </head>

 <body>

     <?php include '../includes/navbar.php'; ?>
     <?php include '../includes/dbcon.php'; ?>


     <!--Content-->
     <div class="container-fluid">
         <div class="card" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 10px;-webkit-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);-moz-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);box-shadow: 1px 1px 23px 9px rgb(0 71 171 / 55%);">
             <div class="card-header py-3" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 5px;">
                 <h4 class="m-2 font-weight-bold text-primary"><i class="fas fa-building"></i>&nbsp;Manage Categories</h4>
             </div>
             <div class="card-body">
                 <div class="row">


                     <!--add dept form-->
                     <div class="mt-3 col-md-3">
                         <div class="form-group">
                             <div class="form-row">
                                 <div class="col-md-12">
                                     <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to add department?');">
                                         <label class="label">Categories</label>
                                         <input class="form-control" type="text" name="txtdepartment" required>
                                         <input class="mt-2 btn btn-primary" type="submit" name="btnadddepartment" id="btnadddepartment" value="Add Category">
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!--add dept form end-->
                     <div class="mt-3 col-md-9 table-responsive">
                         <table id="tbldepartmenttable" class="table table-bordered table-hover text-center" style="width:100%">
                             <thead>
                                 <tr>
                                     
                                     <th>Department ID</th>
                                     <th>Department</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <!-- ?php populatedepartmenttable($userlevelid); ?> -->
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>




     <!--Content End-->
     <?php include '../includes/footer.php'; ?>
     <!-- jQuery -->
     <script src="../js/users.js" type="text/javascript"></script>
     <!--dt tblend-->

 </body>

 </html>