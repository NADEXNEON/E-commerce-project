<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Care</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="./root.js" defer></script>
</head>
<style type="text/css">
*{
     margin: 0%;
     padding: 0%;
 }
 body{
     font-family: 'Roboto', sans-serif;
     background-color: rgb(223, 222, 222);
 }
 nav{
     display: flex;
     align-items: center;
     justify-content: space-around;
     position: fixed;
     top: 0%;
     width: 100%;
     height: 70px;
     background-color: rgb(3, 126, 202);
 }
 ul{
     display: flex;
 }
 ul li{
     list-style: none;
 }
 ul li a{
     text-decoration: none;
     color: white;
     font-size: 21px;
     margin-inline: 22px;
 }
 .logo{
     font-size: 22px;
 }
 .main{
     display: flex;
     justify-content: space-around;
     margin-top: 88px;
 }
 .main img{
     width: 320px;
 }
 .mainText{
     margin-top: 55px;
 }
 .main h1{
     font-size: 66px;
 }
 .main p{
   margin-top: 22px;
 }
 /*.main button{
     width: 140px;
     height: 40px;
     background-color: blue;
     color: white;
     font-size: 20px;
     margin-top: 22px;
     border: none;
     cursor: pointer;
 }*/
 .head{
     text-align: center;
     padding:88px;
 }
 .special{
     display: flex;
     flex-wrap: wrap;
     justify-content: center;
 
 }
 .special .card{
     width: 300px;
     height: 130px;
     padding: 22px;
     background-color: rgb(0, 128, 255);
     color: white;
     margin-inline: 22px;
     border-radius: 6px;
     text-align: center;
     cursor: pointer;
     margin-top: 22px;
    
 }
 .doctor{
     display: flex;
     flex-wrap: wrap;
     justify-content: center;
 }
 .docCard{
     width: 300px;
     margin-inline: 22px;
     text-align: center;
     margin-top: 22px;
     border: none;
     border-radius: 12px;
     overflow: hidden;
     box-shadow: 20px 20px 20px rgba(0, 0, 0, 0.15);
     /* transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; */
     margin-top:40px;
 }
 .docCard img{
     width: 100%;
     height: 300px;
 }
 .docCard p{
     background-color: black;
     padding: 22px;
     color: white;
     font-size: 22px;
 }
 .review{
     width: 900px;
     height: 300px;
     position: relative;
     margin:auto ;
     overflow: hidden;
 }
 .reviewCard{
     width: 100%;
     height: 100%;
     display: flex;
     justify-content: center;
     position: absolute;
     margin: auto;
     text-align: center;
     transition: all 1s ease;
 }
 .reviewCard img{
     width: 240px;
     margin-inline: 22px;
     height: 250px;
 }
 .footer{
     display: flex;
     flex-wrap: wrap;
     justify-content: space-around;
     padding: 66px;
     margin-top: 66px;
     background-color: black;
     color: white;
 
 }
 .text p{
     margin-top: 22px;
 }
 #icon{
     font-size: 27px;
     cursor: pointer;
 }
 .mode{
     background-color: rgb(17, 17, 17);
     color: rgb(255, 255, 255);
 }
 .detailCard{
     width: 400px;
     height: 260px;
     background-color: rgb(2, 102, 102);
     color: white;
     text-align: center;
     padding: 22px;
     border-radius: 7px;
     position: fixed;
     left: 50%;
     right: 50%;
     transform: translate(-50%, 40%);
     top: 5%;
 }
 .detailCard h1{
     margin-top: 22px;
 }
 .detailCard p{
     margin-top: 22px;
 }
 #cross{
     position: absolute;
     top: 0%;
     left: 0%;
     background-color: black;
     padding: 11px;
     font-size: 22px;
     border-radius: 5px;
     cursor: pointer;
 
 }
 
 @media screen and (max-width:960px){
     .main{
         display: block;
         text-align: center;
     }
     ul{
         display: none;
     }
 }
 
 @media screen and (max-width:920px){
     .review{
         width: 90%;
     }
     .review img{
         width: 200px;
         margin-inline: 9px;
     }
 }
 
 @media screen and (max-width:670px){
     .review img{
         width: 170px;
         height: 170px;
         margin-inline: 4px;
     }
 }
 
 @media screen and (max-width:500px){
     .review img{
         width: 100px;
         height: 110px;
     }
     .detailCard{
         width: 80%;
     }
 }
 
 @media screen and (max-width:600px){
     .main h1{
         font-size: 33px;
     }
     .main p{
         font-size: 14px;
     }
     .main img{
         width: 90%;
     }
 }
</style>
<body>
    <?php
    include_once("./assets/nav1.php");
    include_once("./assets/header.php");
    ?>
    <div class="main">
             <div class="mainText">
                 <h1>Care Patient At <br>
                     Life Care</h1>
                 <p>Medicines can treat diseases and improve your health. <br>
                 If you are like most people, you need to take medicine at some point in your life. <br>
                 There are always risks to taking medicines.</p>
                   <a href="signup">
                    <button class="btn btn-md btn-outline-primary">Visiting</button>
                  </a>
             </div>
             <img src="./Images/main.png" alt="no-image">
         </div>
         <hr>
          <div id="doctor">
             <div class="head">
                 <h1><strong><ins>Our Doctor's</ins></strong></h1>
             </div>
             <div class="doctor">
                 <div class="docCard">
                     <img src="./Images/doc1.jpg" alt="">
                     <p>Alexa Zoan</p>
                 </div>
                 <div class="docCard">
                     <img src="./Images/doc2.jpg" alt="">
                     <p>Lara Zecaprio</p>
                 </div>
                 <div class="docCard">
                     <img src="./Images/doc3.jpg" alt="">
                     <p>Denver Marc</p>
                 </div>
             </div>
         </div>
        <hr>
         <div id="review">
             <div class="head">
                 <h1><strong><ins>Patient Review's</ins></strong></h1>
             </div>
             <div class="review">
                 <div class="reviewCard">
                     <img src="./Images/p1.jpg" alt="">
                     <img src="./Images/p2.jpg" alt="">
                     <img src="./Images/p3.jpg" alt="">
 
                 </div>
                 <div class="reviewCard">
                     <img src="./Images/p4.jpg" alt="">
                     <img src="./Images/p4.jpg" alt="">
                     <img src="./Images/p5.jpg" alt="">
 
                 </div>
                 <div class="reviewCard">
                     <img src="./Images/p6.jpg" alt="">
                     <img src="./Images/p7.jpg" alt="">
                     <img src="./Images/p3.jpg" alt="">
 
                 </div>
                 <div class="reviewCard">
                     <img src="./Images/p2.jpg" alt="">
                     <img src="./Images/p5.jpg" alt="">
                     <img src="./Images/p1.jpg" alt="">
 
                 </div>
             </div>
         </div>
    <?php include_once("./assets/footer.php"); ?>
</body>

</html>
