<?php
include "../service/db.php";
function filter($string)
{
    $string = str_replace("<", "&lt;", $string);
    $string = str_replace(">", "&gt;", $string);
    return $string;
}

// if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['username'])) {
    
    // echo "new user";
    $phone = filter($_POST["phone"]);
  
    $exist_result = false;
    $exist_query = "SELECT * FROM `users_entries` WHERE  user_phone = '$phone' AND is_verified_phone = 1 ";
    try {
        $exist_result = mysqli_query($connect, $exist_query);
        $row  = mysqli_num_rows($exist_result);
        if ($row >  0) {
            $exist_result = 1;
            echo "Phone number $phone is already registered. Please enter another Phone number";
        }
       
    } catch (Exception $e) {
        // echo "Duplicate date Checking failed ";
        echo 'Message: ' . $e->getMessage() . "<br>";
    }
    