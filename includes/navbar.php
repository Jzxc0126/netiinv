<!-- SESSIONS -->
<?php session_start();
if (empty($_SESSION["userlevelid"])) {
    function pathTo($destination)
    {
        echo "<script>window.location.href = '/netiinv/pages/$destination.php'</script>";
    }

    /* Set status to invalid */


    /* Unset user data */
    unset($_SESSION['userlevelid']);

    /* Redirect to login page */
    pathTo('index');
} ?>
<?php
$userid = $_SESSION["userid"];
$userfullname = $_SESSION["name"];
$userdeptid = $_SESSION["departmentid"];
$userdepartment = $_SESSION["department"];
$userlevelid = $_SESSION["userlevelid"];
$userlevel = $_SESSION["userlevel"];

?>
<!--SESSIONS END-->

<script src="/netiinv/js/links.js"></script>
<style>
    .dropdown-item {
        cursor: pointer;
    }
    #wrapper #content-wrapper
    {
background-image: url(../img/back.jpg);
height: 100vh;
margin: 0;
/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;
    }
    #topnav
    {
	width: 100%;
	height: 70px;
	
	outline: none;
	border: none;
	background-image: linear-gradient(to right , #0047AB, #ffffff,#ffffff);
	background-size: 200%;
	font-size: 1.2rem;
	color: #fff;
	font-family: 'Poppins', sans-serif;
	text-transform: uppercase;
	
	
	transition: .5s;
    }
</style>

<body>



    <!-- Page Wrapper -->
    <div id="wrapper" style="background-color: #0047AB;">

        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <img class="navbar-brand" src="/netiinv/img/neti.png" height="80" width="200">

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/netiinv/pages/dashboard.php">

                    <i class="nav-link collapsed text-white, fas fa-chart-bar" id="menudashboard" href="/netiinv/modules/pages/dashboard.php"> Dashboard</i></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manage
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-sharp fa-solid fa-boxes-stacked"></i>
                    <span>Inventory</span>
                </a>
                <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="dropdown-item text-dark" id="linktoviewinventory" onclick="urltoinventorys();">Fixed Assets</a>
                        <a class="dropdown-item text-dark" id="linktoviewconsumables" onclick="urltoconsumable();">Consumables Assets</a>

                    </div>
                </div>
            </li>
           
            <li class="nav-item" id="linktoaccounts" onclick='urltousers();' style="cursor: pointer;">
           <a class="nav-link" id="menumanageusers" onclick='urltousers();'>
           <i class="fas fa-fw fa-user-lock"></i>
                    <span>Accounts</span>
                </a>
           </li>
            
            <li class="nav-item" id="linktosettings">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-gear"></i>
                    <span>Settings</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="dropdown-item text-dark" id="menuassetusage" onclick="urltoassetusage();"><i class="fas fa-warehouse"></i> Asset Usage</a>
                        <a class="dropdown-item text-dark" id="menucategory" onclick="urltocategory();"><i class="fa-solid fa-list-ul"></i> Category</a>
                        <a class='dropdown-item text-dark' id="menudepartment" onclick="urltodepartment();"><i class="fas fa-building"></i> Department</a>
                        <a class="dropdown-item text-dark" id="menulocation" onclick="urltolocation();"><i class="fas fa-map-marker-alt"></i> Location</a>
                        <a class="dropdown-item text-dark" id="menusupplier" onclick="urltosupplier();"> <i class="fa-sharp fa-solid fa-boxes-packing"></i> Supplier</a>
                    
                        <a class="dropdown-item text-dark" id="menuassigneduser" onclick="urltoassigneduser();"><i class="fas fa-user-tag"></i> Assigned User</a>
                       
                        <a class='dropdown-item text-dark' id="menuunit" onclick='urltounit();'><i class="fas fa-weight"></i> Unit</a>
                    </div>
                </div>
            </li>
          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">



                <!-- Topbar -->

                <nav class="navbar navbar-expand navbar-light mb-1 topbar static-top shadow" id="topnav" >
                   <div class="container-fluid">
                   <h3 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">NETI Inventory and Assets Management System</h3>

                   </div> 
                    <!-- Sidebar Toggle (Topbar) -->
                    <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline  small" style="color:black;"><?php echo " " . $userfullname . " - " . $userdepartment; ?></span>
                                <img class="img-profile rounded-circle" src="/netiinv/img/avatar1.svg" style="height:50px;width:50px;">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/netiinv/pages/profile.php" id="menumyprofile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-black-500"></i>
                                    Profile
                                </a>
                                <!-- <a class="dropdown-item" href="/netiinv/pages/myprofilesetting.php" id="menumyprofile">
                                    <i class="fas fa-fw fa-gear mr-2 text-black-500"></i>
                                   Setting
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/netiinv/pages/logout.php" data-toggle="modal" data-target="#logoutModal" style="background-color: red;color:#ffffff;">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-500"></i>
                                    Logout
                                </a>
                                  <!-- <a class="dropdown-item" href="/netiinv/pages/logout.php" style="background-color: red;color:aliceblue;" onclick="return confirm('Are you sure you want to Logout?');"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a> -->
                            </div>
                        </li>

                    </ul>

                </nav>

                <!-- End of Topbar -->

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirm Logout?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                            </div>
                            <div class="modal-body">Are you sure, you want to logout?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="/netiinv/pages/logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Logout Modal-->

                </div>
            
           
            <!--end Main Content -->

           


            <script src="/netiinv/canvasjs-3.7.5/canvasjs.min.js"></script> 
</body>

<script>
    function urltoinventorys() {

        document.cookie = "cookieName=1";
        window.location.reload();
    // window.location.replace('/netiinv/pages/inventory.php');
     window.location.replace('/netiinv/pages/addinventory.php');
     

    }
</script>




<?php
if ($userlevelid == "1") {


} else if ($userlevelid == "2") {
    hidemenu("linktoaccounts");
    hidemenu("menudepartment");
    

} else if ($userlevelid == "3") {
    hidemenu("menumyprofile");
    hidemenu("linktoaddinventory");
    hidemenu("linktosettings");
    hidemenu("linktoaccounts");
    hidemenu("menusupplier");

}

function hidemenu($menuname)
{
    echo "<script> document.getElementById('" . $menuname . "').style.display = 'none'; </script>";
}
?>