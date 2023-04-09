<?php include 'profileclass.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
</head>

<body>
    <div class="">


        <?php include '../includes/navbar.php'; 
         require 'functions.php';?>
       
        <!--retrieve account-->
        <?php
        include '../includes/dbcon.php';
        $statement = $conn->prepare("Select * from user_acc_tbl  where u_ids = " . $userid . " ");
        $statement->execute();
        $result = $statement->get_result();
        if ($row = $result->fetch_assoc()) {
            $emp_id = $row["emp_id"];
            $firstname = $row["u_firstname"];
            $middleinitial = $row["u_middlename"];
            $lastname = $row["u_lastname"];
            $email = $row["u_emailadd"];
            $contact = $row["u_contactno"];
            $address = $row["u_address"];
            $us = $row["u_username"];
            $pwmain = $row["u_password"];
            $pw = $row["u_password"];
        }
        $conn->close();
        ?>
        <!--retrieve account end-->






















        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="card mt-3" style="background-color: #ffffffba;background-clip: border-box;border-radius: 2.5rem;margin-bottom: 10px;-webkit-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);-moz-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);box-shadow: 1px 1px 23px 9px rgb(0 71 171 / 55%);">
                    <div class="card-body">



                        <div class="row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                <center>
                                    <h4>Your Profile</h4>

                                    <span class="mr-2 d-none d-lg-inline  small" style="color:black; font-size:20px;"><?php echo " $userdepartment" ?></span>

                                </center>
                            </div>
                            <div class="col-md-4">
                                <img width="150px" src="../img/avatar.svg" />

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">ID Number</span>
                                    </div>
                                    <label type="text" class="form-control" readonly="true" placeholder="ID" aria-describedby="basic-addon1"><?php echo " $emp_id" ?></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <hr style="background-color: black;">
                                </div>
                            </div>
                            <!-- change pass -->
                            <form method="post" action="" onsubmit="return confirm('Change Password?');">
                            
                                <div class="row" style="display: none;" id="changepassfield">
                                <?php 
    //     if(isset($_SESSION['errprompt'])) {
    //       showError();
    //     }
    //   ?>
                                    <div class="row">
                                        <label>Old Password</label>
                                        <div class="form-group">
                                            <input class="form-control" ID="NewPass" name="txtoldpass" placeholder="Old Password" required></input>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>New Password</label>
                                        <div class="form-group">
                                            <input class="form-control" ID="txtnewpass"  name="txtnewpass"  type="password" placeholder="New Password" required></input>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>Confirm Password</label>
                                        <div class="form-group">
                                            <input class="form-control" ID="txtconfirmpass" name="txtconfirmpass" type="password" placeholder="Confirm Password" required></input>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 mx-auto">
                                            <br />
                                            <center>
                                                <button type="submit" class="btn btn-sm btn-block btn-success" name="btnupdatepass" value="Update" id="updatepassbtn" style="display: none;">Update Password</button>
                                                </center>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <!-- change pass end -->
                            <form action="" method="POST" onsubmit="return confirm('Are you sure you want to update?');">
                                <div id="tohide">


                                    <div class="row">

                                        <div class="col-md-4">
                                            <label>First Name</label>
                                            <div class="form-group">
                                                <label CssClass="form-control" class="font-weight-bold" ID="TextBox2" placeholder="First Name"><?php echo $firstname; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Middle name</label>
                                            <div class="form-group">
                                                <label CssClass="form-control" class="font-weight-bold" ID="TextBox2" placeholder="First Name"><?php echo $middleinitial; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Last Name</label>
                                            <div class="form-group">
                                                <label CssClass="form-control" class="font-weight-bold" ID="Tex tBox2" placeholder="Last Name"><?php echo $lastname; ?></label>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Email Address</label>
                                            <div class="form-group">

                                                <input class="form-control" ID="TextBox10" readonly="true" name="txtemail" placeholder="Email" value="<?php echo $email; ?>"></input>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Contact No</label>
                                            <div class="form-group">

                                                <input class="form-control" ID="TextBox10" readonly="true" name="txtcontact" placeholder="Contact No" TextMode="Number" value="<?php echo $contact; ?>"></input>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <label>Full Address</label>
                                            <div class="form-group">
                                                <input class="form-control" ID="TextBox6" placeholder="Full Address" name="txtaddress" readonly="true" TextMode="MultiLine" Rows="1" value="<?php echo $address; ?>"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <center>
                                                <span class="badge text-bg-danger">Log In Credential</span>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label>Username</label>

                                            <div class="form-group">
                                                <input class="form-control" ID="TextBox10" ReadOnly="True" name="txtusername" placeholder="Username" value="<?php echo $us; ?>" required></input>
                                            </div>
                                        </div>
                                        <div class="col" id="passfield">
                                            <label>Password</label>
                                            <div class="input-group">
                                                <button type="button" class="btn btn-sm btn-block btn-success" id="changepassBtn">Change Password</button>
                                                <!-- <label Cssclass="form-control" ID="TextBox11" placeholder="Old Password" ReadOnly="True" enabled="false">pass12314</label> -->
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <br />
                                        <center>

                                            <button type="button" class="btn btn-lg btn-block btn-warning" id="editBtn">Edit</button>
                                            <button type="submit" class="btn btn-sm btn-block btn-success" name="btnupdateprofile" value="Update" id="saveBtn" style="display: none;">Save</button>
                                            <button type="button" class="btn btn-sm btn-block btn-danger" id="cancelBtn" style="display: none;">Cancel</button>
                                        </center>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>

                    <br>
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>

    </div>




