<?php 
session_start();
//    print'<pre>';
//    print_r($_POST);
//    print_r($_FILES);

   function redirect($loc){
      echo "<script>window.location.href='$loc'</script>";
   }
 
   $image=($_FILES['editImage']['error']==0) ? true : false;
   echo $image;
   if($image){
    $imagePath="";
    echo "User has been changed the image...";
    $filename=$_FILES['editImage']['name'];
    $filetype=$_FILES['editImage']['type'];
    $filetmp =$_FILES['editImage']['tmp_name'];
    $filesize=$_FILES['editImage']['size'];
    $imagePath="../uploads/".$filename;
    move_uploaded_file($filetmp,$imagePath);
   }else{
      echo "User has kept old image which has come from database";
      $imagePath=$_POST['h_old_image'];
   }

    $name  =$_POST['editFname']." ".$_POST['editLname'];
    $phone =$_POST['editPhone'];
    $email =$_POST['editmail'];
    $uid   =$_POST['h_user_id'];

    //database connectivity....
    const HOST="localhost";
             const USER="root";
             const PASSWORD="";
             const DB="e-commerce db";
             
             $connect= new mysqli(HOST,USER,PASSWORD,DB);
             if($connect->connect_error) die($connect->connect_error);
             else{
                $sql="update user set user_name='$name',
                                          Email='$email',
                                          Phone='$phone',
                                          Profile='$imagePath'
                                          where user_id ='$uid'";
             }
             $connect->query($sql);
             $rows=$connect->affected_rows;
             $connect->close();
             $message=($rows==1) ? "update_success" : "update_error";
             $_SESSION['message']=$message;
             redirect("data");
?>