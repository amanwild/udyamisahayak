<?php
//include db configuration file
// include_once("config.php");
include "validation_of_session.php";
// foreach ($_POST as $key => $value) {
//   echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
// }
require "email_verification_shooting.php";

echo json_encode($_POST);

if (isset($_POST["register_email"]) && isset($_POST["register_value"])) {
	$user_type = $_POST["user_type"];
	$register_email = $_POST["register_email"];
	$register_phone = $_POST["register_phone"];
	$register_username = $_POST["register_username"];
	$register_first_name = $_POST["register_first_name"];
	$register_last_name = $_POST["register_last_name"];
	// echo"hello";
	$v_code = bin2hex(random_bytes(16));
	$hash = password_hash("12345", PASSWORD_DEFAULT);

	if (mysqli_query($connect, "INSERT INTO `users_entries` (`user_id`,`user_first_name`,`user_last_name`, `user_username`, `user_password`, `user_email`,`user_phone`, `user_timestamp`, `is_verified_email`, `is_verified_admin`, `user_type`, `user_vcode`, `user_otp`, `user_otp_created`, `user_otp_is_expired`) VALUES (NULL, '$register_first_name','$register_last_name','$register_username', '$hash', '$register_email','$register_phone', current_timestamp(), '0', '0', '$user_type', '$v_code', '', '', '')")) {
		echo "inserted";

		$store = send_mail($register_email, $v_code);
		if ($store) {
			$my_id = mysqli_insert_id($connect);
			echo "success";
			echo $my_id;
		}
	}
} else if (isset($_POST["enquery_form_value"])) {

	if (isset($_POST['enquery_email'])) {
		$enquery_email = $_POST["enquery_email"];
	}
	if (isset($_POST['enquery_phone'])) {
		$enquery_phone = $_POST["enquery_phone"];
	}
	if (isset($_POST['enquery_first_name'])) {
		$enquery_first_name = $_POST["enquery_first_name"];
	}
	if (isset($_POST['enquery_last_name'])) {
		$enquery_last_name = $_POST["enquery_last_name"];
	}
	if (isset($_POST['enquery_listing_id'])) {
		$enquery_listing_id = $_POST["enquery_listing_id"];
	}

	// $enquery_mac_address = $_SERVER['REMOTE_ADDR'];
	// $MAC = exec('getmac');

	// // Storing 'getmac' value in $MAC
	// $enquery_mac_address = strtok($MAC, ' ');
	// // $IP stores the ip address of client
	// // echo "Client's IP address is: $enquery_mac_address";
	if (isset($_SERVER['HTTP_CLIENT_IP']))
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else if (isset($_SERVER['HTTP_X_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	else if (isset($_SERVER['HTTP_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	else if (isset($_SERVER['REMOTE_ADDR']))
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	else
		$ipaddress = 'UNKNOWN';


	if (mysqli_query($connect, "INSERT INTO `enquery` (`enquery_id`, `enquery_first_name`, `enquery_last_name`, `enquery_listing_id`, `enquery_timestamp`, `enquery_email`, `enquery_phone`, `enquery_mac_address`) VALUES (NULL, '$enquery_first_name', '$enquery_last_name', '$enquery_listing_id', current_timestamp(), '$enquery_email', '$enquery_phone', '$ipaddress')")) {

		$_SESSION['enquery_email'] = $enquery_email;
		$_SESSION['enquery_phone'] = $enquery_phone;
		$_SESSION['enquery_first_name'] = $enquery_first_name;
		$_SESSION['enquery_last_name'] = $enquery_last_name;
		$_SESSION['enquery_id'] = mysqli_insert_id($connect);
		echo "success enquery";
	}
} else {
	echo "failed";
}
