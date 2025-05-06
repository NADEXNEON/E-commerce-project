<?php 
session_start();
//   print'<pre>';
//   print_r($_FILES);
//   print_r($_POST);

function redirect($loc){
    echo "<script>window.location.href='$loc';</script>";
}

$medname    =$_POST['mname'];
$medcoms    =$_POST['mcomp'];
$medused    =$_POST['used_for'];
$medprice   =$_POST['mprice'];
$medicineId =$_POST['h_medicine_id'];
$imagePath  =$_POST['h_image_path'];
$imageEdit  ="";

$imageChange=($_FILES['mAvatar']['error']==0) ? true : false;
if($imageChange){
    //echo "image has been change";
    $filename =$_FILES['mAvatar']['name'];
    $filetype =$_FILES['mAvatar']['type'];
    $filesize =$_FILES['mAvatar']['size'];
    $filetmp  =$_FILES['mAvatar']['tmp_name'];

    $destination="./uploads/".$filename;
    move_uploaded_file($filetmp,$destination);
}else{
   // echo"image not change";
    $imageEdit=$imagePath;
}

//database connection......
    const HOST="localhost";
    const USER="root";
    const PASSWORD="";
    const DB="e-commerce db";
     try{
        $connect=new PDO("mysql:host=localhost;dbname=e-commerce db",USER,PASSWORD);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "connect";
        $sql="update medicines set medicine_name=:m1,
              composition=:m2, used_for=:m3, price=:m4, image=:m5
              where mid=:m6";
        
        $stmt=$connect->prepare($sql);
        $stmt->execute([
            'm1'=>$medname,
            'm2'=>$medcoms,
            'm3'=>$medused,
            'm4'=>$medprice,
            'm5'=>$imagePath,
            'm6'=>$medicineId
        ]);
        $rows=$stmt->rowCount();
        $message=($rows==1) ? "update_success" : "update_error";
        $_SESSION['message']=$message;
        $connect=null;
        redirect("panel");
     }
     catch(PDOException $a){
        die($a->getMessage());
     }
?>