</body>

</html>
<script>
    const editBtn = document.getElementById('editBtn');
    const changepassBtn = document.getElementById('changepassBtn');
    const saveBtn = document.getElementById('saveBtn');
    const passfield = document.getElementById('passfield');
    const cancelBtn = document.getElementById('cancelBtn');
    const fields = document.querySelectorAll('input, select, textarea');
    const tohide = document.getElementById('tohide');
    const updatepassbtn = document.getElementById('updatepassbtn');

    // function to toggle between read-only and editable mode
    function toggleEditable(isEditable) {
        fields.forEach(field => {
            field.readOnly = !isEditable;
            field.disabled = !isEditable;
        });
        editBtn.style.display = isEditable ? 'none' : 'block';
        saveBtn.style.display = isEditable ? 'block' : 'none';
        cancelBtn.style.display = isEditable ? 'block' : 'none';
        passfield.style.display = isEditable ? 'none' : 'block';

    }

    function togglechangepass(isEditable) {
        fields.forEach(field => {
            field.readOnly = !isEditable;
            field.disabled = !isEditable;
        });
        editBtn.style.display = isEditable ? 'none' : 'block';
        saveBtn.style.display = isEditable ? 'none' : 'block';
        cancelBtn.style.display = isEditable ? 'block' : 'none';
        tohide.style.display = isEditable ? 'none' : 'block';
        changepassfield.style.display = isEditable ? 'block' : 'none';
        updatepassbtn.style.display = isEditable ? 'block' : 'none';
    }
    // attach click event listener to the edit button
    editBtn.addEventListener('click', () => {
        toggleEditable(true);
    });

    // attach click event listener to the cancel button
    cancelBtn.addEventListener('click', () => {
        toggleEditable(false);
        togglechangepass(false);
        window.location.replace('/netiinv/pages/profile.php');
    });
    // attach click event listener to the Changepass button
    changepassBtn.addEventListener('click', () => {
        togglechangepass(true);
    });
</script>


<?php

if (isset($_POST["btnupdateprofile"])) {

    $mail = $_POST["txtemail"];
    $con = $_POST["txtcontact"];
    $add = $_POST["txtaddress"];
    $user = $_POST["txtusername"];
    $userid = $userid;
   
    $sql1 = "select u_ids,u_username
    FROM user_acc_tbl WHERE 
    u_ids!='$userid' and u_username = '$user'";
    include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
    $result = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result) > 0) {
        echo "<script> alert('Username Already Used! Try Again!'); </script>";
    } 
    else {
        updateaccounts($mail, $con, $add, $user, $userid);
    }
}
if (isset($_POST["btnupdatepass"])) {

    $old_password = clean($_POST["txtoldpass"]);
    $new_password = clean($_POST["txtnewpass"]);
    $confirm_password = clean($_POST["txtconfirmpass"]);
    $userid = $userid;

    $sql = "select u_password
    FROM user_acc_tbl WHERE 
    u_ids='$userid' AND u_password= '$old_password'";
    include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        if ($new_password == $confirm_password) {

            updateapass($new_password, $userid);
        } 
        else {
            echo "<script> alert('Password Entered not Match'); </script>";
        }
    } 
    else {
        echo "<script> alert('Wrong Old Password entered'); </script>";
    }
}
?>

