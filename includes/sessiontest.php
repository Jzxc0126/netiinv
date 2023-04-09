<?php
session_start();
?>
<?php

if(isset($_POST["btnLogin"]))
{
    
                $us = $_POST["txtUsername"];
                $pw = $_POST["txtPassword"];

                include 'dbcon.php';
                $statement = $conn->prepare("Select a.u_ids,a.emp_id,a.u_firstname,a.u_middlename,a.u_lastname,a.u_emailadd,a.u_departmentid,a.u_levelid,a.u_status,
                b.department,
                c.level from user_acc_tbl as a inner join department_tbl as b
                on a.u_departmentid=b.departmentid
                inner join level_tbl as c
                on a.u_levelid =c.level_id where a.u_username = ?
                and a.u_password = ? ");
                $statement->bind_param("ss" , $US , $PW);
                $US = $us;
                $PW = $pw;
                $statement->execute();
                $result = $statement->get_result();
                      if($row = $result->fetch_assoc())
                      {
                            $_SESSION["userid"] = $row["u_ids"];
                            $_SESSION["name"] = $row["u_lastname"].", ".$row["u_firstname"];
                            $_SESSION["departmentid"] = $row["u_departmentid"];
                            $_SESSION["department"] = $row["department"];
                            $_SESSION["userlevelid"] = $row["u_levelid"];
                            $_SESSION["userlevel"] = $row["level"];
                            $status = $row["u_status"];
                        if($status == "1")
                        {
                               header("refresh:.001 ; url=../pages/dashboard.php");
                              
                        }
                        elseif($status=="0")   
                        {
                              session_destroy();
                              echo "<script> alert('Account deactivated. Please contact ADMIN!'); </script>";
                              echo "<script> window.location.replace('../pages/index.php'); </script>";
                              exit;



                        }
                        }                     
                      else
                      {
                            echo "<script> alert('Wrong Account!'); </script>";
                            echo "<script> window.location.replace('../pages/index.php'); </script>";
                      }
                $conn->close();
      }
      else{
              
      }
?>
