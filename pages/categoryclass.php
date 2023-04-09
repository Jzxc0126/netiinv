
<?php
function addcategory($category , $deptid)
{
  try
  {
    include '../includes/dbcon.php';
    $statement = $conn->prepare("insert into category_tbl(categoryid,category,departmentid,cat_deleted) values(NULL,?,?,1)");
    $statement->bind_param("si", $Category , $Deptid);
    $Category = $category;
    $Deptid = $deptid;
    $statement->execute();
    $conn->close();
    echo "<script>alert('Category Added'); </script>";
    echo "<script> window.location.replace('category.php'); </script>";
  }
  catch (\Exception $e)
  {

  }

}


function populatetblcategory($userlevelid , $userdeptid)
{
  try
  {
    include '../includes/dbcon.php';
    if($userlevelid == 2)
    {
      $statement = $conn->prepare("Select a.categoryid,a.category,b.department from category_tbl as a
                                    inner join department_tbl as b on a.departmentid=b.departmentid where a.departmentid = ".$userdeptid." ");
    }
    else if($userlevelid == 1 || $userlevelid == 3)
    {
      $statement = $conn->prepare("Select a.categoryid,a.category,b.department from category_tbl as a
                                    inner join department_tbl as b on a.departmentid=b.departmentid ");
    }

    $statement->execute();
    $result = $statement->get_result();
          while($row = $result->fetch_assoc())
          {
              echo "<tr>";
              
              echo "<td>".$row["categoryid"]."</td>";
              echo "<td>".$row["category"]."</td>";
              if($userlevelid == 1)
              {
                echo "<td>".$row["department"]."</td>";
              }
              
              
              
              echo "<td> 
              <a class='btn btn-secondary btn-sm edit_btn' style='color:white;'>
              Edit
              </a>
              <a class='btn btn-danger btn-sm ' onclick='return checkdelete()' href='categorydelete.php?id=".$row["categoryid"]."' style='color:white;'>
              Delete
              </a>
              
              
              </td>";
              echo "</tr>";
          }
    $conn->close();
  }
  catch (\Exception $e)
  {

  }
}

function populatedepartment()
{
  try
  {
    include '../includes/dbcon.php';
          $statement = $conn->prepare("Select * from department_tbl where dept_deleted = 1");
          $statement->execute();
          $result = $statement->get_result();
                  while($row = $result->fetch_assoc())
                  {
                    echo "<option value='".$row["departmentid"]."'>".$row["department"]."</option>";
                  }
          $conn->close();
  }
  catch (\Exception $e)
  {

  }

}








  ?>