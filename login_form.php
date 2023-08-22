<div id="main_wrapper" >
    <?php include "./header/global_header.php"; ?>

    <div class="clearfix"></div>

    <div id="" class="zoom-anim-dialog  container"  style="background-color:#fafafa;" >
      <div class="small_dialog_header">
        <h3>Login In</h3>
      </div>
      <div class="utf_signin_form style_three">
        <div class="tab_container alt ">
          <div class="tab_content" id="tab1">
            <form enctype="multipart/form-data" method="post" class="login">
              <p class="utf_row_form utf_form_wide_block">
                <label for="login_username">
                  <input type="text" class="input-text" name="login_username" id="login_username" value="" placeholder="Username" />
                </label>
              </p>
              <p class="utf_row_form utf_form_wide_block">
                <label for="login_password">
                  <input class="input-text" type="password" name="login_password" id="login_password" placeholder="Password" />
                </label>
              </p>
              <div class="utf_row_form utf_form_wide_block form_forgot_part"> <span class="lost_password fl_left"> <a href="forget_password.php">Forgot Password?</a> </span>
                <div class="checkboxes fl_right">
                  <span class=""> <a href="register.php">Don’t have an account? Create one here.</a> </span>
                </div>
              </div>
              <div class="utf_row_form">
                <input type="hidden" class="button border margin-top-5" name="submit_login" id="submit_login" value="submit_login" />
                <input type="submit" class="button border margin-top-5" name="login" value="Login" />
              </div>
              <div class="utf-login_with my-3">
                <span class="txt">Or Login in With Google Account</span>
              </div>
              <div class="row">
                <!-- <div class="col-md-6 col-6">
                  <a href="javascript:void(0);" class="social_bt facebook_btn mb-0"><i class="fa fa-facebook"></i> Facebook</a>
                </div> -->
                <div class="col-md-12 col-12">
                  <a href="<?php echo $google_client->createAuthUrl(); ?>" class="social_bt google_btn mb-0"><i class="fa fa-google"></i> Google</a>
                </div>
              </div>
            </form>
          </div>


        </div>
      </div>
    </div>
  </div>