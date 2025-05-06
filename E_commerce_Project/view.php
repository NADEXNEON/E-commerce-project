<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Care</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <?php
     include("./assets/navbar.php");
     include("./assets/header.php");
     ?>
     
    <?php
    $userId = $_GET['uid'];
    const HOST = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const DB = "e-commerce db";
    $singleUser = [];
    $connect = new mysqli(HOST, USER, PASSWORD, DB);
    if ($connect->connect_error) die($connect->connect_error);
    else {
        $sql = "select * from user where user_id='$userId'";
        $output = $connect->query($sql);
        if ($rows = $output->fetch_assoc()) {
            $singleUser = $rows;
        }
        $connect->close();
    }
    ?>
    <!-- Logout portion.... -->
    <?php 
    //include("../auth/authenticate.php");
    /*if(!empty($_SESSION['user'])){
    ?>
    <div class="float-right">
        Welcome <?php echo $_SESSION['user'];?>
        <a href="logout.php">
        <button class="btn btn-sm btn-outline-danger">Logout</button></a>
    </div>
    <?php }else{
       echo "<script>
                alert('Please Login to view this page');
                window.location.href='login';
            </script>";
    }*/
?>
    <div class="container card">
        <div class="card m-3 p-3">
            <header class="modal-header">
                <h4>Display Info of @<?php echo $singleUser['user_name']; ?></h4>
            </header>
            <div class="container">
                <form action="update" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <p class="form-group">
                                <?php
                                $nameArr = explode(" ", $singleUser['user_name']);
                                //print_r($nameArr);
                                ?>
                            <div class="row">
                                <div class="col">
                                    FirstName:<input type="text" name="editFname" value="<?php echo $nameArr[0]; ?>" class="form-control">
                                </div>
                                <div class="col">
                                    LastName :<input type="text" name="editLname" value="<?php echo $nameArr[1]; ?>" class="form-control">
                                </div>
                            </div>
                            </p>
                            <p class="form-group">
                                Phone:<input type="text" name="editPhone" value="<?php echo $singleUser['Phone']; ?>" class="form-control">
                            </p>
                            <p class="form-group">
                                Email: <input type="text" name="editmail" value="<?php echo $singleUser['Email']; ?>" class="form-control">
                            </p>
                            <p class="form-group">
                                <img src="<?php echo $singleUser['Profile']; ?>" id="image1" height="100px" width="100px">
                                <!--add previous or old image filed path store-->
                                <input type="hidden" name="h_old_image" value="<?php echo $singleUser['Profile']; ?>">
                                <!--add previous or old userid filed path store-->
                                <input type="hidden" name="h_user_id" value="<?php echo $userId; ?>">
                                Upload Profile: <input type="file" name="editImage" id="editImage" class="form-control" onchange="loadImage(event)">
                                <script type="text/javascript">
                                    function loadImage(event) {
                                        console.log(event.target.files[0]);
                                        let file = event.target.files[0];
                                        let imageblob = URL.createObjectURL(file);
                                        console.log(imageblob);
                                        document.getElementById("image1").src = imageblob;
                                    }
                                </script>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-outline-dark">Update</button> |
                        <a href="delete?id=<?php echo $userId;?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Do you want to delete this record?');">Delete</a> |
                        <a href="data.php" class="btn btn-sm btn-outline-info">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php include("./assets/footer.php");?>
</html>