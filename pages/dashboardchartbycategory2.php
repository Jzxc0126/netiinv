<div hidden>
<?php
session_start();
$userid = $_SESSION["userid"];
$userfullname = $_SESSION["name"];
$userdeptid = $_SESSION["departmentid"];
$userdepartment = $_SESSION["department"];
$userlevelid = $_SESSION["userlevelid"];
$userlevel = $_SESSION["userlevel"];

?>
<?php
$catid = $_GET["categoryid"];
  
include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
$statement3 = $conn->prepare("Select * from category_tbl where categoryid = ".$catid." ");
$statement3->execute();
$result3 = $statement3->get_result();
          if($row3 = $result3->fetch_assoc())
          {
            $catname = $row3["category"];
          }
  $conn->close();
?>
</div>
<!--CHART VALUES-->
      <?php
                                  include 'C:\xampp\htdocs\netiinv\includes\dbcon.php';
                                  $statement = $conn->prepare("select a.itemid,a.itemname,a.departmentid,a.categoryid,a.brand,
                                          b.category
                                          from inventory_tbl as a inner join category_tbl as b
                                          on a.categoryid=b.categoryid where a.categoryid = " . $catid . " group by a.brand ");
                                  $statement->execute();
                                  $result = $statement->get_result();
                                  while ($row = $result->fetch_assoc()) {
                                    $brandname = $row["brand"];

                                    $statement2 = $conn->prepare("Select sum(piece),a.categoryid,a.departmentid,a.brand,
                                                            b.category
                                                            from inventory_tbl as a inner join category_tbl as b
                                                            on a.categoryid=b.categoryid where a.brand = '" . $brandname . "' and a.departmentid ='" .$userdeptid. "' ");
                                    $statement2->execute();
                                    $result2 = $statement2->get_result();
                                    if ($row2 = $result2->fetch_assoc()) {
                                      $itemcount = $row2["sum(piece)"];
                                    }
                                    $dataPoints[] = array("y" => $itemcount, "label" => $brandname);
                                    $label = "Brands";
                                  }
                                  $conn->close();
    

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
        <script>
                  window.onload = function() {

                  var chart = new CanvasJS.Chart("chartContainer", {
                    theme: "light2",
                    exportEnabled: true,
	                  animationEnabled: true,
                    title:{
                      text: <?php echo json_encode($label, JSON_NUMERIC_CHECK); ?>
                    },
                    axisY: {
                      title: <?php echo json_encode("Count", JSON_NUMERIC_CHECK); ?>
                    },
                    data: [{
                      type: "column",
                      yValueFormatString: "",
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
<script src="/netiinv/canvasjs-2.2/canvasjs.min.js"></script>
<!--Chart Script End-->
</body>
</html>
