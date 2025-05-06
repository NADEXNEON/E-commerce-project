<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Care</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<body>
 <?php 
    const HOST="localhost";
    const USER="root";
    const PASSWORD="";
    const DB="e-commerce db";
    $medicineInfo=[];
    $medicineId=$_GET['mid'];
     try{
        $connect=new PDO("mysql:host=localhost;dbname=e-commerce db",USER,PASSWORD);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "connected";
        $sql= "select * from medicines where mid=:mid";
        $stmt=$connect->prepare($sql);
        $stmt->execute(['mid'=>$medicineId]);
        if($rows=$stmt->fetch(PDO::FETCH_OBJ)){
            $medicineInfo=$rows;
        }
        $connect=null;
    }
     catch(PDOException $a){
        die($a->getMessage());
     }
 ?>

    <div class="card m-3 p-3">
        <header class="modal-header bg-info text-white">
            <h4>Update Medicine:</h4>
        </header>
        <form action="medicine_update" method="post" enctype="multipart/form-data">
            <div class="form-group">
                Medicine : <input type="text" name="mname" value="<?php echo $medicineInfo->medicine_name;?>" required class="form-control">
            </div>
            <div class="form-group">
                Composition: <input type="text" name="mcomp" required class="form-control" value="<?php echo $medicineInfo->composition;?>">
            </div>
            <div class="form-group">
                Used for: <textarea name="used_for" required class="form-control" rows="6" cols="30"><?php echo $medicineInfo->used_for;?></textarea>
            </div>
            <div class="form-group">
                Price: <input type="number" name="mprice" required class="form-control" value="<?php echo $medicineInfo->price;?>">
            </div>
            <div class="form-group">
             <img src="<?php echo $medicineInfo->image;?>" alt="No Image" title="<?php echo $medicineInfo->medicine_name?>" class="img-thumbnail" height="120px" width="120px">
                Change Medicine Pic: <input type="file" name="mAvatar" id="mAvatar"  class="form-control" >
            </div>
            <div class="form-group">
                <!-- hidden field capturing medicine id -->
                <input type="hidden" name="h_medicine_id" value="<?php echo $medicineInfo->mid;?>">
                <!-- hidden field capturing medicine name -->
                <input type="hidden" name="h_image_path" value="<?php echo $medicineInfo->image;?>">
                <div class="modal-footer"> 
                   <button class="btn btn-md btn-outline-warning">UPDATE</button>
                   <a href="medicine_delete?mid=<?php echo $medicineInfo->mid;?>" class="btn btn-md btn-outline-danger" onclick="return confirm('Do you want to delete this Medicine Info ?');">Delete</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>