<?php
include "../service/db.php";
include "../service/filter_input.php";
include "../service/upload_image.php";


// if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['username'])) {
    
    // echo "new user";
    $user = filter($_POST["username"]);
  
    $exist_result = false;
    $exist_query = "SELECT * FROM `users_entries` WHERE  user_username = '$user'";
    try {
        $exist_result = mysqli_query($connect, $exist_query);
        $row  = mysqli_num_rows($exist_result);
        if ($row >  0) {
            $exist_result = 1;
            echo "Username $user is already taken. Please enter another username";
        }
       
    } catch (Exception $e) {
        // echo "Duplicate date Checking failed ";
        echo 'Message: ' . $e->getMessage() . "<br>";
    }
    