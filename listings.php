<?php
include "validation_of_session.php";
$sub_category_id = $_GET['sub_category_id'];
$category_id = $_GET['category_id'];

?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/listings_list_full_width.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:21:13 GMT -->

<head>

  <meta name="author" content="">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lisings </title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="images/favicon.png">
  <!-- Style CSS -->
  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/mmenu.css">
  <link rel="stylesheet" href="css/style.css" id="colors">

  <!-- Bootstrap CSS -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css">
  <style>
    #overlay_for_login {
      position: fixed;
      display: none;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
      cursor: pointer;
    }

    .overlay_for_login {
      position: fixed;
      display: none;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 999999990;
      cursor: pointer;
    }

    .overlay_box_for_login {
      position: fixed;
      display: none;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 9999990;
      cursor: pointer;
    }
  </style>
</head>

<body>


<?php if (isset($_SERVER['HTTP_CLIENT_IP']))
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



  if (isset($_SESSION['enquery_id'])) {
    // echo"<h1>enquery_id set</h1>";

  } else {
    if (isset($_SESSION['user_id'])) {

      if (('' != $_SESSION['user_id']) && isset($_SESSION['user_email'])) {
        $_SESSION['enquery_first_name']  = $_SESSION['user_first_name'];
        $_SESSION['enquery_last_name']  = $_SESSION['user_last_name'];
        $_SESSION['enquery_id']  = $_SESSION['user_id'];
        $_SESSION['enquery_email']  = $_SESSION['user_email'];
        $_SESSION['enquery_phone']  = $_SESSION['user_phone'];
        // echo"<h1>enquery_id not set</h1>";
      }
    } else {
      // echo"<h1>user_id not set</h1>";

      $select_enquery_listing_query = "SELECT * FROM enquery ";
      try {
        $select_enquery_listing_result = mysqli_query($connect, $select_enquery_listing_query);
      } catch (Exception $e) {
        // echo "Data insertion failed " . "<br>";
        // echo 'Message: ' . $e->getMessage() . "<br>";
      }
      // echo $select_enquery_listing_query;
      if ($select_enquery_listing_result) {
        $num_for_enquery_listing = mysqli_num_rows($select_enquery_listing_result);
      }
      if ($num_for_enquery_listing > 0) {
        while ($row_for_enquery_listing = mysqli_fetch_assoc($select_enquery_listing_result)) {
          $listing_enquery_ipaddress  = $row_for_enquery_listing['enquery_mac_address'];

          $listing_enquery_email  = $row_for_enquery_listing['enquery_email'];


          if (($ipaddress == $listing_enquery_ipaddress)) {
            $_SESSION['enquery_first_name']  = $row_for_enquery_listing['enquery_first_name'];
            $_SESSION['enquery_last_name']  = $row_for_enquery_listing['enquery_last_name'];
            $_SESSION['enquery_id']  = $row_for_enquery_listing['enquery_id'];
            $_SESSION['enquery_email']  = $row_for_enquery_listing['enquery_email'];
            $_SESSION['enquery_phone']  = $row_for_enquery_listing['enquery_phone'];
          } else {
          }
        }
      }
    }
  }


  ?>

  <!-- Preloader Start -->
  <div class="preloader">
    <div class="utf-preloader">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <!-- Preloader End -->

  <!-- Wrapper -->
  <div id="main_wrapper">
    <?php include "./header/global_header.php"; ?>

    <div class="clearfix"></div>


    <div id="titlebar" class="gradient margin-bottom-0">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>Lisings </h2>
            <nav id="breadcrumbs">
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="sub_category.php?sub_category=<?= $sub_category ?>">Sub Category</a></li>
                <li>Lisings </li>
                <!-- <li> -->
                <?php
                // echo "<pre>";
                // var_dump($_SESSION);
                // echo "<pre>";
                ?>
                <!-- </li> -->
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <?php include "./component/searchbar.php"; ?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class=" margin-top-30">

          </div>
          <div class="col-md-12">
            <div class="row">
              <?php


              $num_for_listing = 0;
              $select_listing_query = "SELECT * FROM listing left join sub_category on listing.listing_business_sub_category_id = sub_category.sub_category_id left join category on listing.listing_business_category_id = category.category_id where listing.listing_permission LIKE 'Approved' and sub_category.sub_category_id like  $sub_category_id and category.category_id like  $category_id ORDER BY `listing`.`listing_timestamp` DESC ";
              try {
                $select_listing_result = mysqli_query($connect, $select_listing_query);
              } catch (Exception $e) {
                // echo "Data insertion failed " . "<br>";
                // echo 'Message: ' . $e->getMessage() . "<br>";
              }
              // echo $select_listing_query;
              if ($select_listing_result) {
                $num_for_listing = mysqli_num_rows($select_listing_result);
              }
              if ($num_for_listing > 0) {
                $category_id_for_label = '';

                while ($row_for_listing = mysqli_fetch_assoc($select_listing_result)) {
                  $show_listing_details= false;
                  $listing_id  = $row_for_listing['listing_id'];
                  $listing_firm_name  = $row_for_listing['listing_firm_name'];

                  $select_enquery_listing_query = "SELECT * FROM enquery where enquery_listing_id = $listing_id and enquery_mac_address = '$ipaddress' ";
                  try {
                    $select_enquery_listing_result = mysqli_query($connect, $select_enquery_listing_query);
                  } catch (Exception $e) {
                    // echo "Data insertion failed " . "<br>";
                    // echo 'Message: ' . $e->getMessage() . "<br>";
                  }
                  // echo $select_enquery_listing_query;
                  if ($select_enquery_listing_result) {
                    $num_for_enquery_listing = mysqli_num_rows($select_enquery_listing_result);
                  }
                  if ($num_for_enquery_listing > 0) {
                    while ($row_for_enquery_listing = mysqli_fetch_assoc($select_enquery_listing_result)) {
                      $listing_enquery_ipaddress  = $row_for_enquery_listing['enquery_mac_address'];
                      $listing_enquery_email  = $row_for_enquery_listing['enquery_email'];
                      $show_listing_details =true;
                    }
                  }

                  if ($category_id_for_label != $row_for_listing['listing_business_category_id']) {
                    $category_id_for_label = $row_for_listing['listing_business_category_id'];


            ?>
                    <div style="width:100%;background-color:#ffd2d2;" class="tableItem dashboard_notifi_item ">
                      <div class="bg-c1 ">
                        <img src='./images/<?= $row_for_listing['category_image'] ?>' style="max-height:32px;width:auto;"></img>
                        <h5>Category : <b><?= $row_for_listing['category_name'] ?></b> </h5>
                      </div>

                    </div>
                    <?php
                    ?>

                  <?php
                  }
              ?>

                  <div class="utf_listing_item-container list-layout">
                    <a class="utf_listing_item">
                      <!-- <a href="listing_details.php?listing_id=" class="utf_listing_item"> -->
                      <div class="utf_listing_item-image">
                        <img src="images/<?= $row_for_listing['listing_image'] ?>" alt="">
                        <!-- <span class="like-icon"></span> -->
                        <!-- <span class="tag"><i class="im im-icon-Hotel"></i> Hotels</span> -->
                        <div class="utf_listing_prige_block utf_half_list">
                          <span class="utf_meta_listing_price"><i class="fa fa-tag"></i>

                            <?php
                            if (isset($row_for_listing['listing_cost'])) {
                              if ($row_for_listing['listing_cost'] == "") {
                              } else {
                            ?>
                                <?php if ((isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))&& $show_listing_details) {
                                  echo $row_for_listing['listing_cost'];
                                } else {
                                  echo substr($row_for_listing['listing_cost'], 0, -3) . 'XXX';
                                ?>

                                <?php }
                                ?>


                          </span>
                      <?php
                              }
                            }
                      ?>


                        </div>
                      </div>
                      <!-- <span class="utf_open_now">Open Now</span> -->
                      <div class="utf_listing_item_content">
                        <div class="" style="color:black">
                          <li class=" dashboard_notifi_item ">
                            <!-- <div class="bg-c1 ">
                              <i class="fa fa-clock-o" style="background-color:#e8e800;"></i>
                              
                            </div> -->
                            <div class="content utf_message_headline_item utf_message_headline_text" style="display:flex;flex-direction: column;margin:auto;margin-left:0px;">

                              <h3 style="color:"><?= $row_for_listing['listing_business_name'] ?></h3>





                              <?php
                              if (isset($row_for_listing['listing_firm_name'])) {
                                if ($row_for_listing['listing_firm_name'] == "") {
                                } else {
                              ?>
                                  <span style="margin:0px;" <?php if ((isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))&& $show_listing_details) {
                                                            } else {
                                                            ?> onclick="show_enquery_popup();" <?php }
                                                                                                ?>><i class="fa fa-building"></i>Company Name :
                                    <?php if ((isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))&& $show_listing_details) {
                                      echo $row_for_listing['listing_firm_name'];
                                    } else {
                                      echo substr($row_for_listing['listing_firm_name'], 0, -4) . 'XXXX';
                                    }
                                    ?>

                                  </span>
                              <?php
                                }
                              } ?>
                              <?php
                              if (isset($row_for_listing['listing_location'])) {
                                if ($row_for_listing['listing_location'] == "") {
                                } else {
                              ?>
                                  <span style="margin:0px;" <?php if ((isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))&& $show_listing_details) {
                                                            } else {
                                                            ?> onclick="show_enquery_popup();" <?php }
                                                                                                ?>><i class="fa fa-map-marker"></i>Location :
                                    <?php if ((isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))&& $show_listing_details) {
                                      echo $row_for_listing['listing_location'];
                                    } else {
                                      echo substr($row_for_listing['listing_location'], 0, -4) . 'XXXX';
                                    }
                                    ?>

                                  </span>
                              <?php
                                }
                              } ?>
                              <?php
                              if (isset($row_for_listing['listing_phone'])) {
                                if ($row_for_listing['listing_phone'] == "") {
                                } else {
                              ?>
                                  <span style="margin:0px;" <?php if ((isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))&& $show_listing_details) {
                                                            } else {
                                                            ?> onclick="show_enquery_popup();" <?php }
                                                                                                ?>><i class="fa fa-phone"></i>Phone No.: (+91)
                                    <?php if ((isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))&& $show_listing_details) {
                                      echo $row_for_listing['listing_phone'];
                                    } else {
                                      echo substr($row_for_listing['listing_phone'], 0, -4) . 'XXXX';
                                    }
                                    ?>

                                  </span>
                              <?php
                                }
                              } ?>
                              <?php
                              if (isset($row_for_listing['listing_email'])) {
                                if ($row_for_listing['listing_email'] == "") {
                                } else {
                              ?>
                                  <span style="margin:0px;" <?php if ((isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))&& $show_listing_details) {
                                                            } else {
                                                            ?> onclick="show_enquery_popup();" <?php }
                                                                                                ?>><i class="fa fa-link"></i>Email :
                                    <?php if ((isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))&& $show_listing_details) {
                                      echo $row_for_listing['listing_email'];
                                    } else {
                                      echo substr($row_for_listing['listing_email'], 0, -14) . 'XXXX@gmail.com';
                                    }
                                    ?>

                                  </span>
                              <?php
                                }
                              } ?>

                             
                              <span style="margin:0px;"><i class="fa fa-book"></i>Category : <?= $row_for_listing['category_name'] ?></span>
                              <span style="margin:0px;"><i class="fa fa-list"></i>Sub Category : <?= $row_for_listing['sub_category_name'] ?></span>

                          
                              <!-- <div class="utf_star_rating_section" data-rating="4.5">
                            <div class="utf_counter_star_rating">(4.5)</div>
                          </div> -->
                              <p>Discription : <?= $row_for_listing['listing_description'] ?></p>

                            </div>
                            <div class="bg-c1 ">
                            <?php if(!$show_listing_details){
?> 
 <button class="button border sign-in " <?php if (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id'])){}else { ?> onclick="show_enquery_popup();" <?php }
                                                                                                                                                                                    if (!$show_listing_details) {
                                                                                                                                                                                      ?> onclick="update_enquery(<?= $listing_id ?>)" <?php
                                                                                                                                                                                                                                                            } ?>                  style="margin-bottom:29px;"><?php if (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id'])){?>  View Details  <?php }else { ?>Enquery Now <?php } ?></button>
<?php

                                }?>
                            </div>
                          </li>

                        </div>
                      </div>
                    </a>
                  </div>




                  <script type="text/javascript">

                  </script>




                <?php
                }
              } else {
                ?>
                <div class="utf_listing_item-container list-layout">
                  <a href="#" class="utf_listing_item">
                    <div class="utf_listing_item_content">
                      <div class="utf_listing_item-inner">
                        <h3>No Listing Found</h3>
                      </div>
                    </div>
                  </a>
                </div>
              <?php
              }

              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include "subscribe_newslatter.php"; ?>

    <!-- Footer -->
    <div id="footer" class="footer_sticky_part">
      <div class="container">
        <div class="row">
          <?php include "./component/footer.php"; ?>
        </div>
      </div>
    </div>
    <div id="bottom_backto_top"><a href="#"></a></div>
  </div>

  <div id="overlay_for_enquery" class="overlay_for_login" style="display:none;height: 100%;overflow: auto;position: fixed; padding-bottom:100px !important;">
    <div class="container my-3 py-5  " id="enquery_form_box" style="padding-bottom:20px;padding-top:20px;margin-top:20px;">
      <div onclick="hide_enquery_popup()"><span style="    padding: 15px; padding-top: 7px; padding-bottom: 8px;font-size:20px; background-color:white; border-radius: 25px;line-height:0px;" class=" circle">x</span> </div>
      <div id="main" class=" justify-center ">
        <div class="col-lg-12">
          <div class=" mb-4" style="margin-bottom:20px;">
            <div class="card-body" style="background-color:#e0e0e0 !important; border-radius:8px ;box-shadow: 1px 1px 20px #000000;">
              <div class="jumbotron py-1" style="padding-top: 10px;margin-top:20px;margin-bottom:20px;border-radius:8px;background-color: gold linear-gradient(to bottom, lightyellow, gold);">
                <div class=" my-4 mx-5" style="margin-top:20px;margin-bottom:20px;margin-right:20px;margin-left:20px;">

                  <div style="display:flex;">
                    <div style="display:inline-block;margin-right:auto">
                      <h1 class=" my-auto mr-auto d-inline">Fill Details </h1>
                    </div>
                    <div style="display:inline-block;margin-left:auto">
                      <h3 style="color:#000000">𝕌𝕕𝕪𝕒𝕞𝕚𝕊𝕒𝕙𝕒𝕪𝕒𝕜</h3>
                    </div>
                  </div>
                  <hr class="my-3" style="margin-top:20px;margin-bottom:20px;">
                  <div class="social-login-v2 login-register">
                    <form id="enquery_form" method="POST" class="text-center">

                      <div class="form-group">
                        <div class="inner-addon left-addon">
                          <label class="" style="float:left" for="enquery_first_name">First Name</label> <input type="text" name="enquery_first_name" id="enquery_first_name" class="form-control form-control-md sharp-edge" placeholder="Enter First name" data-error="First name required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--enquery_first_name-->

                      <div class="form-group">
                        <div class="inner-addon left-addon">
                          <label class="" style="float:left" for="enquery_last_name">Last Name</label> <input type="text" name="enquery_last_name" id="enquery_last_name" class="form-control form-control-md sharp-edge" placeholder="Enter Last name" data-error="Last name required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--enquery_last_name-->



                      <div class="form-group">
                        <div class="inner-addon left-addon">
                          <label class="" style="float:left" for="enquery_email">Email</label> <?php echo "<span style='color:red;' id='label_for_email_validation'></span>"; ?> <input type="email" name="enquery_email" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" id="enquery_email" class="form-control form-control-md sharp-edge" placeholder="Enter email address" data-error="Email required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--Email Address-->



                      <div class="form-group">
                        <div class="inner-addon left-addon">
                          <label class="" style="float:left" for="enquery_phone">Phone no.</label> <?php echo "<span style='color:red;' id='label_for_phone_validation'></span>"; ?><input type="tel" pattern="[0-9]{10}" name="enquery_phone" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" id="enquery_phone" class="form-control form-control-md sharp-edge" placeholder="Enter 10 digit Phone no." data-error="Phone required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--Phone no.-->
                      <!-- <div class="form-group">
                            <div class="checkbox">
                              <input type="checkbox" id="agree" data-error="You must agree to our Terms and Conditions" required>
                              <label for="agree">Agree to <a href="#" target="_blank">Terms &amp; Conditions</a></label>
                              <div class="left-side help-block with-errors"></div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="checkbox">
                              <label>Already have an account? <a href="../login/index.php">Login here</a></label>
                              <div class="left-side help-block with-errors"></div>
                            </div>
                          </div> -->
                      <!-- <div class="form-group" style="float:left;">
                            <div class="checkbox">
                              <label> <a onclick="show_login_popup();">Login Now</a></label>
                              <div class="left-side help-block with-errors"></div>
                            </div>
                          </div> -->
                      <!-- <div class="form-group" style="float:right;">
                            <div class="checkbox">

                              <label> <a href="../login/index.php">View More Option</a></label>
                              <div class="left-side help-block with-errors"></div>
                            </div>
                          </div> -->
                      <div class="form-group mt-5" style="margin-top:20px;padding-bottom:20px;">

                        <input type="hidden" name="enquery_form_value" value="true" id="enquery_form_value" />
                        <input type="hidden" name="enquery_listing_id" value="<?= $listing_id ?>" id="enquery_listing_id" />
                        <button class="btn btn-primary button border sign-in " id="enquery_submit_btn" name="op_classiera" type="submit">Submit</button>
                      </div><!--register button-->
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- </div> -->
      </div>
    </div>

  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Scripts -->
  <script src="scripts/jquery-3.4.1.min.js"></script>
  <script src="scripts/chosen.min.js"></script>
  <script src="scripts/slick.min.js"></script>
  <script src="scripts/rangeslider.min.js"></script>
  <script src="scripts/bootstrap-select.min.js"></script>
  <script src="scripts/magnific-popup.min.js"></script>
  <script src="scripts/jquery-ui.min.js"></script>
  <script src="scripts/mmenu.js"></script>
  <script src="scripts/tooltips.min.js"></script>
  <script src="scripts/jquery_custom.js"></script>

  <!-- Maps -->
  <script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
  <script src="scripts/infobox.min.js"></script>
  <script src="scripts/markerclusterer.js"></script>
  <script src="scripts/maps.js"></script>

  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> -->

  <script type="text/javascript">
    function update_enquery(listing_id) {
      console.log("hello");
      // show_enquery_popup();
      // console.log(listing_owner_id+" - listing_owner_id\n"+listing_id+" - listing_id\n"+user_id+" - user_id\n"+type+" - type\n"+way+" - way\n");
      <?php
      if (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id'])) {

      ?>
        $.ajax({
          url: "update_enquery.php",
          type: "POST",
          data: {
            listing_id: listing_id,

          },
          success: function(result) {
            // console.log("success");
            console.log(result);
            // result = JSON.parse(result);
            // if (result.type == 'like') {
            //     $('#comment_like_' + comment_id).html(result.like_count);
            //     $('#comment_btn_like_' + comment_id).attr("src", "/forum/data/thumbs-up-like.svg");
            // }
            if (result.includes("Success")) {
              location.reload();
            }
            // data = result;
            // callback(data);
          },
          error: function() {
            console.log("return error");
          }
        });
        // return data;
      <?php
      } else {
      ?>

        show_enquery_popup();
      <?php
      }
      ?>


    }

    function update_view_interaction(listing_id) {
      console.log("hello");
      // show_enquery_popup();
      // console.log(listing_owner_id+" - listing_owner_id\n"+listing_id+" - listing_id\n"+user_id+" - user_id\n"+type+" - type\n"+way+" - way\n");
      <?php if (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id'])) {


      ?>
        $.ajax({
          url: "update_interaction.php",
          type: "POST",
          data: {
            listing_id: listing_id,
          },
          success: function(result) {
            // console.log("success");
            console.log(result);
            // result = JSON.parse(result);
            // if (result.type == 'like') {
            //     $('#comment_like_' + comment_id).html(result.like_count);
            //     $('#comment_btn_like_' + comment_id).attr("src", "/forum/data/thumbs-up-like.svg");
            // }

            // data = result;
            // callback(data);
          },
          error: function() {
            console.log("return error");
          }
        });
        // return data;
      <?php
      } else {
      ?>

        show_enquery_popup();
      <?php
      }
      ?>


    }
    //##### Add record when Add Record Button is click #########
    $(document).ready(function() {


      // show_registration_popup();
      // ##### Add record when Add Record Button is click #########
      $("#contactForm").submit(function(e) {
        e.preventDefault();
        // alert("hello")
        // var subject = $("#subject").val(); //build a post data structure
        // var message = $("#msg").val(); //build a post data structure       
        var target_listing_id = $("#message_target_listing_id").val(); //build a post data structure       
        var target_user_id = <?= $listing_id ?>;

        jQuery.ajax({
          type: "POST", // Post / Get method
          url: "send_message.php", //Where form data is sent on submission
          dataType: "text", // Data type, HTML, json etc.
          data: {
            message: '',
            subject: '',
            target_user_id: target_user_id,
            target_listing_id: target_listing_id,
          }, //Form variables
          success: function(response) {
            if (response.includes("success")) {

              alert("Message Sent Successfully!");
            }
            if (response.includes("failed")) {
              // alert("Message Sending Failed!");
              show_enquery_popup();

            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
            // alert(xhr);
            // alert(ajaxOptions);
            // alert(thrownError);
          }
        });
      });

      $("#enquery_form").submit(function(e) {
        e.preventDefault();
        // alert("hello")
        var enquery_first_name = $("#enquery_first_name").val(); //build a post data structure
        var enquery_last_name = $("#enquery_last_name").val(); //build a post data structure
        var enquery_phone = $("#enquery_phone").val(); //build a post data structure
        var enquery_email = $("#enquery_email").val(); //build a post data structure
        var enquery_form_value = $("#enquery_form_value").val(); //build a post data structure
        var enquery_listing_id = $("#enquery_listing_id").val(); //build a post data structure

        jQuery.ajax({
          type: "POST", // Post / Get method
          url: "response.php", //Where form data is sent on submission
          dataType: "text", // Data type, HTML, json etc.
          data: {
            enquery_first_name: enquery_first_name,
            enquery_last_name: enquery_last_name,
            enquery_phone: enquery_phone,
            enquery_email: enquery_email,
            enquery_listing_id: enquery_listing_id,
            enquery_form_value: enquery_form_value,
          }, //Form variables
          success: function(response) {
            // // $("#responds").append(response);
            console.log(typeof(response));
            console.log(response);
            // console.log(response.includes("success"))  
            if (response.includes("success")) {
              // $("#contactForm").submit();
              alert("Enquery Sent Successfully!");
              location.reload();
            }
            if (response.includes("failed")) {
              alert("Enquery Sending Failed!");
              // show_enquery_popup();

            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
            // alert(xhr);
            // alert(ajaxOptions);
            // alert(thrownError);
          }
        });
      });




      // $("#report_form").submit(function(e) {
      //   e.preventDefault();
      //   alert("hello")
      //   var report_ad_val = $("#report_ad_val").val(); //build a post data structure
      //   var enquery_last_name = $("#enquery_last_name").val(); //build a post data structure
      //   var enquery_phone = $("#enquery_phone").val(); //build a post data structure
      //   var enquery_email = $("#enquery_email").val(); //build a post data structure
      //   var enquery_form_value = $("#enquery_form_value").val(); //build a post data structure
      //   var enquery_listing_id = $("#enquery_listing_id").val(); //build a post data structure

      //   jQuery.ajax({
      //     type: "POST", // Post / Get method
      //     url: "response.php", //Where form data is sent on submission
      //     dataType: "text", // Data type, HTML, json etc.
      //     data: {
      //       enquery_first_name: enquery_first_name,
      //       enquery_last_name: enquery_last_name,
      //       enquery_phone: enquery_phone,
      //       enquery_email: enquery_email,
      //       enquery_listing_id: enquery_listing_id,
      //       enquery_form_value: enquery_form_value,
      //     }, //Form variables
      //     success: function(response) {
      //       // // $("#responds").append(response);
      //       // console.log(typeof(response));
      //       // console.log(response.includes("success"))  
      //       if (response.includes("success")) {

      //         alert("Message Sent Successfully!");
      //       }
      //       if (response.includes("failed")) {
      //         alert("Message Sending Failed!");
      //         // show_enquery_popup();

      //       }
      //     },
      //     error: function(xhr, ajaxOptions, thrownError) {
      //       // alert(xhr);
      //       // alert(ajaxOptions);
      //       // alert(thrownError);
      //     }
      //   });
      // });

    });


    // function show_registration_popup() {
    //   hide_login_popup();
    //   hide_enquery_popup();

    //   document.getElementById("overlay_for_registration").style.display = "block";
    // }

    // function hide_registration_popup() {
    //   document.getElementById("overlay_for_registration").style.display = "none";
    // }

    // function show_login_popup() {
    //   hide_registration_popup();
    //   hide_enquery_popup();
    //   document.getElementById("overlay_for_login").style.display = "block";
    // }

    // function hide_login_popup() {
    //   document.getElementById("overlay_for_login").style.display = "none";
    // }







    // function show_registration_popup() {
    //   document.getElementById("overlay_for_login").style.display = "block";
    // }

    // function hide_registration_popup() {
    //   document.getElementById("overlay_for_login").style.display = "none";
    // }

    function show_enquery_popup() {
      // hide_registration_popup();
      // hide_login_popup();
      // alert('heloo');
      document.getElementById("overlay_for_enquery").style.display = "block";
    }

    function hide_enquery_popup() {
      document.getElementById("overlay_for_enquery").style.display = "none";
    }
  </script>
  <script>
    function validation_for_email_username_phone() {
      var email = document.getElementById("enquery_email");
      email = email.value;
      var phone = document.getElementById("enquery_phone");
      phone = phone.value;
      $.ajax({
        url: "./service/validation_for_email_username_phone.php",
        datatype: "JSON",
        type: "POST",
        data: {
          submit: "submit",
          email: email,
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
            document.getElementById("enquery_submit_btn").disabled = true;
          } else {
            document.getElementById("enquery_submit_btn").disabled = false;
          }
        }
      });
    }
  </script>
  <script>
    // $(document).ready(function() {
    //   update_view_interaction(listing_id);
    // });
  </script>
</body>

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/listings_list_full_width.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:21:13 GMT -->

</html>