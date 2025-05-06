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
    if (!empty($_SESSION['message'])) {
        if ($_SESSION['message'] == 'delete_success') {
            echo "<div class='alert alert-danger'>One user has been record removed successfully.....</div>";
        } else if ($_SESSION['message'] == 'delete_error') {
            echo "<div class='alert alert-info'>Unable to Remove User's Profile Right Now .. Please try after some times...</div>";
        } else if (!empty($_SESSION['message']) == "update_success") {
            echo "<div class='alert alert-success'>1 User has been record update successfully....</div>";
        } else if (!empty($_SESSION['message']) == "update_error") {
            echo "<div class='alert alert-warning'>Unable to Update User's Profile Right Now .. Please try after some times...</div>";
        }
    }
    unset($_SESSION['message']);
    ?>

    <!--Logout portion....-->
    <?php
    include_once("./assets/navbar.php");
    include_once("./assets/header.php");
    //include("../auth/authenticate.php");
    /*if (!empty($_SESSION['user'])) {
    ?>
        <div class="float-right">
            Welcome <?php echo $_SESSION['user']; ?>
            <a href="logout.php">
                <button class="btn btn-sm btn-outline-danger">Logout</button></a>
        </div>
    <?php } else {
        echo "<script>
                alert('Please Login to view this page');
                window.location.href='login';
            </script>";
    }*/
    ?>
    <header class="modal-header">
        <h4><strong>Display Records:</strong></h4>
    </header>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-hover">
                <tr>
                    <th>View User's</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Profile</th>
                </tr>
                <?php
                const HOST = "localhost";
                const USER = "root";
                const PASSWORD = "";
                const DB = "e-commerce db";

                $connect = new mysqli(HOST, USER, PASSWORD, DB);
                if ($connect->connect_error) die($connect->connect_error);
                else {
                    $sql="";
                    $admin=($_SESSION['user-role']=='admin')? true : false;
                    if($admin){
                        $sql = "select * from user";
                    }else{
                        $sql="select * from user where user_id='".$_SESSION['user-id']."'";
                    }   
                }
                $output = $connect->query($sql);
                while ($rows = $output->fetch_assoc()) {
                ?>
                    <tr>
                        <td><a class="btn btn-sm btn-outline-primary" href="view?uid=<?php echo $rows['user_id']; ?>">View</a></td>
                        <td><?php echo $rows['user_name']; ?></td>
                        <td><?php echo $rows['Email']; ?></td>
                        <td><?php echo $rows['Phone']; ?></td>
                        <td><img src="<?php echo $rows['Profile']; ?>" height="120px" width="120px"></td>
                    </tr>
                <?php
                }
                $connect->close();
                ?>
            </table>
        </div>
        <?php include("./assets/footer.php");?>
    </div>
</body>

</html>