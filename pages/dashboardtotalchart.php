<?php
session_start();
$userid = $_SESSION["userid"];
$userfullname = $_SESSION["name"];
$userdeptid = $_SESSION["departmentid"];
$userdepartment = $_SESSION["department"];
$userlevelid = $_SESSION["userlevelid"];
$userlevel = $_SESSION["userlevel"];

?>
<!--CHART VALUES-->
      <?php 
       if($_SESSION["userlevelid"]=="1")
       {
        
        include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
        $statement = $conn->prepare("select * from department_tbl where dept_deleted= 1");
        $statement->execute();
        $result = $statement->get_result();
                    while($row = $result->fetch_assoc())
                    {
                        $categoryid = $row["departmentid"];
                        $category = $row["department"];

                        $statement2 = $conn->prepare("Select COUNT(departmentid) from inventory_tbl where departmentid = ".$categoryid."");
                        $statement2->execute();
                        $result2 = $statement2->get_result();
                        if($row2 = $result2->fetch_assoc())
                        {
                          $itemcount = $row2["COUNT(departmentid)"];
                        }
                        $dataPoints[] = array("y" => $itemcount, "label" => $category );
                        $label = "Total Asset";
                    }
        $conn->close(); $DASHBOARDLABEL = "Admin";
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

                        $statement2 = $conn->prepare("Select COUNT(categoryid),departmentid from inventory_tbl where categoryid = ".$categoryid." and departmentid ='" .$userdeptid. "' ");
                        $statement2->execute();
                        $result2 = $statement2->get_result();
                        if($row2 = $result2->fetch_assoc())
                        {
                          $itemcount = $row2["COUNT(categoryid)"];
                        }
                        $dataPoints[] = array("y" => $itemcount, "label" => $category );
                        $label = "Total Asset";
                    }
        $conn->close(); $DASHBOARDLABEL = $_SESSION["department"];
       }
       else if($_SESSION["userlevelid"]=="3"){
        include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
        $statement = $conn->prepare("select * from department_tbl where dept_deleted = 1");
        $statement->execute();
        $result = $statement->get_result();
                    while($row = $result->fetch_assoc())
                    {
                        $categoryid = $row["departmentid"];
                        $category = $row["department"];

                        $statement2 = $conn->prepare("Select COUNT(departmentid) from inventory_tbl where departmentid = ".$categoryid."");
                        $statement2->execute();
                        $result2 = $statement2->get_result();
                        if($row2 = $result2->fetch_assoc())
                        {
                          $itemcount = $row2["COUNT(departmentid)"];
                        }
                        $dataPoints[] = array("y" => $itemcount, "label" => $category );
                        $label = "Total Asset";
                    }
        $conn->close();
         $DASHBOARDLABEL = "Viewer";
       }
       
      ?>
      <!--CHART VALUES END-->
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
        <!--chart script-->
        <!-- <script>
                  window.onload = function() {

                  var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    theme: "light2",
                    exportEnabled: true,
	                  animationEnabled: true,
                    title:{
                      text: <?php echo json_encode($label, JSON_NUMERIC_CHECK); ?>
                    },
                    axisY: {
                      title: "Total Assets"
                    },
                    data: [{
                      type: "column",
                      yValueFormatString: "",
                      dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }]
                  });
                  chart.render();

                  }
        </script> -->
        
        <script>
 window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
  title:{
    text: <?php echo json_encode($label, JSON_NUMERIC_CHECK); ?>
  },
  animationEnabled: true,
  theme: "light2",
  exportEnabled: true,
  animationEnabled: true,
  axisX:{
		interval: 1
	},
  axisY: {
    title: "Total Assets"
  },
  axisY2:{
		interlacedColor: "rgba(1,77,101,.2)",
		gridColor: "rgba(1,77,101,.1)",
		title: "Number of Items"
	},
  data: [{
    type: "bar",
		name: "categories",
		axisYType: "secondary",
		color: "#014D65",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();

}

        </script>
        <!--chart script end-->
</head>
<body>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<!--Chart Script-->
<script src="/netiinv/canvasjs-3.7.5/canvasjs.min.js"></script> 
<!--Chart Script End-->
</body>
</html>
