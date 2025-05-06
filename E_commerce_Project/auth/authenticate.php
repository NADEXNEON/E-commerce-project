<?php 
  if(!empty($_SESSION['user'])){
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
    }
?>