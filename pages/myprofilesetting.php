<?php include 'myprofileclass.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'head.php'; ?>
</head>
<style>
.inputgrouplength
{
  width: 140px;
}
</style>
<body>
        <?php include '../includes/navbar.php'; ?>
        <!--retrieve account-->
        <?php
        include '../includes/dbcon.php';
        $statement = $conn->prepare("Select * from user_acc_tbl  where u_ids = ".$userid." ");
        $statement->execute();
        $result = $statement->get_result();
                if($row = $result->fetch_assoc())
                {

                  $firstname = $row["u_firstname"];
                  $middleinitial = $row["u_middlename"];
                  $lastname = $row["u_lastname"];
                  $email = $row["u_emailadd"];
                  $contact = $row["u_contactno"];
                  $us = $row["u_username"];
                  $pwmain = $row["u_password"];
                  $pw = $row["u_password"];
                }
        $conn->close();
        ?>
        <!--retrieve account end-->
        <div class="container-fluid">
        </span><h1 style="color:black;">My Profile</h1>
        </div>

        <div class="mt-4 container border" style="width:700px;">
                  <div class="form-group">
                  <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to update?');">
                            <div class="form-row">
                                      <div class="mt-2 col-md-6">
                                                          <label>Firstname</label>
                                                          <input type="text" class="form-control" name="txtfirstname" value="<?php echo $firstname; ?>" required>
                                      </div>
                                      <div class="mt-2 col-md-6">
                                                          <label>Middle Initial</label>
                                                          <input type="text" class="form-control" name="txtmiddleinitial" maxlength="1" value="<?php echo $middleinitial; ?>" required>
                                                
                                      </div>
                                      <div class="mt-2 col-md-6">
                                                          <label>Lastname</label>
                                                          <input type="text" class="form-control" name="txtlastname" value="<?php echo $lastname; ?>"  required>
                                      </div>
                                      <div class="mt-2 col-md-6">
                                                          <label>Email</label>
                                                          <input type="email" class="form-control" name="txtemail" value="<?php echo $email; ?>" required>
                                      </div>
                                      <div class="mt-2 col-md-6">
                                                          <label>Contact Number</label>
                                                          <input type="text" class="form-control" name="txtcontactnumber" value="<?php echo $contact; ?>" >
                                      </div>
                                      <div class="mt-2 col-md-6">
                                                          <label>Username</label>
                                                          <input type="text" class="form-control" name="txtusername" value="<?php echo $us; ?>" required>
                                      </div>
                                      <div class="mt-2 col-md-6">
                                                          <label>Password</label>
                                                          <input type="text" class="form-control" name="txtpassword" value="<?php echo $pw; ?>" >
                                      </div>
                            </div>
                  <input type="submit" class="mt-2 btn btn-primary btn-block" name="btnupdateprofile" value="Update">
                  </form>
                  </div>
        </div>
       
        <?php include '../includes/footer.php'; ?>


  



</body>
</html>
<?php
if(isset($_POST["btnupdateprofile"]))
{
    $fname = $_POST["txtfirstname"];
    $mi = $_POST["txtmiddleinitial"];
    $lname = $_POST["txtlastname"];
    $mail = $_POST["txtemail"];
    $con = $_POST["txtcontactnumber"];
    $user = $_POST["txtusername"];
    $pass = $_POST["txtpassword"];
    $userid = $userid;
    updateaccount($fname,$mi,$lname,$mail,$con,$user,$pass,$userid);
}
?>
