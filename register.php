<?php
include('./php_mailer_config/config.php');

unset($_SESSION['phone_for_register']);
unset($_SESSION['is_phone_verified_for_register']);

if (!isset($_SESSION['access_token'])) {

  $login_button = '<a href="' . $google_client->createAuthUrl() . '">Login With Google</a>';

  include "./service/db.php";
  include "./service/filter_input.php";


  // sending OTP for forget Password
  if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['forget_password'])) {

    $email = filter($_POST["forget_email"]);

    $exist_result = false;
    $exist_query = "SELECT * FROM `users_entries` WHERE user_email = '$email'";



    require "email_verification_shooting.php";


    $exist_result = mysqli_query($connect, $exist_query);
    // echo "here";
    // var_dump($exist_result);
    // $_SESSION['user_type'] = 'none';
    try {
      if ($exist_result) {
        $num  = mysqli_num_rows($exist_result);
        if ($num > 0) {
          while ($row = mysqli_fetch_assoc($exist_result)) {

            // generate OTP
            $user_otp = rand(100000, 999999);
            $_SESSION['user_username'] = $row['user_username'];
            $user_id = $row['user_id'];
            $_SESSION['user_id'] = $row['user_id'];


            $insert_query = "UPDATE `users_entries` SET `user_otp` = '$user_otp',`user_otp_is_expired` = '0', `user_otp_created` = '" . date("Y-m-d H:i:s") . "' WHERE `users_entries`.`user_id` = $user_id";

            try {
              $insert_result = mysqli_query($connect, $insert_query);

              if ($insert_result) {

                // echo "Data insertion" . "<br>";
                $store = send_mail($email, $user_otp);
                if ($store) {
                  echo ("<script> alert('Your OTP has been sent successfully to your $email') </script>");
                  // echo ("<br> email shooting successfull <br>");
                  echo "<script> window.location.replace('./login/verify_email.php?user_email=$email');</script>";
                } else {
                  // echo ("<br> email shooting failed <br>");
                }
              }
            } catch (Exception $e) {
              // echo "Data insertion failed " . "<br>";
              // echo 'Message: ' . $e->getMessage() . "<br>";
            }
            // echo "<script> window.location.replace('https://127.0.0.1:8080/author/product_details/index.php');</script>";
          }
        } else {
          $exist_result = false;
          // echo "invalid username";
          // header("location: /forum/index.php");
        }
      }
    } catch (Exception $e) {
      // echo "Data insertion failed " . "<br>";
      // echo 'Message: ' . $e->getMessage() . "<br>";
    }
  }



  if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['submit_login'])) {

    $user = filter($_POST["login_username"]);
    $login_password = $_POST["login_password"];


    $exist_result = false;
    $exist_query = "SELECT * FROM `users_entries` WHERE user_username = '$user'";
    $exist_result = mysqli_query($connect, $exist_query);
    // var_dump($exist_result);
    // $_SESSION['user_type'] = 'none';

    try {
      if ($exist_result) {
        $num  = mysqli_num_rows($exist_result);
        if ($num > 0) {
          while ($row = mysqli_fetch_assoc($exist_result)) {
            $is_verified_email = $row["is_verified_email"];
            // echo $login_password;
            // echo $is_verified_email;

            // var_dump(password_verify($login_password, $row['user_password']));
            if (password_verify($login_password, $row['user_password'])) {
              // echo $login_password;
              $_SESSION['user_username'] = $row['user_username'];
              $_SESSION['user_id'] = $row['user_id'];
              $_SESSION['user_type'] = $row['user_type'];

              if ($row['user_type'] == 'admin') {
                echo "<script> window.location.replace('../admin_panel/index.php');</script>";
              }

              if ($row['user_type'] == 'user') {
                echo "<script> window.location.replace('../user_panel/dashboard_add_listing.html');</script>";
              }
            }
          }
        } else {
          $exist_result = false;
          // echo "invalid username";
          // header("location: /forum/index.php");
        }
      }
    } catch (Exception $e) {
      echo "Data insertion failed " . "<br>";
      // echo 'Message: ' . $e->getMessage() . "<br>";
    }
  }
}
?>
<!DOCTYPE html>

