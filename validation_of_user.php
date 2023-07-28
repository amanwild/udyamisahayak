
<?php

session_start();
// $loggedin = $_SESSION['loggedin'];
// $user = $_SESSION['user_Username'];
// // echo $loggedin;
// // // echo "<br>";
// // echo $user;
// // // echo "<br>";
if (isset($_SESSION['user_username'])) {
  // $user_First_name =$_SESSION['user_First_name'];
  // $user_Last_name = $_SESSION['user_Last_name'];
  // $user_Email =$_SESSION['user_Email'];
  // $user_Username =$_SESSION['user_Username'] ; 
  // $user_Id =$_SESSION['user_Id'];
  // $user_phone =$_SESSION['user_phone'];
  // echo "Valid user";
  // echo$user_First_name .$user_Last_name . $user_Email. $user_Username.$user_Id;  echo "Valid user";
} else {
  // echo "INVALID user";
  // echo "<br>";
  // $path  = "Signin";
  header("location: .././index.php");
}
include "../service/db.php";

$select_query = "SELECT * FROM `users_entries` WHERE `user_id` = " . $_SESSION['user_id'];
$select_result  = mysqli_query($connect, $select_query);
$num = mysqli_num_rows($select_result);
if ($num > 0) {
  while ($row = mysqli_fetch_assoc($select_result)) {
    $_SESSION['user_image'] = $row['user_image'];
    $_SESSION['user_first_name'] = $row['user_first_name'];
    $_SESSION['user_last_name'] = $row['user_last_name'];
    $_SESSION['user_email'] = $row['user_email'];
    $_SESSION['user_phone'] = $row['user_phone'];
    $_SESSION['user_type'] = $row['user_type'];
    $_SESSION['is_verified_email'] = $row['is_verified_email'];
    $_SESSION['user_request_for_seller'] = $row['user_request_for_seller'];
  }
}
?>