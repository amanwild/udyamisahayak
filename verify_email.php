<?php
if (isset($_GET['user_email'])) {

  $user_email = $_GET['user_email'];
  session_start();
  include "./service/db.php";
  include "./service/filter_input.php";

  $check_email_with_otp = " SELECT user_otp FROM `users_entries` WHERE `user_email` LIKE '$user_email' ";

  $check_email_with_otp_result = mysqli_query($connect, $check_email_with_otp);
  if ($check_email_with_otp_result) {
    // echo "here";
    $num_check_email_with_otp_result  = mysqli_num_rows($check_email_with_otp_result);
    if ($num_check_email_with_otp_result > 0) {
      // echo "here";
      while ($row_check_email_with_otp_result = mysqli_fetch_assoc($check_email_with_otp_result)) {

        if ($row_check_email_with_otp_result['user_otp'] != '') {


          if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['verify_email'])) {

            $email_otp = filter($_POST["email_otp"]);
            $user_email = filter($_POST["user_email"]);

            $exist_result = false;

            // echo $user_email;
            // echo $email_otp;
            $exist_query = "SELECT * FROM `users_entries` WHERE `user_otp` LIKE '$email_otp' AND `user_email` LIKE '$user_email' AND user_otp_created >= now() - INTERVAL 1 DAY AND user_otp_is_expired = 0 AND is_verified_email LIKE 1";


            // echo $email_otp;
            $exist_result = mysqli_query($connect, $exist_query);
            // echo "here";
            // var_dump($exist_result);  
            try {
              if ($exist_result) {
                // echo "here";
                $num  = mysqli_num_rows($exist_result);
                if ($num > 0) {
                  // echo "here";
                  while ($row = mysqli_fetch_assoc($exist_result)) {

                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_username'] = $row['user_username'];
                    $_SESSION['user_email'] = $row['user_email'];
                    // $_SESSION['user_type'] = $row['user_type'];
                    $user_id = $row['user_id'];

                    $update_query = "UPDATE `users_entries` SET `user_otp` = '', `user_otp_created` = '', `user_otp_is_expired` = '1' WHERE `users_entries`.`user_id` = $user_id";

                    try {
                      // echo "success";
                      $update_result = mysqli_query($connect, $update_query);

                      if ($update_result) {

                        echo ("<script> alert('Valid OTP') </script>");
                        // echo "<script> window.location.replace('./reset_password.php');</script>";
                        header("location: ./reset_password.php");
                      } else {
                        echo ("<script> alert('Invalid OTP') </script>");
                      }
                    } catch (Exception $e) {
                      // echo "Data insertion failed " . "<br>";
                      // echo 'Message: ' . $e->getMessage() . "<br>";
                    }
                    // echo "<script> window.location.replace('http://127.0.0.1:8080/author/product_details/index.php');</script>";
                  }
                } else {
                  $exist_result = false;
                  echo ("<script> alert('Invalid OTP') </script>");
                  // echo "invalid username";
                  // header("location: /forum/index.php");
                }
              }
            } catch (Exception $e) {
              // echo "try insertion failed " . "<br>";
              // echo 'Message: ' . $e->getMessage() . "<br>";
            }
          } ?>

          <!DOCTYPE html>

          <html lang="zxx">

          <head>
            <meta name="author" content="">
            <meta name="description" content="">
            <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Verify Email : UdyamiSahayak</title>

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
            <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
            <!-- Wrapper -->
            <div id="main_wrapper">
              <?php include "./header/global_header.php"; ?>

              <div class="clearfix"></div>



              <div id="" class="zoom-anim-dialog  container" style="background-color:#fafafa;">
                <div class="small_dialog_header">
                  <h3>Verify Email</h3>
                </div>


                <div class="utf_signin_form style_three">
                  <div class="tab_container alt ">
                    <div class="tab_content" id="tab1">
                      <form enctype="multipart/form-data" method="post" class="login">

                        <p class="utf_row_form utf_form_wide_block">
                          <label for="email_otp">Enter OTP : <span class="text-danger">*</span></label>

                          <label for="email_otp">
                            <input class="input-text" type="text" id="email_otp" name="email_otp" placeholder="OTP" />
                          </label>
                        </p>

                        <div class="utf_row_form">
                          <input type="hidden" id="verify_email" name="verify_email" value="verify_email" />
                          <input type="hidden" id="user_email" name="user_email" value=<?= $_GET['user_email'] ?> />
                          <input type="submit" id="validate_email_btn" class="button border margin-top-5" name="verify_email_btn" value="Verify Email" />
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

  <?php

        }else{
          // echo "<script> window.location.replace('./logout/index.php');</script>";
          header("location: ./logout/index.php");

        }
      }
    }
    else{
      // echo "<script> window.location.replace('./logout/index.php');</script>";
      header("location: ./logout/index.php");

    }
  }else{
    // echo "<script> window.location.replace('./logout/index.php');</script>";
       // header("location: /udyamisahayak/index.php");
       header("location: ./logout/index.php");

  }




  ?>




<?php
} ?>