<html lang="zxx">

<head>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register : UdyamiSahayak</title>


  <!-- Favicon -->
  <link rel="shortcut icon" href="images/favicon.png">
  <!-- Style CSS -->
  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/mmenu.css">
  <link rel="stylesheet" href="css/style.css" id="colors">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css">
  <!-- ****NEW**-->
  <link type="text/css" rel="stylesheet" href="css/im-homepage-v39.min.css">
  <!--chrome-->
  <link href="css/styles.css" rel="stylesheet" type="text/css">
  <link href="css/styles2.css" rel="stylesheet" type="text/css">
  <link href="css/styles3.css" rel="stylesheet" type="text/css">
  <link href="css/grid.css" rel="stylesheet" type="text/css">
  <link href="css/reset.css" rel="stylesheet" type="text/css">
  <link href="css/stylenew.css" rel="stylesheet" type="text/css">
  <link href="css/thumbs.css" rel="stylesheet" type="text/css">





  <!-- <link href='https://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>  -->

  <link rel="icon" href="images/favicon.ico">
  <link rel="shortcut icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="css2/form.css">
  <link rel="stylesheet" href="css/thumbs.css">
  <link rel="stylesheet" href="css2/slider.css">
  <link rel="stylesheet" href="css/style.css">

  <!--JS-->
  <!-- <script src="js/jquery.js"></script>
  <script src="js/jquery-migrate-1.2.1.js"></script> -->
  <!--<script src="js/script.js"></script>
<script src="js/superfish.js"></script>
<script src="js/sForm.js"></script>
<script src="js/jquery.ui.totop.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.iosslider.min.js"></script>
<script> -->


</head>

