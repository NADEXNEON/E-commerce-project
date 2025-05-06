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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            console.log("jQurey Loaded...");
            $("#search1").keyup(function(a) {
                let data = a.target.value;
                //console.log(data);
                //searching to live search begin and take it.....
                if (data.length >= 3) {
                    console.log(data); //search begin.....
                    $.ajax({
                        'url': 'http://localhost/E_commerce_Project/api/medicines/medicine_search.php?s=' + data,
                        'type': 'GET',
                        'data': {},
                        'success': function(res, status) {
                            //console.log(res);
                            //console.log(status);
                            if (status == 'success') {
                                $("#s2").hide();
                                var strContent = `
                                <table class="table table-responsive">
                                 <table class="table table-hover">
                                    <tr>
                                        <th>Medicine</th>
                                        <th>Composition</th>
                                        <th>Used for</th>
                                        <th>Price</th>
                                        <th>Upload Medicine Pic</th>
                                    </tr>`;
                                    for(let medObj of res){
                                        //console.log(medObj);
                                        strContent+=`
                                            <tr>
                                                <td>${medObj.medicine_name}</td>
                                                <td>${medObj.composition}</td>
                                                <td>${medObj.used_for}</td>
                                                <td>${medObj.price}</td>
                                                <td><img src="${medObj.image}" class="img-thumbnail" height="120px" width="120px"/></td>
                                            </tr>`;
                                    }
                                    strContent+=`</table>`;
                                    console.log(strContent);
                                    $("#s1").html(strContent);
                            }
                        },
                        'error': function(error) {
                            console.log(error);
                        }
                    })
                }
            });
        });
    </script>


</head>

<body>
    <?php
    if (empty($_SESSION['admin'])) {
        echo "<script>alert('You are not allow to this page....!');
                  window.location.href='login';
              </script>";
    }
    ?>
    <?php 
        include("./assets/nav1.php");
        include("./assets/header.php"); 
    ?>
    

    <?php if (!empty($_SESSION['message'])) {
        if ($_SESSION['message'] == 'medicine_insert_success') {
            echo " <div class='alert alert-success'>One Medicine Successfully Added.</div>";
        } else if ($_SESSION['message'] == 'medicine_insert_error') {
            echo "<div class='alert alert-danger'>Unable to add Medicine Now</div>";
        } else if ($_SESSION['message'] == 'update_success') {
            echo " <div class='alert alert-success'>One Medicine Successfully Updated...</div>";
        } else if ($_SESSION['message'] == 'update_error') {
            echo "<div class='alert alert-danger'>Unable to Update Medicine Now </div>";
        } else if ($_SESSION['message'] == 'medicine_delete_success') {
            echo " <div class='alert alert-danger'>One Medicine Successfully Deleted...</div>";
        } else if ($_SESSION['message'] == 'medicine_delete_error') {
            echo "<div class='alert alert-warning'>Unable to Delete Medicine Now </div>";
        }
        unset($_SESSION['message']);
    }
    ?>
    <div class="container">
        <div class="float-right">
            Welcome <?php echo $_SESSION['admin']; ?>
            <a href="logout.php">
                <button class="btn btn-sm btn-outline-danger" style="margin-bottom:10px;">Logout</button>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="form-group">
            <input type="search" name="search1" id="search1" placeholder="search medicines..." class="form-control" style="text-align:center;">
        </div>
        <div class="col">
        <div class="card m-3 p-3">
                    <header class="modal-header bg-success text-white">
                        <h4>Display All Medicines</h4>
                    </header>
                    <div id="s1"></div>
                    <div id="s2">
                        <div class="table table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>Medicine</th>
                                    <th>Composition</th>
                                    <th>Used for</th>
                                    <th>Price</th>
                                    <th>Upload Medicine Pic</th>
                                </tr>

                                <!-- Database connection.. -->
                                <?php
                                const HOST = "localhost";
                                const USER = "root";
                                const PASSWORD = "";
                                const DB = "e-commerce db";
                                try {
                                    $connect = new PDO("mysql:host=localhost;dbname=e-commerce db", USER, PASSWORD);
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    //echo "connected..";
                                    $sql = "select * from medicines";
                                    $output = $connect->query($sql);
                                    while ($rows = $output->fetch(PDO::FETCH_LAZY)) {
                                ?>
                                        <tr>
                                            <td><a href="medicine_edit?mid=<?php echo $rows->mid; ?>">
                                                    <button class="btn btn-sm btn-outline-primary">View</button></a></td>
                                            <td><?php echo $rows->medicine_name; ?></td>
                                            <td><?php echo $rows->composition; ?></td>
                                            <td><?php echo $rows->used_for; ?></td>
                                            <td><?php echo $rows->price; ?></td>
                                            <td><img src="<?php echo $rows->image; ?>" class="img-thumbnail" height="120px" width="120px" title="<?php echo $rows->medicine_name; ?>" /></td>
                                        </tr>
                                <?php
                                    }
                                    $connect = null;
                                } catch (PDOException $a) {
                                    die($a->getMessage());
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>        
           </div>
            <div class="col">
            <div class="card m-3 p-3">
                    <header class="modal-header bg-dark text-white">
                        <h4>Add Medicine:</h4>
                    </header>
                    <form action="add_medicine" method="POST" enctype="multipart/form-data">
                        <div class="form-group">Medicine : <input type="text" name="mname" required class="form-control"></div>
                        <div class="form-group">Composition: <input type="text" name="mcomp" required class="form-control"></div>
                        <div class="form-group">Used for: <textarea name="used_for" required class="form-control" rows="6" cols="30"></textarea></div>
                        <div class="form-group">Quantity: <input type="text" name="qty" required class="form-control"></div>
                        <div class="form-group">Price: <input type="number" name="mprice" required class="form-control"></div>
                        <div class="form-group">Upload Medicine Pic: <input type="file" name="mpic" id="mpic" required class="form-control"></div>
                        <div class="form-group text-center">
                            <button class="btn btn-sm btn-outline-dark">Add</button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
    <?php include("./assets/footer.php"); ?>
</body>

</html>