<?php
if(isset($_POST["depid"]))
{
    $departmentid = $_POST["depid"];

    $query = "select a.u_ids, a.u_firstname,a.u_lastname,a.u_departmentid,a.u_username,a.u_password,a.u_levelid,a.u_status,
    b.level,c.department
    FROM user_acc_tbl as a inner join
    level_tbl as b on a.u_levelid=b.level_id
    inner join department_tbl as c 
    on a.u_departmentid=c.departmentid
    where a.u_departmentid = ? and a.u_levelid = 2";
    try
    {
          include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
          $statement = $conn->prepare($query);
          $statement->bind_param("i" , $Departmentid);
          $Departmentid = $departmentid;
          $statement->execute();
          $result = $statement->get_result();
          while ($row = mysqli_fetch_assoc($result)) {
            $active = $row["u_status"];
            


            echo '<tr>';

            echo '<td>' . $row['u_firstname'] . ' ' . $row['u_lastname'] . '</td>';
            echo '<td>' . $row['u_username'] . '</td>';
            
            echo '<td>' . $row['department'] . '</td>';
            echo '<td align="center"> <div class="btn-group">';

            if ($active == 1) {
                    echo "<a class='btn btn-danger btn-sm' href='userssetinactive.php?userid=" . $row["u_ids"] . "' style='color:white;'>
Set In-active
</a>";
            } else {
                    echo "<a class='btn btn-warning btn-sm' href='userssetactive.php?userid=" . $row["u_ids"] . "' style='color:white;'>
Set Active
</a>";
            }




            echo '
<a type="button" class="btn btn-primary bg-gradient-primary" href="user_details.php?ids=' . $row['u_ids'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
<div class="btn-group">
<a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
... <span class="caret"></span></a>
<ul class="dropdown-menu text-center" role="menu">
<li>
<a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="user_edit_details.php?ids=' . $row['u_ids'] . '">
<i class="fas fa-fw fa-edit"></i> Edit
</a>
</li>

<li>
                                <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 10px;margin-top:2px;" href="user_resetpass.php?ids=' . $row['u_ids'] . '">
                                <i class="fa-duotone fa-key-skeleton"></i>  <i class="fa-solid fa-lock fa-2xs"></i> Reset Password
                                </a>
                              </li>
</u
</div>
</div></td>';
            echo '</tr> ';
    

                  }
          $conn->close();
    }
    catch (\Exception $e)
    {

    }
}
?>
