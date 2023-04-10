<?php include 'usersclass.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
        <?php include 'head.php'; ?>
</head>

<body>

        <?php include '../includes/navbar.php'; ?>
        <?php include '../includes/dbcon.php'; ?>
        <div class="container-fluid">
                <span class="glyphicon glyphicon-dashboard"></span>
                <h1>Manage Users</h1>
                <h4 class="m-2 font-weight-bold text-primary">Add Account&nbsp;<a href="#" data-toggle="modal" data-target="#AddAccModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
        </div>
        <!-- Admin Table -->
        <div class="container-fluid">
                <div class="card" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 10px;-webkit-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);-moz-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);box-shadow: 1px 1px 23px 9px rgb(0 71 171 / 55%);">
                        <div class="card-header py-3" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 5px;">
                                <h4 class="m-2 font-weight-bold text-primary"><i class="fa-solid fa-user-tie"></i>&nbsp;Admin Account(s)</h4>
                        </div>
                        <div class="card-body">
                                <div class="table-responsive">
                          
                                        <table class="table table-bordered" id="tblusers" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr>
                                                                <th>Name</th>
                                                                <th>Username</th>
                                                                <th>Department</th>
                                                                <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        <?php
                                                        $query = 'select a.u_ids, a.u_firstname,a.u_lastname,a.u_departmentid,a.u_username,a.u_password,a.u_levelid,a.u_status,
                                                        b.level,c.department
                                                        FROM user_acc_tbl as a inner join
                                                        level_tbl as b on a.u_levelid=b.level_id
                                                        inner join department_tbl as c 
                                                        on a.u_departmentid=c.departmentid
                                                        where a.u_levelid=1';
                                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                                $active = $row["u_status"];
                                                                $adminacc = $row["u_ids"];
                                                                


                                                                echo '<tr>';

                                                                echo '<td>' . $row['u_firstname'] . ' ' . $row['u_lastname'] . '</td>';
                                                                echo '<td>' . $row['u_username'] . '</td>';
                                                                
                                                                echo '<td>' . $row['department'] . '</td>';
                                                               
                                                                if ($adminacc != 1)
                                                                {
                                                                        echo '<td align="center"> <div class="btn-group">';
                                                                        if ($active == 1) {
                                                                                echo "<a class='btn btn-danger btn-sm' href='userssetinactive.php?userid=" . $row["u_ids"] . "' style='color:white;'>
                                                                               <i class='fa-sharp fa-regular fa-circle-xmark'></i> Set In-active
                                        </a>";
                                                                        } else {
                                                                                echo "<a class='btn btn-success btn-sm' href='userssetactive.php?userid=" . $row["u_ids"] . "' style='color:white;'>
                                                                        <i class='fa-regular fa-circle-check'></i> Set Active
                                        </a>";
                                                                        }
                                                                        echo '
                                                                        <a type="button" class="view-user btn btn-primary bg-gradient-primary" href="user_details.php?ids=' . $row['u_ids'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                                                                      <div class="btn-group">
                                                                        <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                                                                        ... <span class="caret"></span></a>
                                                                      <ul class="dropdown-menu text-center" role="menu">
                                                                          <li>
                                                                            <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 10px;" href="user_edit_details.php?ids=' . $row['u_ids'] . '">
                                                                              <i class="fas fa-fw fa-edit"></i> Edit
                                                                            </a>
                                                                          </li>
                                                                          
                                                                          <li>
                                                                          <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 10px;margin-top:2px;" href="user_resetpass.php?ids=' . $row['u_ids'] . '">
                                                                          <i class="fa-solid fa-lock fa-2xs"></i> Reset Password
                                                                          </a>
                                                                        </li>
                                                                      </ul>
                                                                      </div>
                                                                    </div></td>';
                                                                                                          echo '</tr> ';


                                                                }
                                                                else
                                                                {
                                                                        echo '<td align="center" class="bg-secondary">Cannot Change Admin Account </td>';   
                                                                }
                                                               




                                                              
                                                        }
                                                        ?>
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                </div>


        </div>

        <!-- Admin Table end-->
        <!-- User Table -->
        <div class="container-fluid">
        
                <div class="card" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 10px;-webkit-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);-moz-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);box-shadow: 1px 1px 23px 9px rgb(0 71 171 / 55%);">
                        <div class="card-header py-3" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 5px;">
                                <h4 class="m-2 font-weight-bold text-primary"><i class="fa-solid fa-user"></i>&nbsp;User Account(s)</h4>
                        </div>
                        <div class="card-body">
                    
                                <div class="table-responsive">
                                <select class="ml-2 form-control-sm" name="selectdepartment" id="selectdepartment" >
                                <option value="" disabled selected>Select Department</option>
          <?php populateselectdepartment()?>
          </select>
                                        <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                        
                                                <thead>
                                                        <tr>
                                                                <th>Name</th>
                                                                <th>Username</th>
                                                                
                                                                <th>Department</th>
                                                                <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        <?php
                                                        $query = 'select a.u_ids, a.u_firstname,a.u_lastname,a.u_departmentid,a.u_username,a.u_password,a.u_levelid,a.u_status,
                                                        b.level,c.department
                                                        FROM user_acc_tbl as a inner join
                                                        level_tbl as b on a.u_levelid=b.level_id
                                                        inner join department_tbl as c 
                                                        on a.u_departmentid=c.departmentid
                                                        where a.u_levelid=2';
                                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                                $active = $row["u_status"];
                                                                


                                                                echo '<tr>';

                                                                echo '<td>' . $row['u_firstname'] . ' ' . $row['u_lastname'] . '</td>';
                                                                echo '<td>' . $row['u_username'] . '</td>';
                                                                
                                                                echo '<td>' . $row['department'] . '</td>';
                                                                echo '<td align="center"> <div class="btn-group">';

                                                                if ($active == 1) {
                                                                        echo "<a class='btn btn-danger btn-sm' href='userssetinactive.php?userid=" . $row["u_ids"] . "' style='color:white;'>
                                <i class='fa-sharp fa-regular fa-circle-xmark'></i> Set In-active
                                </a>";
                                                                } else {
                                                                        echo "<a class='btn btn-success btn-sm' href='userssetactive.php?userid=" . $row["u_ids"] . "' style='color:white;'>
                                 <i class='fa-regular fa-circle-check'></i> Set Active
                                </a>";
                                                                }




                                                                echo '
                              <a type="button" class="view-user btn btn-primary bg-gradient-primary" href="user_details.php?ids=' . $row['u_ids'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 10px;" href="user_edit_details.php?ids=' . $row['u_ids'] . '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                                
                                <li>
                                <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 10px;margin-top:2px;" href="user_resetpass.php?ids=' . $row['u_ids'] . '">
                                <i class="fa-duotone fa-key-skeleton"></i>  <i class="fa-solid fa-lock fa-2xs"></i> Reset Password
                                </a>
                              </li>
                            </ul>
                            </div>
                          </div></td>';
                                                                echo '</tr> ';
                                                        }






                                                        ?>
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                </div>


        </div>

        <!-- User Table end-->

        <!-- Viewer Table -->
        <div class="container-fluid">
                <div class="card" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 10px;-webkit-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);-moz-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);box-shadow: 1px 1px 23px 9px rgb(0 71 171 / 55%);">
                        <div class="card-header py-3" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 5px;">
                                <h4 class="m-2 font-weight-bold text-primary"><i class="fa-solid fa-users"></i>&nbsp;Viewer Account(s)</h4>
                        </div>
                        <div class="card-body">
                                <div class="table-responsive">
                                        <table class="table table-bordered" id="tblviewers" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr>
                                                                <th>Name</th>
                                                                <th>Username</th>
                                                                
                                                                <th>Department</th>
                                                                <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        <?php
                                                        $query = 'select a.u_ids, a.u_firstname,a.u_lastname,a.u_departmentid,a.u_username,a.u_password,a.u_levelid,a.u_status,
                                                        b.level,c.department
                                                        FROM user_acc_tbl as a inner join
                                                        level_tbl as b on a.u_levelid=b.level_id
                                                        inner join department_tbl as c 
                                                        on a.u_departmentid=c.departmentid
                                                        where a.u_levelid=3';
                                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                                $active = $row["u_status"];
                                                                


                                                                echo '<tr>';

                                                                echo '<td>' . $row['u_firstname'] . ' ' . $row['u_lastname'] . '</td>';
                                                                echo '<td>' . $row['u_username'] . '</td>';
                                                                
                                                                echo '<td>' . $row['department'] . '</td>';
                                                                echo '<td align="center"> <div class="btn-group">';

                                                                if ($active == 1) {
                                                                        echo "<a class='btn btn-danger btn-sm' href='userssetinactive.php?userid=" . $row["u_ids"] . "' style='color:white;'>
                                <i class='fa-sharp fa-regular fa-circle-xmark'></i> Set In-active
                                </a>";
                                                                } else {
                                                                        echo "<a class='btn btn-success btn-sm' href='userssetactive.php?userid=" . $row["u_ids"] . "' style='color:white;'>
                                 <i class='fa-regular fa-circle-check'></i> Set Active
                                </a>";
                                                                }




                                                                echo '
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="user_details.php?ids=' . $row['u_ids'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 10px;" href="user_edit_details.php?ids=' . $row['u_ids'] . '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                                <li>
                                <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 10px;margin-top:2px;" href="user_resetpass.php?ids=' . $row['u_ids'] . '">
                                <i class="fa-duotone fa-key-skeleton"></i>  <i class="fa-solid fa-lock fa-2xs"></i> Reset Password
                                </a>
                              </li>
                                
                        
                            </ul>
                            </div>
                          </div></td>';
                                                                echo '</tr> ';
                                                        }






                                                        ?>
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                </div>


        </div>

        <!-- Viewer Table end-->



        <!-- Content-->
        
        <!--Contentend -->



        <!-- ADD aCC MODAL -->
        <div class="modal fade rounded" id="AddAccModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                                <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white" id="exampleModalLabel">Add Account</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <!-- ADD ITEM FORM -->
                                <div class="modal-body">

                                        <div class="form-group">
                                                <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to add account?');">

                                                        <div class="form-row">
                                                                <div class="col-md-6">
                                                                        <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                        <span class="inputfield input-group-text" style="width:136px;">Employee ID</span>
                                                                                </div>
                                                                                <input type="text" class="inputfield form-control" name="txtempid" maxlength="10" placeholder="Enter Employee ID">
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-6" id="divdepartment">
                                                                        <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                        <span class="inputfield input-group-text" style="width:136px;">Department</span>
                                                                                </div>
                                                                                <select class="inputfield form-control" name="selectdepartment" id="selectdepartment" required>
                                                                                <option value="" disabled selected>Select Department</option>
                                                                                        <?php populateselectdepartment(); ?>
                                                                                </select>
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-12 mt-1">
                                                                        <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                        <span class="inputfield input-group-text" style="width:136px;">Firstname</span>
                                                                                </div>
                                                                                <input type="text" class="inputfield form-control" name="txtfirstname" placeholder="Enter Firstname" required>
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-12 mt-1">
                                                                        <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                        <span class="inputfield input-group-text" style="width:136px;">Middle Initial</span>
                                                                                </div>
                                                                                <input type="text" class="inputfield form-control" name="txtmiddlename" placeholder="Enter Middle Initial">
                                                                        </div>

                                                                </div>
                                                                <div class="col-md-12 mt-1">
                                                                        <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                        <span class="inputfield input-group-text" style="width:136px;">Lastname</span>
                                                                                </div>
                                                                                <input type="text" class="inputfield form-control" name="txtlastname" placeholder="Enter Lastname" required>
                                                                        </div>
                                                                </div>

                                                                <div class="col-md-12 mt-1" id="divacctype">
                                                                        <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                        <span class="inputfield input-group-text" style="width:136px;">Account Type</span>
                                                                                </div>
                                                                                <select class="inputfield form-control" name="selectacctype" id="selectacctype" required>
                                                                                <option value="" disabled selected>Select Account Type</option>      
                                                                                <?php populateselectacctype(); ?>
                                                                                </select>
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                        <center>
                                                                                <span class="badge text-bg-danger">Log In Credential</span>
                                                                        </center>
                                                                </div>
                                                                <div class="col-md-6 mt-1">
                                                                        <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                        <span class="inputfield input-group-text" style="width:136px;">Username</span>
                                                                                </div>
                                                                                <input type="text" class="inputfield form-control" name="txtuname" placeholder="Enter Username" required>
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-6 mt-1">
                                                                        <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                        <span class="inputfield input-group-text" style="width:136px;">Password</span>
                                                                                </div>
                                                                                <input type="text" class="inputfield form-control" name="txtupass" placeholder="Enter Password" required>
                                                                        </div>
                                                                </div>







                                                        </div>
                                                        <input type="submit" class="mt-2 btn btn-primary btn-block" name="btnaddacc" value="Add Account">
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
        <!-- ADD aCC MODAL end-->

<!-- View  -->

<!--  View end -->



        <!--Content End-->
        <?php include '../includes/footer.php'; ?>
        <!-- jQuery -->
        <script src="../js/users.js" type="text/javascript"></script>
        <!--dt tblend-->

</body>

</html>



<?php
if(isset($_POST["btnaddacc"]))
{
  $emp_id =($_POST["txtempid"]);
  $firstname = $_POST["txtfirstname"];
  $middlename = $_POST["txtmiddlename"];
  $lastname = $_POST["txtlastname"];
  $emailad = " ";
  $contactno = " ";
  $address = " ";
  $department = $_POST["selectdepartment"];
  $uname = $_POST["txtuname"];
  $upass = $_POST["txtupass"];
  $acctype = $_POST["selectacctype"];
  $status = 1;
  addacc($emp_id,$firstname,$middlename,$lastname, $emailad, $contactno, $address,$department,$uname,$upass,$acctype,$status);
}
?>