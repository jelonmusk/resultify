<?php   
    
   session_start();
   
   if(isset($_SESSION['login_user'])){
      session_destroy();
      header("location: http://localhost/resultify/backend/login.php");
   }
   else{
      header("location: http://localhost/resultify/backend/login.php");
   }
?>