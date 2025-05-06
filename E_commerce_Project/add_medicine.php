<?php 
  session_start();
//  print'<pre>';
//    print_r($_POST);
//    print_r($_FILES);
if(empty($_SESSION['admin'])){
    echo "<script>alert('You are not allow to this page....!');
              window.location.href='login';
          </script>";
    }  

function redirect($loc){
    echo "<script>window.location.href='$loc';</script>";
}

$name        =$_POST['mname'];
$composition =$_POST['mcomp'];
$uses        =$_POST['used_for'];
$qty         =$_POST['qty'];
$price       =$_POST['mprice'];
$mid="med-".rand(100,999)."-".time();
//reading file type and size
function checkType($filetype){
       $image=($filetype=='image/jpg'
               ||$filetype=='image/jpeg'
               ||$filetype=='image/png') ? true : false;
           return $image;    
}
function checkSize($filesize){
       $size=($filesize <=800*2048) ? true : false;
       return $size;
}

$filename=$_FILES['mpic']['name'];
$filetype=$_FILES['mpic']['type'];
$filesize=$_FILES['mpic']['size'];
$filetmp=$_FILES['mpic']['tmp_name'];
$destination="./uploads/".$filename;
move_uploaded_file($filetmp,$destination);

//database connection.....
const HOST="localhost";
const USER="root";
const PASSWORD="";
const DB="e-commerce db";
 try{
    $connect=new PDO("mysql:host=localhost;dbname=e-commerce db",USER,PASSWORD);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="insert into medicines(mid,medicine_name,composition,used_for,quantity,price,image) 
                        values(:m1,:m2,:m3,:m4,:m5,:m6,:m7);";
    $stmt=$connect->prepare($sql);
    $stmt->execute(["m1"=>$mid,
                    "m2"=>$name,
                    "m3"=>$composition,
                    "m4"=>$uses,
                    "m5"=>$qty,
                    "m6"=>$price,
                    "m7"=>$destination]);
    $rows=$stmt->rowCount();
    $message=($rows==1)?"medicine_insert_success":"medicine_insert_error";   
    $_SESSION['message']=$message;
    redirect("panel");
 }
 catch(PDOException $a){
    die($a->getMessage());
 }
?>