<body>

  <?php include "./component/preloader.php";
  ?>

  <style>
    .sampleMarquee {
      color: #ffffff;
      background-color: #ff2222;
      font-size: 34px;
      line-height: 31px;
      padding: 1px;
      margin: 1px;
      font-style: italic;
      text-align: left;
      font-variant: small-caps;
      border-radius: 30px;
      border-style: groove;
    }

    .image-container {
      position: relative;
      top: -50px;
    }

    .image-container img {
      position: absolute;
      top: -9px;
      right: 0;
    }
  </style>


  <!-- Wrapper -->
  <div id="main_wrapper">
    <?php include "./header/global_header.php"; ?>

    <div class="clearfix"></div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>



    <script type="text/javascript">
      function validation_for_email_username_phone() {
        var email = document.getElementById("verify_email");
        email = email.value;
        var username = document.getElementById("verify_username");
        username = username.value;
        var phone = document.getElementById("verify_phone");
        phone = phone.value;
        $.ajax({
          url: "validation_for_email_username_phone.php",
          datatype: "JSON",
          type: "POST",
          data: {
            submit: "submit",
            email: email,
            username: username,
            phone: phone,
          },
          success: function(result) {
            result = JSON.parse(result);
            json_data = result;
            console.log(json_data);
            console.log(json_data[0][0]);
            console.log(json_data[1][0]);
            console.log(json_data[2][0]);
            if (0 < (json_data[0][0]).length) {
              $('#label_for_username_validation').html(json_data[0][1]);
            }
            if (0 < (json_data[1][0]).length) {
              $('#label_for_email_validation').html(json_data[1][1]);
            }
            if (0 < (json_data[2][0]).length) {
              $('#label_for_phone_validation').html(json_data[2][1]);
            }

            if (0 < (json_data[0][1] + json_data[1][1] + json_data[2][1]).length) {
              document.getElementById("verify_btn").disabled = true;
            } else {
              document.getElementById("verify_btn").disabled = false;
            }
          }
        });
      }

      $(document).ready(function() {
        $('#btn_send_otp').show();
        $('#btn_submit_otp').hide();
        $('#input_enter_otp').hide();

        $("#verify_phone_for_register").submit(function(e) {
          e.preventDefault();
          var verify_phone = $("#verify_phone").val(); //build a post data structure
          var verify_phone_otp = $("#verify_phone_otp").val(); //build a post data structure
          jQuery.ajax({
            type: "POST", // Post / Get method
            url: "verify_phone.php", //Where form data is sent on submission
            dataType: "text", // Data type, HTML, json etc.
            data: {
              verify_phone: verify_phone,
              verify_phone_otp: verify_phone_otp,
            }, //Form variables
            success: function(response) {

              // console.log(response);
              // alert(
              //   'OTP Sent Successfully\n\n'
              // );
              if (response.includes('Sent Success')) {
                console.log(response);
                $('#btn_send_otp').hide();
                $('#btn_submit_otp').show();
                $('#input_enter_otp').show();
                alert(
                  'OTP Sent Successfully\n\n'
                );
              }
              if (response.includes('Invalid otp')) {
                console.log(response);
                alert(
                  'Invalid otp Entered\n\n'
                );
              }
              if (response.includes('Invalid Phone Number')) {
                console.log(response);
                alert(
                  'Invalid Phone Number - Length Mismatch(Expected: 10)\n\n'
                );
              }
              if (response.includes('failed')) {
                console.log(response);
                alert(
                  'Phone no. Verification is  Failed\n\n'
                );
              }
              if (response.includes('Verified')) {
                console.log(response);
                alert(
                  'Phone no. is Successfully Verified\n\n'
                );
                window.location.replace('register_account.php');
              }
              if (response.includes('OTP Matched')) {
                console.log(response);
                alert(
                  'Phone no. is Successfully Verified\n\n'
                );
                window.location.replace('register_account.php');
              }
              if (response.includes('already Exist')) {
                console.log(response);
                alert(
                  'Phone no. Already Exist\n\n'
                );
              }
            },
            error: function(xhr, ajaxOptions, thrownError) {
              alert(thrownError);
            }
          });
        });

      });
    </script>


    <div id="" class="zoom-anim-dialog">
      <div class="small_dialog_header">
        <h3>Register</h3>
      </div>
      <div class="utf_signin_form style_one">

        <div class="tab_container alt container">


          <div class="tab_content" id="verify_phone_for_register">
            <form enctype="multipart/form-data" method="post" class="register">

              <?php echo "<h4 style='color:red;' id='label_for_phone_validation'></h4>"; ?>
              <p class="utf_row_form utf_form_wide_block">
                <label for="verify_phone">Phone no.
                  <input type="tel" class="input-text" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" name="verify_phone" id="verify_phone" value="" placeholder="Phone no." />
                </label>
              </p>
              <p class="utf_row_form utf_form_wide_block" id='input_enter_otp'>
                <label for="verify_phone_otp">Enter OTP.
                  <input type="number" class="input-text" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" name="verify_phone_otp" id="verify_phone_otp" value="" placeholder="Enter OTP" />
                </label>
              </p>
              <p class="utf_row_form utf_form_wide_block" id='btn_send_otp'>
                <label>
                  <input type="submit" id="verify_phone_btn" class="button border fw margin-top-10" name="verify_phone_btn" value="Send OTP" />
                </label>
              </p>
              <p class="utf_row_form utf_form_wide_block" id='btn_submit_otp'>
                <label>
                  <input type="submit" id="verify_phone_otp" class="button border fw margin-top-10" name="verify_phone_otp" value="Verify Phone No." />
                </label>
              </p>


              <div class="utf_row_form utf_form_wide_block form_forgot_part">
                <div class="checkboxes fl_right">
                  <span class=""> <a href="login.php">Already have an account? Login.</a> </span>
                </div>
              </div>

              <input type="hidden" name="verify_phone_value" value="verify_phone_value" id="verify_phone_value" />
              <!-- <input type="submit" id="verify_btn" class="button border fw margin-top-10" name="verify" value="verify" /> -->
            </form>
          </div>

        </div>
      </div>
    </div>
    <?php include "./component/footer.php"; ?>
</body>

</html>