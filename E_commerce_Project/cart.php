<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Care</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
   <?php 
     include_once("./assets/navbar.php");
     include_once("./assets/header.php");
    ?>

    <script>
        var medicineIds = [];
        function orderItems(){
            var userId=document.getElementById("h_user_id").value;
            //console.log("order now");
            var cartItems=localStorage.getItem("cartItems");
            var totalQty=localStorage.getItem("totalQty");
            console.log(cartItems,userId);
            $.ajax({
                "url":'http://localhost/E_commerce_Project/api/medicines/add.php',
                "type":"POST",
                "data":{
                    "user_id":userId,
                    "medicineIds":cartItems,
                    "quantity":totalQty,
                    "order_id":"order-"+Math.floor(Math.random()*999999),
                },
                "success":function(data,status){
                    console.log(data);
                    if(data.message=="order_success"){
                        alert("Your orders has been placed succesfully done....\n Our executive will give you a call for medicine verification purpose\n Please remember your order id for future reference"+data.order_id);
                        window.location.href='medicine_bill';
                    }else{
                        alert("Server busy please try again....!");
                    }
                },
                "error":function(error){
                    console.log(error);
                }
            })
        }
        
        function removeItem(medicineId) {
            console.log(medicineId);
            var r = confirm("Do you want to remove this medicine items from the list?");
            if (r) {
                alert("Done You Got Remove This Item...");
                medicineIds.pop(medicineId);
                console.log(medicineIds);
                localStorage.setItem("cartItems",medicineIds);
                populateCartItems();
            }
        }

        function populateCartItems(){
            medicineIds = localStorage.getItem("cartItems").split(",");
            //console.log(medicineIds);
            var allmedicines = [];
            $.ajax({
                "url": 'http://localhost/E_commerce_Project/api/medicines/api.php',
                "type": 'POST',
                "data": {
                    "mids": medicineIds
                },
                "success": function(data, status) {
                    //console.log(data);
                    var totalQty=localStorage.totalQty;
                    totalQty=totalQty.split(",");
                    console.log(totalQty);
                    var strContent = `
                     <table class="table table-hover">
                      <header class="modal-header">
                        <h4><ins>SHOWING MEDICINE ITEMS</ins></h4>
                      </header>
                      <tr>
                        <th>Action</th>
                        <th>Medicine</th>
                        <th>Composition</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Icon</th>
                      </tr>
                    `;
                    let i=0;
                    for (let medicineObj of data) {
                        strContent += `
                         <tr>
                            <td><button class="btn btn-sm btn-outline-dark" value='${medicineObj.mid}' onclick='removeItem(this.value)'>REMOVE</button></td>
                            <td>${medicineObj.medicine_name}</td>
                            <td>${medicineObj.composition}</td>
                            <td>${medicineObj.price}</td>
                            <td>${totalQty[i++]}</td>
                            <td><img src="${medicineObj.image}" class="img-thumbnail" height="120p" width="120p"/></td>
                        </tr>
                        `;
                    }
                    strContent += `</table>`;
                    //console.log(strContent);
                    $("#d1").html(strContent);
                },
                "error": function(error) {
                    console.log(error);
                }
            })

        }
        $(document).ready(function() {
            console.log("jQuery Loaded..");
            console.log("item saved inside localStorage is", localStorage.getItem("cartItems"));
            populateCartItems();
        });
    </script>
</head>

<body>
    <div class="container">
        <div id="d1" class="table-responsive">
          
        </div>
        <div class="modal-footer">
            <input type="hidden" name="h_user_id" id="h_user_id" value="<?php echo $_SESSION['user-id'];?>">
            <button class="btn btn-md btn-outline-danger" onclick="orderItems()">ORDER NOW</button>
        </div>
    </div>
    <?php  include_once("./assets/footer.php");?>
</body>

</html>