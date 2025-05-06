<?php
   if($_SERVER['REQUEST_METHOD'] =="POST"){
      //print_r($_POST['mids']);
     $HOST="localhost";
     $USER="root";
     $PASSWORD="";
     $DB="e-commerce db";
     $medicineInfo=[];
     //$medicineId=$_GET['mid'];
     foreach($_POST['mids'] as $mid){
        try{
            $connect=new PDO("mysql:host=$HOST;dbname=$DB",$USER,$PASSWORD);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "connected";
             $sql="select * from medicines where mid=:mid";
             $stmt=$connect->prepare($sql);
             $stmt->execute(['mid'=>$mid]);
             while($rows=$stmt->fetch(PDO::FETCH_ASSOC)){
                //print_r($rows);
                array_push($medicineInfo,$rows);
             }
             $connect=null;
          }
          catch(PDOException $a){
                die($a->getMessage());
          }
     }
   }
    header("content-type:application/json; charset=utf-8");
    echo json_encode($medicineInfo);
?>
