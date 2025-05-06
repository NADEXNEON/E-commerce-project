<?php session_start(); ?>
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
    <div class="container-card m-3 p-3">
        <header class="modal-header bg-info text-white">
            <h4>User Sign-Up</h4>
        </header>
        <?php 
         if(!empty($_SESSION['message'])){
            if($_SESSION['message']="signup_success"){
                echo "<div class='alert alert-success'>SignUp Successfully completed....</div>";
            }else if($_SESSION['message']=="signup_error"){
                echo "<div class='alert alert-danger'>Unable to SignUp Now , Please try after some time....</div>";
            }
            unset($_SESSION['message']);
         }
        ?>
        <form action="submit" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        First Name: <input type="text" name="fname" required class="form-control">
                    </div>
                    <div class="col">
                        Last Name: <input type="text" name="lname" required class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                Email: <input type="text" name="em1" required class="form-control">
            </div>
            <div class="form-group">
                Phone: <input type="text" name="ph1" required class="form-control">
            </div>
            <div class="form-group">
                Upload Profile: <input type="file" name="file" id="image1" onchange="loadImage(event)" required class="form-control">
                <script type="text/javascript">
                                    function loadImage(event){
                                        console.log(event.target.files[0]);
                                        let file=event.target.files[0];
                                        let imageblob= URL.createObjectURL(file);
                                        console.log(imageblob);
                                        document.getElementById("image1").src=imageblob;
                                    }
                                 </script>
            </div>
            <div class="form-group">
                Password : <input type="password" name="pass1" required class="form-control">
            </div>
            <div class="form-group" align="center">
                <button class="btn btn-md btn-outline-primary">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>