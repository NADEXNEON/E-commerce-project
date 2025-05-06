<?php 
   if($_SERVER['REQUEST_METHOD']=='GET'){
    $searchData= $_REQUEST['s'];
    $HOST="localhost";
    $USER="root";
    $PASSWORD="";
    $DB="e-commerce db";
    //$medicineId=$_GET['mid'];
    //foreach($_POST['mids'] as $mid){
    try{
        $connect=new PDO("mysql:host=$HOST;dbname=$DB",$USER,$PASSWORD);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "connected";
        $sql="select * from medicines where medicine_name like '%$searchData%'";
        $output=$connect->query($sql);
        $medicineInfo=[];
        while($rows= $output->fetch(PDO::FETCH_ASSOC)){
            // print"<pre>"; 
            // print_r($rows);
            array_push($medicineInfo,$rows);
        }
        $connect=null;
        header("Content-type:application/json;charset=utf-8;");
        echo json_encode($medicineInfo);
    }
    catch(PDOException $a){
         echo json_encode(['error'=>$a->getMessage()]);
    }
}
?>