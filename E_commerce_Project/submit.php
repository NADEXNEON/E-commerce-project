<?php 
session_start();
// print'<pre>';
// print_r($_POST);
// print_r($_FILES);

function redirect($loc){
    echo "<script>window.location.href='$loc'</script>";
}

function checkSize($filesize){
     $isSize=($filesize < 800*2048) ? true : false;
     return $isSize;
}
function checkType($filetype){
      $isType=($filetype=='image/png'
             ||$filetype=='image/jpeg'
             ||$filetype=='image/jpg') ? true : false;
             return $isType;
}

$name      =$_POST['fname']." ".$_POST['lname'];
$email     =$_POST['em1'];
$phone     =$_POST['ph1'];
$password  =password_hash($_POST['pass1'],PASSWORD_BCRYPT);
//read file
$filename  =$_FILES['file']['name'];
$filetype  =$_FILES['file']['type'];
$filesize  =$_FILES['file']['size'];
$filetmp   =$_FILES['file']['tmp_name'];
$destination="./uploads/".$filename;
if(checkSize($filesize)){
    if(checkType($filetype)){
        move_uploaded_file($filetmp,$destination);
        echo"<div class='alert alert-success'>Image uploaded successfully</div>";
    }else{
        echo "<div class='alert alert-danger'>Image is not supported it...</div>";
    }
}else{
    echo"<div class='alert alert-warning'>Image is to large...</div>";
}

//database connection...
const HOST="localhost";
const USER="root";
const PASSWORD="";
const DB="e-commerce db";

$connect= new mysqli(HOST,USER,PASSWORD,DB);
if($connect->connect_error) die($connect->connect_error);
else{
    //echo "connected";
    $sql="insert into user(user_name,Email,Phone,Profile,password)
            values('$name','$email','$phone','$destination','$password')";
}
$connect->query($sql);
$rows=$connect->affected_rows;
$connect->close();

$message=($rows==1) ? "signup_success":"signup_error";
$_SESSION['message']=$message;
redirect("login");
?>