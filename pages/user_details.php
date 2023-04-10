<?php

include 'head.php';
include '../includes/navbar.php';
include '../includes/dbcon.php';

$query2 = 'Select a.u_ids,a.emp_id,a.u_firstname,a.u_middlename,a.u_lastname,a.u_contactno,a.u_emailadd,a.u_address,a.u_username,a.u_departmentid,a.u_levelid,a.u_status,
b.department,
c.level from user_acc_tbl as a inner join department_tbl as b
on a.u_departmentid=b.departmentid
inner join level_tbl as c
on a.u_levelid =c.level_id where a.u_ids =' . $_GET['ids'];

$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($result2)) {
  $empid = $row['emp_id'];
  $fname = $row['u_firstname'];
  $mname = $row['u_middlename'];
  $lname = $row['u_lastname'];
  $emailadd = $row['u_emailadd'];
  $dprtmnt = $row['department'];
  $level = $row['level'];
  $contact = $row['u_contactno'];
  $address = $row['u_address'];
  $username = $row['u_username'];
  
}
$u_ids = $_GET['ids'];


?>


<div class="container-fluid mt-3" style="max-width:800px;">
  <div class="card" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 10px;-webkit-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);-moz-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);box-shadow: 1px 1px 23px 9px rgb(0 71 171 / 55%);">
    <div class="card-header py-3" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 5px;">
      <h4 class="m-2 font-weight-bold text-primary"><i class="fa-solid fa-user-tie"></i>&nbsp;<?php echo $lname; ?>'s Details</h4>
    </div>
    <div class="row">
      <div class=col-md-12 style="margin-left: 20px;">
      <a href="users.php?" type="button" class="btn btn-primary bg-gradient-primary"><i class="fa-solid fa-arrow-left"></i> Back</a>
      <a href="user_edit_details.php?ids=<?php echo $u_ids;?>" type="button" class="btn btn-primary bg-gradient-warning"><i class="fas fa-fw fa-edit"></i>Edit</a>
      </div>
      
    </div>
    <div class="card-body">
      <div class="form-group row text-left">
        <div class="col-sm-3 text-primary">
          <h5>
            Employee ID<br>
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            : <?php echo $empid; ?> <br>
          </h5>
        </div>
      </div>
      <div class="form-group row text-left">
        <div class="col-sm-3 text-primary">
          <h5>
            Department<br>
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            : <?php echo $dprtmnt; ?> <br>
          </h5>
        </div>
      </div>
      <div class="form-group row text-left">
        <div class="col-sm-3 text-primary">
          <h5>
            Full Name<br>
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            : <?php echo $fname; ?> <?php echo $mname; ?>. <?php echo $lname; ?><br>
          </h5>
        </div>
      </div>
      <div class="form-group row text-left">
        <div class="col-sm-3 text-primary">
          <h5>
            Username<br>
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            : <?php echo $username; ?> <br>
          </h5>
        </div>
      </div>
      <div class="form-group row text-left">
        <div class="col-sm-3 text-primary">
          <h5>
            Email<br>
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            : <?php echo $emailadd; ?> <br>
          </h5>
        </div>
      </div>
      <div class="form-group row text-left">
        <div class="col-sm-3 text-primary">
          <h5>
            Contact #<br>
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            : <?php echo $contact; ?> <br>
          </h5>
        </div>
      </div>
      <div class="form-group row text-left">
        <div class="col-sm-3 text-primary">
          <h5>
            Address<br>
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            : <?php echo $address; ?> <br>
          </h5>
        </div>
      </div>
    
      
      
      <div class="form-group row text-left">
        <div class="col-sm-3 text-primary">
          <h5>
            Account Type<br>
          </h5>
        </div>
        <div class="col-sm-9">
          <h5>
            : <?php echo $level; ?> <br>
          </h5>
        </div>
      </div>
    </div>

  </div>
</div>
</div>