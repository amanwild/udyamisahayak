<?php

session_start();
include "./service/db.php";
include "./service/filter_input.php";



// sending OTP for forget Password
if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['forget_password'])) {

  $email = filter($_POST["forget_email"]);

  $exist_result = false;
  $exist_query = "SELECT * FROM `users_entries` WHERE user_email = '$email'";



  require "./forget_password/email_verification_shooting.php";


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
                echo "<script> window.location.replace('verify_email.php?user_email=$email');</script>";
              } else {
                // echo ("<br> email shooting failed <br>");
              }
            }
          } catch (Exception $e) {
            // echo "Data insertion failed " . "<br>";
            // echo 'Message: ' . $e->getMessage() . "<br>";
          }
          // echo "<script> window.location.replace('../product_details/index.php');</script>";
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


?>

<!DOCTYPE html>

<html lang="zxx">

<head>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forget Password : UdyamiSahayak</title>

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

  <link rel="icon" href="images/favicon.ico">
  <link rel="shortcut icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/thumbs.css">
  <link rel="stylesheet" href="css/slider.css">
  <link rel="stylesheet" href="css/style.css">

  <!--JS-->
  <!-- <script src="js/jquery.js"></script>
  <script src="js/jquery-migrate-1.2.1.js"></script> -->


</head>

<body>

  <?php include "./component/preloader.php"; ?>
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


  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

  <div id="main_wrapper">
    <?php include "./header/global_header.php"; ?>

    <div class="clearfix"></div>

    <script type="text/javascript">
      function validation_for_email() {
        var email = document.getElementById("register_email");
        email = email.value;
        $.ajax({
          url: "./validation_for_email.php",
          datatype: "json",
          type: "POST",
          data: {
            submit: "submit",
            email: email,
          },
          success: function(result) {
            $('#label_for_email_validation').html(result);
            if (0 < result.length) {
              document.getElementById("register_btn").disabled = true;
            } else {
              document.getElementById("register_btn").disabled = false;
            }
          }
        });
      }

      function validation_for_username() {
        var username = document.getElementById("register_username");
        username = username.value;
        $.ajax({
          url: "./validation_for_username.php",
          datatype: "json",
          type: "POST",
          data: {
            submit: "submit",
            username: username,
          },
          success: function(result) {
            $('#label_for_username_validation').html(result);
            if (0 < result.length) {
              document.getElementById("register_btn").disabled = true;
            } else {
              document.getElementById("register_btn").disabled = false;
            }
          }
        });
      }

      $(document).ready(function() {

        //##### Add record when Add Record Button is click #########
        $("#tab2").submit(function(e) {
          e.preventDefault();

          var register_username = $("#register_username").val(); //build a post data structure
          var register_email = $("#register_email").val(); //build a post data structure
          var register_first_name = $("#register_first_name").val(); //build a post data structure
          var register_last_name = $("#register_last_name").val(); //build a post data structure
          var register_value = $("#register_value").val(); //build a post data structure

          // console.log(register_value);
          // console.log(register_last_name);
          // console.log(register_first_name);
          // console.log(register_email);
          // console.log(register_username);
          jQuery.ajax({
            type: "POST", // Post / Get method
            url: "response.php", //Where form data is sent on submission
            dataType: "text", // Data type, HTML, json etc.
            data: {
              register_username: register_username,
              register_email: register_email,
              register_first_name: register_first_name,
              register_last_name: register_last_name,
              register_value: register_value
            }, //Form variables
            success: function(response) {

              console.log(response);
              alert(
                'Registration DONE Successfully\n\n' +
                "Eamil has been sent successfully, check your email for further process.\n"
              );
            },

            error: function(xhr, ajaxOptions, thrownError) {
              alert(thrownError);
            }
          });
        });

      });
    </script>

    <div id="" class="zoom-anim-dialog  container" style="background-color:#fafafa;">
      <div class="small_dialog_header">
        <h3>Reset Your Password</h3>
      </div>
      <div class="utf_signin_form style_three">
        <div class="tab_container alt ">
          <div class="tab_content" id="tab1">
            <form enctype="multipart/form-data" method="post" class="login">
              <input type="hidden" id="forget_password" name="forget_password" value="true">

              <p class="utf_row_form utf_form_wide_block">
                <label for="forget_email">Enter Your Email : <span class="text-danger">*</span></label>

                <label for="forget_email">
                  <input class="input-text" type="email" id="forget_email" onchange="validation_for_email()" onload="validation_for_email()" name="forget_email" placeholder="Type Your Email" />
                </label>
              </p>
              <div class="utf_row_form utf_form_wide_block form_forgot_part"> <span class="lost_password fl_left"> <a href="login.php">Already have an account? Login.</a> </span>
                <div class="checkboxes fl_right">
                  <span class=""> <a href="register.php">Don’t have an account? Create one here.</a> </span>
                </div>
              </div>
              <div class="utf_row_form">
                <input type="hidden" id="submit" name="submit" value="Reset" />
                <input type="submit" id="validate_email_btn" class="button border margin-top-5" name="login" value="Reset Password" />
              </div>

            </form>
          </div>


        </div>
      </div>
    </div>
  </div>
  <?php include "./component/footer.php"; ?>
  <!-- Scripts -->
  <script src="scripts/jquery-3.4.1.min.js"></script>
  <script src="scripts/chosen.min.js"></script>
  <script src="scripts/slick.min.js"></script>
  <script src="scripts/rangeslider.min.js"></script>
  <script src="scripts/magnific-popup.min.js"></script>
  <script src="scripts/jquery-ui.min.js"></script>
  <script src="scripts/bootstrap-select.min.js"></script>
  <script src="scripts/mmenu.js"></script>
  <script src="scripts/tooltips.min.js"></script>
  <script src="scripts/jquery_custom.js"></script>


</body>


</html>