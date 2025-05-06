<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Care</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .custom-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            margin-top:40px;
        }

        .custom-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 15px rgba(24, 18, 18, 0.8);
        }

        .custom-card img {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .custom-card .card-body {
            background: #ffffff;
            padding: 15px;
            text-align: center;
        }

        .custom-card .card-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .custom-card .card-text {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        .custom-card .btn-info {
            background: #17a2b8;
            color: white;
            border-radius: 20px;
            padding: 8px 15px;
            transition: 0.3s ease-in-out;
            border: none;
        }

        .custom-card .btn-info:hover {
            background: #138496;
            transform: scale(1.05);
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            console.log("jQuery Loaded..");
        })
        var med_qty = 0;
        var medicineId = [];
           
        function onQtySet(s) {
            //console.log(s);
            med_qty = s;
            console.log(med_qty);
        }
        var qty = [];

        function onSet(mid) {
            //console.log(mid);
            qty.push(med_qty);
            medicineId.push(mid);
            console.log(medicineId);
            document.getElementById("view_cart").innerHTML = `
            <span class='badge badge-pills badge-danger' style="margin-bottom:50px;">${medicineId.length}</span> <i class="fa-solid fa-cart-shopping" style="font-size:30px;"></i>`;
        }

        function saveCart() {
            localStorage.setItem("totalQty", qty);
            localStorage.setItem("cartItems", medicineId);
            alert("Item has been saved to cart successfully");
            window.location.href = 'cart';
        }
    </script>
</head>

<body>
    <?php
    include_once("./assets/navbar.php");
    include_once("./assets/header.php");
    //include_once("./auth/authenticate.php");
    ?>

    <div class="float-right" style="margin-left:20px;">
        <a href="#" id="view_cart" onclick="saveCart()">
          <i class="fa-solid fa-cart-shopping" style="font-size:30px; margin-top:40px;"></i></a>
    </div>
    

    <div class="container">
        <div class="row">
            <?php
            const HOST = "localhost";
            const USER = "root";
            const PASSWORD = "";
            const DB = "e-commerce db";

            try {
                $connect = new PDO("mysql:host=localhost;dbname=e-commerce db", USER, PASSWORD);
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "select * from medicines";
                $output = $connect->query($sql);
                while ($rows = $output->fetch(PDO::FETCH_LAZY)) {
            ?>
                    <!-- cart section in view on medicine buying..... -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card custom-card">
                            <img src="<?php echo $rows->image;?>" class="card-img-top" alt="No img">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $rows->medicine_name; ?></h5>
                                <p class="card-text">Price:<span>&#8377;</span></Price:span><?php echo $rows->price; ?></p>
                                <p class="form-group">
                                    <select onchange="onQtySet(this.value)" name="qty" class="form-control" onchange="onSet(this.value)">
                                        <option value="">----Choose Quantity----</option>
                                        <?php
                                        for ($i = 1; $i <= 10; $i++) { ?>
                                            <option><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </p>
                                <button class="btn btn-sm btn-outline-info" value="<?php echo $rows->mid ?>" onclick="onSet(this.value)">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
            <?php
                }
                $connect = null;
            } catch (PDOException $a) {
                die($a->getMessage());
            }
            ?>
        </div>
    </div>
    <?php include_once("./assets/footer.php"); ?>
</body>

</html>