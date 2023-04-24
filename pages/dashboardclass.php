<?php
function populatedashboard($userdeptid)
{
    try
    {
      if($_SESSION["userlevelid"]=="1")
      {
         
        include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
        $statement = $conn->prepare("select * from department_tbl where dept_deleted = 1");
        $statement->execute();
        $result = $statement->get_result();
                while($row = $result->fetch_assoc())
                {
                    $departmentid = $row["departmentid"];
                    $department = $row["department"];
  
                    $statement2 = $conn->prepare("Select COUNT(itemcode) from inventory_tbl where departmentid = ".$departmentid." ");
                    $statement2->execute();
                    $result2 = $statement2->get_result();
                    $num_rows = mysqli_num_rows($result2);
                    if(empty($num_rows) == true)
                    {
                            $itemcount = "0";
                    }
                    else
                    {
                            if($row2 = $result2->fetch_assoc())
                            {
                              $itemcount = $row2["COUNT(itemcode)"];
                           
                            }
                            else{
                              $itemcount = "0";
                            }
                    }
                    $color = "#".substr(md5(rand()), 0, 6);
                    //echo $itemgroupname."  ".$itemcount."<br>";
                    echo  "<div class='col-xl-3 col-md-4 mb-3' style='text-align:center;'>
                              <div class='card text-white  o-hidden h-100'>
                                <div class='card-body' style='background-color:".$color.";'>
                                  <div style='height:30px;font-family:Calibri;font-size:33px;'>".$itemcount."</div>
                                </div>
                                <a class='card-footer text-white clearfix small ' href='dashboardchartbycategory.php?departmentid=".$departmentid."' target='iframe' style='background-color:blue;'>
                                  <span class='float-left' style='font-size:12px;font-family:Calibri;'>".$department."</span>
                                  <span class='float-right'>
                                  </span>
                                </a>
                              </div>
                            </div>";
                }
        $conn->close();
      }
      else if($_SESSION["userlevelid"]=="2")
      {
          
      include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
      $statement = $conn->prepare("select * from category_tbl where departmentid = ".$userdeptid." ");
      $statement->execute();
      $result = $statement->get_result();
              while($row = $result->fetch_assoc())
              {
                  $categoryid = $row["categoryid"];
                  $category = $row["category"];

                  $statement2 = $conn->prepare("Select count(itemcode),departmentid from inventory_tbl where categoryid = ".$categoryid." and departmentid = ".$userdeptid."");
                  $statement2->execute();
                  $result2 = $statement2->get_result();
                  $num_rows = mysqli_num_rows($result2);
                  if(empty($num_rows) == true)
                  {
                          $itemcount = "0";
                  }
                  else
                  {
                          if($row2 = $result2->fetch_assoc())
                          {
                            $itemcount = $row2["count(itemcode)"];
                          }
                  }
                  $color = "#".substr(md5(rand()), 0, 6);
                  //echo $itemgroupname."  ".$itemcount."<br>";
                  echo  "<div class='col-xl-3 col-md-4 mb-3' style='text-align:center;'>
                            <div class='card text-white  o-hidden h-100'>
                              <div class='card-body' style='background-color:".$color.";'>
                                <div style='height:30px;font-family:Calibri;font-size:33px;'>".$itemcount."</div>
                              </div>
                              <a class='card-footer text-white clearfix small' href='dashboardchartbycategory2.php?categoryid=".$categoryid."' target='iframe' style='background-color:blue;'>
                                <span class='float-left' style='font-size:12px;font-family:Calibri;'>".$category."</span>
                                <span class='float-right'>
                                </span>
                              </a>
                            </div>
                          </div>";
              }
      $conn->close();
      }
      else if($_SESSION["userlevelid"]=="3")
      {
         
        include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
        $statement = $conn->prepare("select * from department_tbl where dept_deleted= 1");
        $statement->execute();
        $result = $statement->get_result();
                while($row = $result->fetch_assoc())
                {
                    $departmentid = $row["departmentid"];
                    $department = $row["department"];
  
                    $statement2 = $conn->prepare("Select COUNT(itemcode) from inventory_tbl where departmentid = ".$departmentid." ");
                    $statement2->execute();
                    $result2 = $statement2->get_result();
                    $num_rows = mysqli_num_rows($result2);
                    if(empty($num_rows) == true)
                    {
                            $itemcount = "0";
                    }
                    else
                    {
                            if($row2 = $result2->fetch_assoc())
                            {
                              $itemcount = $row2["COUNT(itemcode)"];
                            }
                    }
                    $color = "#".substr(md5(rand()), 0, 6);
                    //echo $itemgroupname."  ".$itemcount."<br>";
                    echo  "<div class='col-xl-3 col-md-4 mb-3' style='text-align:center;'>
                              <div class='card text-white  o-hidden h-100'>
                                <div class='card-body' style='background-color:".$color.";'>
                                  <div style='height:30px;font-family:Calibri;font-size:33px;'>".$itemcount."</div>
                                </div>
                                <a class='card-footer text-white clearfix small z-1' href='dashboardchartbycategory.php?departmentid=".$departmentid."' target='iframe' style='background-color:blue;'>
                                  <span class='float-left' style='font-size:12px;font-family:Calibri;'>".$department."</span>
                                  <span class='float-right'>
                                  </span>
                                </a>
                              </div>
                            </div>";
                }
        $conn->close();
      }
      
   
    }
    catch (\Exception $e)
    {

    }

}
?>
