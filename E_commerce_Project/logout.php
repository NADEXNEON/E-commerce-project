<?php 
   session_start();
   session_destroy();
   echo "<script>
        alert('Logout Sucesfully done....');
        window.location.href='login';
    </script>";
?>