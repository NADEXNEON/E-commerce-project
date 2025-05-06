<?php
session_start();
//print_r($_POST);
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   if (empty($_SESSION['admin'])){
      echo "<script>alert('You are not allow to this page....!');
                window.location.href='login';
            </script>";
   }
}
function redirect($loc)
{
   echo "<script>window.location.href='$loc';</script>";
}
$adminuser = $_POST['uname'];
$adminpass = $_POST['pw1'];
$ADMIN_USER = "admin";
$ADMIN_PASS = "subh1234";
$login = ($adminuser == $ADMIN_USER && $adminpass == $ADMIN_PASS) ? true : false;
if ($login) {
   $_SESSION['admin'] = $adminuser;
   redirect("panel");
} else {
   $_SESSION['message'] = "admin_error";
   redirect("dashboard_admin");
}
