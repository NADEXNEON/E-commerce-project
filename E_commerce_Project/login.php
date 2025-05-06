<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Care</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <?php include_once("./assets/nav1.php");
           include_once("./assets/header.php");?> 
    
    <?php
    if (!empty($_SESSION['message'])) {
        if ($_SESSION['message'] == "login_error") {
            echo "<div class='alert alert-danger'>Unable to wrong USER Id or PASSWORD....!</div>";
        } else if ($_SESSION['message'] == "user_not_exist") {
            echo "<div class='alert alert-warning'>Sorry, username dosen't exist.....!</div>";
        }
    }
    unset($_SESSION['message']);
    ?>
    <div class="container card" style="margin-bottom:50px;">
        <header class="modal-header bg-info text-white">
            <h4><strong>LOGIN</strong></h4>
        </header>
        <form action="verify" method="post">
            <div class="form-group">
                Email:<input type="text" name="em1" id="em1" required class="form-control">
            </div>
            <div class="form-group">
                Password:<input type="password" name="pass1" id="pass1" required class="form-control">
            </div>
            <div class="form-group" align="center">
               <button class="btn btn-sm btn-outline-success" type="submit">Login</button>
            </div>
        </form>
    </div>
    <?php include("./assets/footer.php");?>
</body>
</html>