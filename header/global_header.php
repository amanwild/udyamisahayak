<?php 
if(isset($_SESSION['user_type'])){
  if($_SESSION['user_type'] =='admin'){
    include 'admin_header.php';
  }
  else if($_SESSION['user_type'] =='user'){
    include 'user_header.php';
  }
  else if($_SESSION['user_type'] =='buyer'){
    include 'buyer_header.php';
  }
}
else{
  // include 'admin_header.php';
  // include 'user_header.php';
  // include 'buyer_header.php';
  include 'stranger_header.php';
  
}
?>
