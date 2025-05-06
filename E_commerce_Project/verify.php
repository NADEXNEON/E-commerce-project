<?php 
session_start();
// print_r($_POST);

function redirect($loc){
    echo "<script>window.location.href='$loc';</script>";
}

$email     = $_POST['em1'];
$password  =$_POST['pass1'];

const HOST="localhost";
const USER="root";
const PASSWORD="";
const DB="e-commerce db";

$connect= new mysqli(HOST,USER,PASSWORD,DB);
if($connect->connect_error) die($connect->connect_error);
else{
    $sql="select * from user where Email='$email'";
    $output= $connect->query($sql);
    if($rows=$output->fetch_assoc()){
        $dbpass=$rows['password'];
        $valid=password_verify($password,$dbpass) ? true : false;
        if($valid){
             $_SESSION['user']     =$rows['user_name'];
             $_SESSION['user-id']  =$rows['user_id'];
             $_SESSION['user-role']=$rows['Role'];
             date_default_timezone_set("ASIA/KOLKATA");
             $_SESSION['login_time']= date("d-m-y h:i:sA");
             redirect("medicine");
        }else{
            //echo "User does not exist";
            $_SESSION['message']="login_error";
            redirect("login");
        }
    }else{
        $_SESSION['message']="user_not_exist";
        redirect("login");
    }
    $connect->close();
}
?>