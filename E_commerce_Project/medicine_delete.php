<?php 
  session_start();
   function redirect($loc){
    echo "<script>window.location.href='$loc';</script>";
   }
   //db connection
    const HOST="localhost";
    const USER="root";
    const PASSWORD="";
    const DB="e-commerce db";
    $medicineId= $_GET['mid'];
    try{
        $connect=new PDO("mysql:host=localhost;dbname=e-commerce db",USER,PASSWORD);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="delete from medicines where mid=:mid";
        $stmt=$connect->prepare($sql);
        $stmt->execute(['mid'=>$medicineId]);
        $rows=$stmt->rowCount();
        $message=($rows==1)? "medicine_delete_success" : "medicine_delete_error";
        $_SESSION['message']=$message;
        $connect=null;
        redirect("panel");
        }
    catch(PDOException $a){
        die($a->getMessage());
    }
?>