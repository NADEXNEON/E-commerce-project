<?php 
   session_start();
   function redirect($loc){
     echo "<script>window.location.href='$loc'</script>";
   }
   $userId=$_GET['id'];
   //echo $userId;
   const HOST="localhost";
      const USER="root";
      const PASSWORD="";
      const DB="e-commerce db";
      $singleUser=[];
      $connect= new mysqli(HOST,USER,PASSWORD,DB);
      if($connect->connect_error) die($connect->connect_error);
       else{
          $sql="delete from user where user_id='$userId'";
          $connect->query($sql);
          $rows=$connect->affected_rows;
          $connect->close();
          $message=($rows==1) ? "delete_success" :"delete_error";
          $_SESSION['message']=$message;
          redirect("data");
       }
?>