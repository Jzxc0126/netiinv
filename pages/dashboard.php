<?php include 'dashboardclass.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'head.php'; ?>
</head>

<body>
  <?php include '../includes/navbar.php'; ?>

  <!--Dashboard Filter end-->
  <?php


  if ($_SESSION["userlevelid"] == "1") {
    $DASHBOARDLABEL = "Admin";
  } else if ($_SESSION["userlevelid"] == "2") {
    $DASHBOARDLABEL = $_SESSION["department"];
  }
  else if ($_SESSION["userlevelid"] == "3") {
    $DASHBOARDLABEL = "Viewer";
  } else {
  
  }
  ?>
  <!--Dashboard Filter end-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <span></span>
        <h1><?php echo $DASHBOARDLABEL . " "; ?>Dashboard</h1>
      </div>

    </div>
  </div>

  <!-- Content -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-7">
        <ul class="list-group">
          
          <!-- <li class="list-group-item secondary">Overview of Status</li> -->
          <!--DASHBOARD-->
          <li class="list-group-item secondary">
            <div class="row" id="dashboardminipanes" style="overflow-y: auto; max-height: 510px;">
              <div class="col-xl-12 col-md-3 mb-3" style="text-align:center;">
                <div class="card text-white  o-hidden h-100">
                  <div class="card-body" style="background-color:#2980b9;">
                    <div style="height:30px;font-family:Calibri;font-size:33px;">
                      <?php include 'dashboardcounttotalasset.php'; ?>
                    </div>
                  </div>
                  <a class="card-footer text-white clearfix small " href="dashboardtotalchart.php" target="iframe" style="background-color:#2980b9;">
                    <span class="float-left" style="font-size:12px;font-family:Calibri;">TOTAL ASSETS</span>
                    <span class="float-right">
                    </span>
                  </a>
                </div>
              </div>
              <?php populatedashboard($userdeptid); ?>
            </div>
          </li>
          <!--DASHBOARD END-->
        </ul>
      </div>

      <div class="col-md-5">
        <ul class="list-group" style="overflow-y: auto; max-height: 510px;">
          <li class="list-group-item secondary">Overview of Assets</li>
          <li class="list-group-item secondary embed-responsive embed-responsive-1by1">
            <iframe class="embed-responsive-item" name="iframe" id="iframe" src="dashboardtotalchart.php"></iframe>
          </li>
        </ul>

      </div>


    </div>
  </div>
  <!-- Content End-->
  <?php include '../includes/footer.php'; ?>
  <!--Chart Script End-->
</body>

</html>