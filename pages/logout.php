<?php
 session_start();

 function pathTo($destination) {
   echo "<script>window.location.href = '/netiinv/pages/$destination.php'</script>";
 }

 /* Set status to invalid */


 /* Unset user data */
 unset($_SESSION['userlevelid']);
 unset($_SESSION['userid']);
 session_destroy();
 /* Redirect to login page */
 pathTo('index');
 exit;
?>
