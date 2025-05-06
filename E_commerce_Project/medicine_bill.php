<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Care</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
    //include_once("../assets/navbar.php");
    include_once("./assets/header.php");
    ?>
    <div class="card">
        <div class="card-body mx-4">
            <?php
            $userInfo = [];
            //print_r($_SESSION);
            const HOST = "localhost";
            const USER = "root";
            const PASSWORD = "";
            const DB = "e-commerce db";
            try {
                $connect = new PDO("mysql:host=localhost;dbname=e-commerce db", USER, PASSWORD);
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "connect";
                $sql = "select ordersinfo.mid,
                             ordersinfo.quantity,
                             ordersinfo.order_id,
                             ordersinfo.order_date,
                             user.user_name,
                             user.Phone,
                             user.Email from ordersinfo inner join
                             user on(ordersinfo.user_id=user.user_id)
                             and user.user_id=:uid;
                             ";
                $stmt = $connect->prepare($sql);
                $stmt->execute(['uid' => $_SESSION['user-id']]);
                if ($rows = $stmt->fetch(PDO::FETCH_LAZY)) {
                    // print_r($rows);
                    $userInfo = $rows;
                }
                $stmt = null;
            } catch (PDOException $a) {
                die($a->getMessage());
            }
            ?>
        </div>
        <div class="container">
        <?php 
      if(!empty($_SESSION['user'])){ ?>
        <div class="float-right">
            Welcome <?php echo $_SESSION['user'];?>
            <a href="logout">
                <button class="btn btn-sm btn-outline-danger">Logout</button>
            </a>
        </div>
        <?php }else{
            echo "<script>alert('You are not allowed this page');
                    window.loation.href='logout';
                    </script>";
        } 
       ?>
            <p class="my-5 mx-5" style="font-size:30px;"><strong>Thank for your purchase</strong></p>
            <div class="row">
                <ul class="list-unstyled">
                    <li class="text-black"><?php echo $userInfo->user_name; ?></li>
                    <li class="text-black"><?php echo $userInfo->Email; ?> | <?php echo $userInfo->Phone; ?></li>
                    <li class="text-muted mt-1"><span class="text-black">Invoice :</span><?php echo $userInfo->order_id; ?></li>
                    <li class="text-muted mt-1"><?php echo date("dD-M-Y h:i:sA", strtotime($userInfo->order_date)); ?></li>
                </ul>
                <hr>
                <?php
                $mids = explode(",", $userInfo->mid);
                //print_r($mids);
                $qty = explode(",", $userInfo->quantity);
                //print_r($qty);
                try {
                    $i = 0;
                    $grossTotal = 0;
                    foreach ($mids as $mid) {
                        //echo $mid;
                        $sql2 = "select * from medicines where mid=:mid";
                        $stmt2 = $connect->prepare($sql2);
                        $stmt2->execute(['mid' => $mid]);
                        if ($rows = $stmt2->fetch(PDO::FETCH_LAZY)) {
                            //print_r($rows);
                            $grossTotal += ($rows->price * $qty[$i]);
                         ?>
                            <div class="col-xl-10">
                                <p><strong>Medicine Name:</strong></p>
                            </div>
                            <div class="col-xl-2">
                                <p class="float-end"><?php echo $rows->medicine_name; ?></p>
                            </div>
                            <div class="col-xl-10">
                                <p><strong>Quantity:</strong></p>
                            </div>
                            <div class="col-xl-2">
                                <p class="float-end"><?php echo $qty[$i]; ?></p>
                            </div>
                            <div class="col-xl-10">
                                <p><strong>Price:</strong></p>
                            </div>
                            <div class="col-xl-2">
                                <p class="float-end"><span class='badge badge-pills badge-danger'>&#8377;<?php echo $rows->price;?></span></p>
                            </div>
                            <div class="col-xl-10">
                                <p><strong>Total:</strong></p>
                            </div>
                            <div class="col-xl-2">
                                <p class="float-end"><span class="badge badge-pills badge-warning">&#8377;<?php echo $rows->price * $qty[$i];?></span></p>
                            </div>
                            <div class="col-xl-10">
                                <p><strong>Net Payble Amount:</strong></p>
                            </div>
                            <div class="col-xl-2">
                                <p class="float-end"><span class="badge badge-pills badge-success">&#8377;<?php echo $grossTotal;?></span></p>
                            </div>
                <?php
                        }
                        $i++;
                    }
                } catch (PDOException $x) {
                    die($ex->getMessage());
                }
                ?>
            </div>
        </div>
        <div align="center">
            <button onclick="window.print();" class="btn btn-md btn-outline-info">Print Out</button> ||
            <a href="index.php">
            <button class="btn btn-md btn-outline-dark">Back</button></a>
        </div>
    </div>
    <hr>
</body>
<?php include_once("./assets/footer.php");?>
</html>