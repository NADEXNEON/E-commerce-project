<?php 
  if($_SERVER['REQUEST_METHOD'] =="POST"){
    //print_r($_POST['mids']);
   $HOST="localhost";
   $USER="root";
   $PASSWORD="";
   $DB="e-commerce db";
   $medicineInfo=[];
   //$medicineId=$_GET['mid'];
      try{
          $connect=new PDO("mysql:host=$HOST;dbname=$DB",$USER,$PASSWORD);
          //echo "connected";
          //print_r($_POST);
          $user_id      =$_POST['user_id'];
          $medicineIds  =$_POST['medicineIds'];
          $orderId      =$_POST['order_id'];
          $totalQty     =$_POST['quantity'];

          $sql="insert into ordersinfo(order_id,mid,quantity,user_id) values (:o1,:o2,:o3,:u1)";
          $stmt=$connect->prepare($sql);
          $stmt-> execute([
            "o1"=>$orderId,
            "o2"=>$medicineIds,
            "o3"=>$totalQty,
            "u1"=>$user_id
          ]);
          $rows=$stmt->rowCount();
          $stmt=null;
          $connect=null;
          $message=($rows==1) ? "order_success" : "order-error";
          header("content-type:application/json; charset=utf-8");
          echo json_encode(['message'=>$message,"order_id"=>$orderId]);
      }
      catch(PDOException $a){
        echo json_encode(['message'=>$a->getMessage()]);
      }
    }
?>