
<?php 
session_start();
include "../service/db.php";

// $servername = "localhost";
// $username = "root";
// $pass = "root";
// $database = "udyamisahayak";
// try {
//   $connect = mysqli_connect($servername, $username, $pass, $database);
//   $GLOBALS['connect']  = $connect;
//   // echo"connection was successfull";
// } catch (Exception $e) {

//   $mess = $e->getMessage();
//   // echo"connection was unsuccessfull";

// }
?><?php
// session_start();
// $servername = "localhost";
// $username = "root";
// $pass = "root";
// $database = "ruralhaat";
// include "../validation_of_session.php";


// try {
//     $connect = mysqli_connect($servername, $username, $pass, $database);
//     $GLOBALS['connect']  = $connect;
//     // echo "connection was successfull";
// } catch (Exception $e) {

//     $mess = $e->getMessage();
//     // echo "connection was unsuccessfull";
// }
// echo "here";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // echo "enter";
    $id = $_POST["id"];

    $update_query = "UPDATE `listing` SET `listing_permission` = 'Approved', `listing_status` = 'Active', `listing_status_timestamp`=current_timestamp(), `listing_permission_timestamp`=current_timestamp() WHERE `listing`.`listing_id` = $id";
    try {
        $update_result = mysqli_query($connect, $update_query);
    } catch (Exception $e) {
        $mess = $e->getMessage();
    }
    if ($update_result > 0) {
        echo ("Success Listing approved");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['array_of_checked_id'])) {
    $array_of_checked_id = $_POST["array_of_checked_id"];
    $update_query = '';
    foreach ($array_of_checked_id as $id) {

        $update_query = "UPDATE `listing` SET `listing_permission` = 'Approved', `listing_status` = 'Active', `listing_status_timestamp`=current_timestamp(), `listing_permission_timestamp`=current_timestamp() WHERE `listing`.`listing_id` = $id;";
        try {
            echo $update_query;
            $update_result = mysqli_query($connect, $update_query);
        } catch (Exception $e) {
            $mess = $e->getMessage();
        }
    }
    if ($update_result) {
        echo ("Success Listing approved");
    }
}
