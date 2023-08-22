<?php

//index.php

//Include Configuration File
include('./php_mailer_config/config.php');

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {

  include "./service/db.php";
  include "./service/filter_input.php";

  if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['reset_password'])) {

    $new_password = filter($_POST["new_password"]);
    $user_id =  filter($_SESSION['user_id']);
    $user_email =  filter($_SESSION['user_email']);
    // $user_type =  filter($_SESSION['user_type']);

    require "./login/reset_notification_shooting.php";

    $hash = password_hash($new_password, PASSWORD_DEFAULT);
    $insert_query = "UPDATE `users_entries` SET `user_password` = '$hash' WHERE `users_entries`.`user_id` = $user_id";
    try {
      $insert_result = mysqli_query($connect, $insert_query);

      if ($insert_result) {
        // echo "Data insertion" . "<br>";

        $store = send_mail($user_email);
        if ($store) {
          // echo ("<br> email shooting successfull <br>");

          echo ("<script> alert('Password Reset Successfully') </script>");
          echo "<script> window.location.replace('./logout/index.php');</script>";

          // if ($user_type == 'admin') {
          //   echo "<script> window.location.replace('./admin_panel/index.php');</script>";
          // }

          // if ($user_type == 'user') {
          //   echo "<script> window.location.replace('./user_panel/dashboard.php');</script>";
          // }
          // if ($user_type == 'buyer') {
          //   echo "<script> window.location.replace('.buyer_panel/dashboard.php');</script>";
          // }
        } else {
          // echo ("<br> email shooting failed <br>");
        }
      }
    } catch (Exception $e) {
      // echo "Data insertion failed " . "<br>";
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
    <title>Login - UdyamiSahayak</title>

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


      <div id="" class="zoom-anim-dialog  container" style="background-color:#fafafa;">
        <div class="small_dialog_header">
          <h3>Reset Your Password</h3>
        </div>
        <?php echo "<h4 style='color:red;' id='label_for_password_validation'></h4>"; ?>

        <div class="utf_signin_form style_three">
          <div class="tab_container alt ">
            <div class="tab_content" id="tab1">
              <form enctype="multipart/form-data" method="post" class="login">

                <p class="utf_row_form utf_form_wide_block">
                  <label for="new_password">Enter New Password : <span class="text-danger">*</span></label>

                  <label for="new_password">
                    <input class="input-text" type="text" id="new_password" onchange="validation_for_password()" onload="validation_for_password()" name="new_password" placeholder="Enter New Password" required />
                  </label>
                </p>
                <p class="utf_row_form utf_form_wide_block">
                  <label for="c_password">Confirm Password : <span class="text-danger">*</span></label>

                  <label for="c_password">
                    <input class="input-text" type="text" id="c_password" onchange="validation_for_password()" onload="validation_for_password()" name="c_password" placeholder="Confirm Password" required />
                  </label>
                </p>


                <div class="utf_row_form">

                  <input type="hidden" id="reset_password" name="reset_password" value="reset_password" />
                  <input type="submit" id="reset_password_btn" class="button border margin-top-5" name="login" value="Reset Password" />
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


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>


    <script>
      function validation_for_password() {
        var password = document.getElementById("new_password");
        password = password.value;
        var c_password = document.getElementById("c_password");
        c_password = c_password.value;
        if (password != c_password) {
          $('#label_for_password_validation').html("Confirm Password Do not match.");
          document.getElementById("reset_password_btn").disabled = true;
        } else {
          $('#label_for_password_validation').html("");
          document.getElementById("reset_password_btn").disabled = false;
        }
        if ((password == "")) {
          $('#label_for_password_validation').html("Password cannot be Empty");
          document.getElementById("reset_password_btn").disabled = true;
        }

      }
    </script>

  </body>


  </html>
<?php
}else{
  // echo "<script> window.location.replace('./logout/index.php');</script>";
  header("location: ./logout/index.php");

}

?>