<?php


if(isset($_POST["depid"]))
{
    $departmentid = $_POST["depid"];

    include '../includes/dbcon.php';
    
      $statement = $conn->prepare("Select a.categoryid,a.category,b.department from category_tbl as a
                                    inner join department_tbl as b on a.departmentid=b.departmentid where a.departmentid = '".$departmentid."' ");
    
    try
    {
        $statement->execute();
        $result = $statement->get_result();
              while($row = $result->fetch_assoc())
              { 
               echo "<thead class='bg-primary border-primary'>";
               echo "</thead>";
                echo "<tr>";
                echo "<td>".$row["categoryid"]."</td>";
                echo "<td>".$row["category"]."</td>";
                echo "<td>".$row["department"]."</td>";
                echo "<td> Action</td>";
                echo "</tr>";
                 
              }
          $conn->close();
    }
    catch (\Exception $e)
    {

    }
}
?>
