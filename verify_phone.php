<?php
include "validation_of_session.php";
require "email_verification_shooting.php";

echo json_encode($_POST);


if (isset($_POST["verify_phone"]) && isset($_POST["verify_phone_otp"])) {
	$Sms_2factor_api_key = 'bd86fb72-38f5-11ee-addf-0200cd936042';

	$for_otp_verification = false;

	if ('' != $_POST["verify_phone"] && '' != $_POST["verify_phone_otp"]) {
		echo 'for_otp_verification';

		$is_phone_verified = false;
		$for_otp_verification = true;
		$verify_phone = $_POST["verify_phone"];
		$verify_phone_otp = $_POST["verify_phone_otp"];

		$query_result =	mysqli_query($connect, "SELECT * FROM `verify_phone` WHERE `verify_phone_no` LIKE '$verify_phone' AND `verify_phone_otp_id` LIKE '" . $_SESSION['phone_otp_id'] . "' AND `verify_phone_otp_expired` = 0 AND `verify_phone` = 0");

		if ($query_result) {
			$num = mysqli_num_rows($query_result);
			if ($num > 0) {
				$is_phone_verified = true;
				while ($row  = mysqli_fetch_assoc($query_result)) {
					$verify_phone_id = $row['verify_phone_id'];
					$curl = curl_init();

					curl_setopt_array($curl, array(
						// CURLOPT_URL => 'https://2factor.in/API/V1/'.$Sms_2factor_api_key.'/SMS/+91' . $verify_phone . '/AUTOGEN/OTP1',
						CURLOPT_URL => 'https://2factor.in/API/V1/' . $Sms_2factor_api_key . '/SMS/VERIFY/' . $_SESSION['phone_otp_id'] . '/' . $verify_phone_otp,
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => '',
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 0,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => 'GET',
					));

					$response = curl_exec($curl);

					curl_close($curl);
					$response = json_decode($response, true);
					echo var_dump($response);
					// {"verify_phone":"8766010817","verify_phone_otp":""}for_otp_sendarray(2) {
					// 	["Status"]=>
					// 	string(7) "Success"
					// 	["Details"]=>
					// 	string(11) "OTP Matched"
					//   }
					if ($response['Status'] == 'Success') {
						echo $response['Details'];

						$update_phone_entry = "UPDATE `verify_phone` SET `verify_phone_otp_id` = '', `verify_phone_otp_expired` = '1', `verify_phone` = '1' WHERE `verify_phone`.`verify_phone_id` = $verify_phone_id";
						// echo $update_phone_entry;
						if (mysqli_query($connect, $update_phone_entry)) {
							$_SESSION['is_phone_verified_for_register'] = 'true';
							$_SESSION['phone_for_register'] = $verify_phone;
						}
					}
					// {"verify_phone":"8766010817","verify_phone_otp":""}for_otp_sendarray(2) {
					// 	["Status"]=>
					// 	string(5) "Error"
					// 	["Details"]=>
					// 	string(12) "OTP Mismatch"
					//   }
					if ($response['Status'] == 'Error') {
						echo $response['Details'];
						echo "Invalid otp";
					}

				}


			} else {
				echo "Invalid otp";
			}
		} else {
			echo "Error While Proccessing";
		}
	}

	if ('' != $_POST["verify_phone"] && !$for_otp_verification) {

		echo 'for_otp_send';
		$exist = false;
		$verify_phone = $_POST["verify_phone"];
		$query_result =	mysqli_query($connect, "SELECT * FROM `users_entries` WHERE `user_phone` LIKE '$verify_phone'");

		if ($query_result) {
			$verify_phone_no = [];
			$num = mysqli_num_rows($query_result);
			if ($num > 0) {
				while ($row  = mysqli_fetch_assoc($query_result)) {

					$exist = true;
					$verify_phone_no += $row;
					echo "Phone no. already Exist";
				}
				foreach ($verify_phone_no as $data) {
					echo $data;
				}
			}
		}
		if (!$exist) {

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


			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://2factor.in/API/V1/'.$Sms_2factor_api_key.'/SMS/+91' . $verify_phone . '/AUTOGEN/OTP1',
				// CURLOPT_URL => 'https://2factor.in/API/V1/' . $Sms_2factor_api_key . '/SMS/VERIFY/4f7f9bd4-47ce-4490-8795-4aa8561d174b/253352',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'GET',
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$response = json_decode($response, true);
			echo var_dump($response);
			// {
			// 	["Status"]=>
			// 	string(5) "Error"
			// 	["Details"]=>
			// 	string(12) "OTP Mismatch"
			//   }

			if ($response['Status'] == 'Success') {
				$_SESSION['phone_otp_id'] = $response['Details'];
				// $_SESSION['phone_otp'] = $response['Details'];

				$update_phone_entry = "INSERT INTO `verify_phone` (`verify_phone_id`, `verify_phone_no`, `verify_phone_timestamp`, `verify_phone_otp_id`, `verify_phone_otp_expired`,`mac_address`) VALUES (NULL, '$verify_phone', current_timestamp(), '" . $response['Details'] . "', '', '$ipaddress')";
				// echo $update_phone_entry;
				if (mysqli_query($connect, $update_phone_entry)) {

					echo $response['Details'];
					echo 'Sent Success';
				}
			}

			// {"verify_phone":"87660","verify_phone_otp":""}for_otp_sendarray(2) {
			// 	["Status"]=>
			// 	string(5) "Error"
			// 	["Details"]=>
			// 	string(52) "Invalid Phone Number - Length Mismatch(Expected: 10)"
			//   }

			if ($response['Status'] == 'Error') {
				echo $response['Details'];
			}
		} else {
			echo "";
		}
	}
}
