<?php include "validation_of_session.php" ?>
<!DOCTYPE html>

<html lang="zxx">

<head>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UdyamiSahayak</title>

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





  <!-- <link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>  -->

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
    /* .hCathd:hover {
      color:#ff2222;
    } */
  </style>


  <!-- Wrapper -->
  <div id="main_wrapper">
    <?php include "./header/global_header.php"; ?>

    <div class="clearfix"></div>
    <script>
      document.getElementById("navbar_tab_home").classList.add("current");
    </script>




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

      // $(document).ready(function() {

      //   //##### Add record when Add Record Button is click #########
      //   $("#tab2").submit(function(e) {
      //     e.preventDefault();

      //     var register_username = $("#register_username").val(); //build a post data structure
      //     var register_email = $("#register_email").val(); //build a post data structure
      //     var register_first_name = $("#register_first_name").val(); //build a post data structure
      //     var register_last_name = $("#register_last_name").val(); //build a post data structure
      //     var register_value = $("#register_value").val(); //build a post data structure

      //     // console.log(register_value);
      //     // console.log(register_last_name);
      //     // console.log(register_first_name);
      //     // console.log(register_email);
      //     // console.log(register_username);
      //     jQuery.ajax({
      //       type: "POST", // Post / Get method
      //       url: "response.php", //Where form data is sent on submission
      //       dataType: "text", // Data type, HTML, json etc.
      //       data: {
      //         register_username: register_username,
      //         register_email: register_email,
      //         register_first_name: register_first_name,
      //         register_last_name: register_last_name,
      //         register_value: register_value
      //       }, //Form variables
      //       success: function(response) {

      //         console.log(response);
      //         alert(
      //           'Registration DONE Successfully\n\n' +
      //           "Eamil has been sent successfully, check your email for further process.\n"
      //         );
      //       },

      //       error: function(xhr, ajaxOptions, thrownError) {
      //         alert(thrownError);
      //       }
      //     });
      //   });

      // });
    </script>




    <div class="search_container_block home_main_search_part main_search_block search_container_classic_block" data-background-image="images/city_search_background.jpg">
      <div class="main_inner_search_block">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2>𝕌𝕕𝕪𝕒𝕞𝕚𝕊𝕒𝕙𝕒𝕪𝕒𝕜</h2>
              <h4>Welcome to UdyamiSahayak</h4>


              <?php include "./component/searchbar.php"; ?>



              <!-- <div class="main_popular_categories">
                <h3>Or Browse Popular Categories</h3>
                <ul class="main_popular_categories_list">


                  <?php
                  $select_category_query = "SELECT * FROM `category` ORDER BY category_since DESC";
                  try {
                    $select_category_result = 0;
                    if ($connect) {
                      $select_category_result = mysqli_query($connect, $select_category_query);
                      if ($select_category_result) {
                        $category_num = mysqli_num_rows($select_category_result);
                      }
                    }
                  } catch (Exception $e) {
                    $mess = $e->getMessage();
                  }

                  if ($category_num > 0) {
                    $sno = 0;
                    while ($row = mysqli_fetch_assoc($select_category_result)) {
                  ?>

                      <li> <a href="sub_category.php?category_id=<?php echo $row["category_id"]; ?>">
                          <div class="utf_box"> <img src="./images/<?= $row['category_image'] ?>" style="max-width:26px;max-height:26px;">
                            <p><?= $row['category_name'] ?></p>
                          </div>
                        </a>
                      </li>
                  <?php }
                  }

                  ?>

                </ul>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <marquee class="sampleMarquee" direction="left" scrollamount="10" behavior="scroll"> Latest News </marquee>


    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="headline_part centered margin-top-75"> Most Popular Categories<span>Browse the most desirable categories</span></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="container_categories_box margin-top-5 margin-bottom-30">

            <?php
            $select_category_query = "SELECT * FROM `category` ORDER BY category_since DESC"; //NOTE: here (`) is not equal to (')
            try {
              $select_category_result = 0;
              if ($connect) {
                $select_category_result = mysqli_query($connect, $select_category_query);
                if ($select_category_result) {
                  $category_num = mysqli_num_rows($select_category_result);
                }
              }
            } catch (Exception $e) {
              $mess = $e->getMessage();
            }

            if ($category_num > 0) {
              $sno = 0;
              //Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
              while ($row = mysqli_fetch_assoc($select_category_result)) {
                $select_listing_count_query = "SELECT * FROM `listing` where listing_permission LIKE 'Approved' and listing_business_category_id = " . $row["category_id"]; //NOTE: here (`) is not equal to (')
                try {
                  $select_listing_count_result = 0;
                  if ($connect) {
                    $select_listing_count_result = mysqli_query($connect, $select_listing_count_query);
                    if ($select_listing_count_result) {
                      $num_for_listing_count = mysqli_num_rows($select_listing_count_result);
                    }
                  }
                } catch (Exception $e) {
                  $mess = $e->getMessage();
                }
                if ($num_for_listing_count > 0) {
            ?>
                  <a href="sub_category.php?category_id=<?php echo $row["category_id"]; ?>" class="utf_category_small_box_part"> <img src="./images/<?= $row['category_image'] ?>" class="im" style="max-width:26px;max-height:26px;margin:auto">
                    <h4><?= $row['category_name'] ?></h4>
                    <span><?= $num_for_listing_count ?></span>
                  </a>

            <?php }
              }
            }

            ?>


            <!-- <a href="sub_category.php?category_id=" class="utf_category_small_box_part"> <i class="im im-icon-Home-2"></i>
              <h4>Material and Spares Information
              </h4>
              <span>14</span>
            </a>
         -->
          </div>
          <div class="col-md-12 centered_content"> <a href="#" class="button border margin-top-20">View More</a> </div>
        </div>
      </div>
    </div>

    <section class="fullwidth_block margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f9f9f9">
      <div class="container">
        <div class="row slick_carousel_slider">
          <div class="col-md-12">
            <h3 class="headline_part centered margin-bottom-45"> Latest Business News <span></span> </h3>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="simple_slick_carousel_block utf_dots_nav">
                <div class="utf_carousel_item"> <a href="listings_single_page_1.html" class="utf_listing_item-container compact">
                    <div class="utf_listing_item"> <img src="images/services.jpg" alt=""> <span class="tag"><i class="im im-icon-Jeep-2"> PROFESSIONAL SERVICES</i> </span>
                      <!-- <span class="featured_tag">Featured</span> -->
                      <span class="utf_open_now">Open Now</span>
                      <div class="utf_listing_item_content">
                        <div class="utf_listing_prige_block">
                          <span class="utf_meta_listing_price"><i class="fa fa-tag"></i>Industrial Services</span>
                          <!-- <span class="utp_approve_item"><i class="utf_approve_listing"></i></span> -->
                        </div>
                        <h3>This section gives information about services available to run your business efficiently.</h3>
                        <!-- <span><i class="fa fa-map-marker"></i> </span>
						<span><i class="fa fa-phone"></i> </span>											 -->
                      </div>
                    </div>
                    <!-- <div class="utf_star_rating_section" data-rating="4.5">
						<div class="utf_counter_star_rating">(4.5)</div>
						<span class="utf_view_count"><i class="fa fa-eye"></i> 822+</span>
						<span class="like-icon"></span>
					</div> -->
                  </a>
                </div>

                <div class="utf_carousel_item"> <a href="listings_single_page_1.html" class="utf_listing_item-container compact">
                    <div class="utf_listing_item"> <img src="images/Machines.jpg" alt=""> <span class="tag"><i class="im im-icon-Factory"></i>Agriculture and Food Processing</span>
                      <span class="utf_open_now">Open Now</span>
                      <div class="utf_listing_item_content">
                        <div class="utf_listing_prige_block">
                          <span class="utf_meta_listing_price"><i class="fa fa-tag"></i>Machines Industries</span>
                        </div>
                        <h3> Get details about machines and Equipments useful for Khadi & Village Industries.</h3>
                        <!-- <span><i class="fa fa-map-marker"></i></span>
						<span><i class="fa fa-phone"></i> </span>												 -->
                      </div>
                    </div>
                    <!-- <div class="utf_star_rating_section" data-rating="4.5">
						<div class="utf_counter_star_rating">(4.5)</div>
						<span class="utf_view_count"><i class="fa fa-eye"></i> 822+</span>
						<span class="like-icon"></span>
					</div> -->
                  </a>
                </div>

                <div class="utf_carousel_item"> <a href="listings_single_page_1.html" class="utf_listing_item-container compact">
                    <div class="utf_listing_item"> <img src="images/technologies.jpg" alt=""> <span class="tag"><i class="im im-icon-Control-2"></i>Khadi and Textile</span>
                      <span class="utf_open_now">Open Now</span>
                      <div class="utf_listing_item_content">
                        <div class="utf_listing_prige_block">
                          <span class="utf_meta_listing_price"><i class="fa fa-tag"></i>Technologies</span>
                        </div>
                        <h3>Browse through innovative technologies & processes developed by various Institutions</h3>
                        <!-- <span><i class="fa fa-map-marker"></i> The Ritz-Carlton, Hong Kong</span>
						<span><i class="fa fa-phone"></i> (+15) 124-796-3633</span>-->
                      </div>
                    </div>
                    <!-- <div class="utf_star_rating_section" data-rating="4.5">
						<div class="utf_counter_star_rating">(4.5)</div>
						<span class="utf_view_count"><i class="fa fa-eye"></i> 822+</span>
						<span class="like-icon"></span>
					</div> -->
                  </a>
                </div>

              </div>
            </div>

          </div>
        </div>

        </a>
      </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </section>


  <!-- NEW ADDED SECTION ***   section    products ********FOR MACHINE SECTION******* -->

  <?php
  $select_category_query = "SELECT * FROM `category` ORDER BY category_since DESC"; //NOTE: here (`) is not equal to (')
  try {
    $select_category_result = 0;
    if ($connect) {
      $select_category_result = mysqli_query($connect, $select_category_query);
      if ($select_category_result) {
        $category_num = mysqli_num_rows($select_category_result);
      }
    }
  } catch (Exception $e) {
    $mess = $e->getMessage();
  }

  if ($category_num > 0) {
    $sno = 0;
    //Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
    while ($row_for_category = mysqli_fetch_assoc($select_category_result)) {
      $category_name = $row_for_category['category_name'];
      $category_id = $row_for_category['category_id'];
      $show_banner_of_category = false;

  ?>

      <section class="products" id="banner_category_<?= $category_id ?>">
        <div class="container">
          <div class="product-sec-wrapper" style="border: 50px;">

            <div style="width:100%;background-color:#ffd2d2;" class="tableItem dashboard_notifi_item ">
              <div class="bg-c1 ">
                <img src='./images/<?= $row_for_category['category_image'] ?>' style="padding:5px;max-height:60px;width:auto;"></img>
                <h2><a class="hCathd" style="text-decoration:none;color:black;" href="sub_category.php?category_id=<?= $row_for_category["category_id"] ?>"> <?= $row_for_category["category_name"] ?> </a></h2>
              </div>

            </div>
            <!-- <div style="width:100%;background-color:#ffd2d2;" class="tableItem dashboard_notifi_item ">
                <div class="utf_row_form utf_form_wide_block form_forgot_part"> <span class="lost_password fl_left">  <a href="forget_password.php">Forgot Password?</a> </span>
                  <div class="checkboxes fl_right">
                    <span class=""> <a href="register.php">Don’t have an account? Create one here.</a> </span>
                  </div>
                </div>

            </div> -->




            <div class="minht cBFlex" id="1">


              <div class="row cBW100">
                <?php
                $num_for_sub_category = 0;
                $select_sub_category_query = "SELECT * FROM `sub_category` WHERE  sub_category_category_id = " . $row_for_category['category_id'] . " ORDER BY `sub_category`.`sub_category_timestamp` DESC";
                try {
                  $select_sub_category_result = mysqli_query($connect, $select_sub_category_query);
                } catch (Exception $e) {
                  // echo "Data insertion failed " . "<br>";
                  // echo 'Message: ' . $e->getMessage() . "<br>";
                }
                // echo $select_sub_category_query;
                if ($select_sub_category_result) {
                  $num_for_sub_category = mysqli_num_rows($select_sub_category_result);
                }
                if ($num_for_sub_category > 0) {
                  $sno = 0;
                  while ($row_for_sub_category = mysqli_fetch_assoc($select_sub_category_result)) {
                    $sub_category_name = $row_for_sub_category['sub_category_name'];
                    $sub_category_id = $row_for_sub_category['sub_category_id'];
                ?> <div class="col-md-4 col-sm-6 bdr1" id="banner_sub_category_<?= $sub_category_id ?>">
                      <div class="product-item">
                        <div class="product-thumbnail lazy">
                          <a href="listings.php?category_id=<?= $category_id ?>&sub_category_id=<?= $sub_category_id ?>"><img data-original="images/smallOilExpeller.jpg" alt="<?= $row_for_sub_category['sub_category_name'] ?>" src="images/<?= $row_for_sub_category['sub_category_image'] ?>" title="<?= $row_for_sub_category['sub_category_name'] ?>"></a>
                        </div>
                        <div class="product-meta">
                          <a href="listings.php?category_id=<?= $category_id ?>&sub_category_id=<?= $sub_category_id ?>">
                            <h3 ><?= $row_for_sub_category['sub_category_name'] ?>
                            </h3>
                          </a>
                          <ul>
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
                              while ($row_for_listing = mysqli_fetch_assoc($select_listing_result)) {
                                $show_banner_of_category = true;

                                $listing_id  = $row_for_listing['listing_id'];
                            ?>
                                <!-- <img src="images/<?= $row_for_listing['listing_image'] ?>" alt=""> -->

                                <li><a href="listings.php?category_id=<?= $category_id ?>&sub_category_id=<?= $sub_category_id ?>">
                                    <?= $row_for_listing['listing_business_name'] ?> </a></li>
                              <?php
                              }
                            } else {
                              ?>
                              <!-- <div class="utf_listing_item-container list-layout">
                                <a href="#" class="utf_listing_item">
                                  <div class="utf_listing_item_content">
                                    <div class="utf_listing_item-inner"> -->
                              <h5>No Listing Found</h5>
                              <style>
                                #banner_sub_category_<?= $sub_category_id ?> {
                                  display: none;
                                }
                              </style>
                              <!-- </div>
                                  </div>
                                </a>
                              </div> -->
                            <?php
                            }

                            ?>

                          </ul>
                        </div>
                      </div>
                    </div>

                    <!-- <li><a href="listings.php?category_id=<?= $category_id ?>&sub_category_id=<?= $row_for_listing['sub_category_id'] ?>"><?= $row_for_sub_category['sub_category_name'] ?></a></li> -->
                  <?php
                  }
                } else {
                  ?>

                  <div class="col-md-4 col-sm-6 bdr1">
                    <div class="product-item">
                      <div class="product-thumbnail lazy">
                        <!-- <a href="#"><img data-original="images/smallOilExpeller.jpg" alt="oil expeller" src="images/smallOilExpeller.jpg" title="smallOilExpeller"></a> -->
                      </div>
                      <div class="product-meta">
                        <h3>No Sub Category Found</h3>

                      </div>
                    </div>
                  </div>

                  <!-- <div class="utf_listing_item-container list-layout">
                    <a href="#" class="utf_listing_item">
                      <div class="utf_listing_item_content">
                        <div class="utf_listing_item-inner">
                          <h3>No Sub Category Found</h3>
                        </div>
                      </div>
                    </a> -->
              </div>
            <?php
                } ?>

            </div>
          </div>
        </div>
        </div>
      </section>
      <?php

      if (!$show_banner_of_category) {
      ?>
        <style>
          #banner_category_<?= $category_id ?> {
            display: none;
          }
        </style>
  <?php

      }
    }
  }

  ?>

  <br>

  <!--***********************
              NEWS 
      **********************-->

  <div class="container">

    <div class="container_12">
      <div class="grid_3">
        <br>
        <br>
        <br>
        <h1>Current News</h1>
        <ul class="list">
          <li>
            <time datetime="2014-01-01">29<span>Jan</span></time>
            <div class="extra_wrapper">
              <div class="title col2"><a href="#">Solar Charkha </a></div>
              revoulation in khadi sector
              <button style="background-color: #ffffff; -webkit-text-fill-color: black;" type="button" class="btn btn-link">Read More</button>

            </div>
          </li>
          <li>
            <time datetime="2014-01-01">02<span>Feb</span></time>
            <div class="extra_wrapper">
              <div class="title col2"><a href="#">Incubation Program</a></div>

            </div>
          </li>
          <li>
            <time datetime="2014-01-01">20<span>Feb</span></time>
            <div class="extra_wrapper">
              <div class="title col2"><a href="#">MGIRI interface</a></div>
              first phase of networked functioning
            </div>
          </li>
          <!-- <li>
							<time datetime="2014-01-01">05<span>Mar</span></time>
							<div class="extra_wrapper">
								<div class="title col2"><a href="#">Meloamuar</a></div>
								ferus at magne malesuada faui
							</div>
						</li> -->
        </ul>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <blockquote class="bq1">
          <div class="title">Testimonials</div>
          <p>Nulla vel viverra auctorleo magna sodales felis, quis malesuada nibh odio ut </p>
          <div class="col2">Sandra Wood</div>
        </blockquote>
      </div>
      <div class="container">
        <div class="grid_9">
          <h2>Usefull Links </h2>
          <section>
            <ul id="da-thumbs" class="da-thumbs">
              <li>
                <div style="display: block; left: 0%; top: 100%;">
                  <a href="#">
                    <img src="images/MSME-DELHI.jpeg" alt="" width="204px" height="160px">
                    <span>Ministry of MSME, New Delhi</span>
                  </a>
                </div>
              </li>
              <li>
                <div style="display: block; left: 0%; top: 100%;">
                  <a href="#">
                    <img src="images/KVIC MUMBAI.jpeg" alt="" width="204px" height="160px">
                    <span>KVIC ,Mumbai</span>
                  </a>
                </div>
              </li>
              <li>
                <div style="display: block; left: 0%; top: 100%;">
                  <a href="#">
                    <img src="images/MGIRI_WARDHA.jpg" alt="" width="204px" height="160px">
                    <span>MGIRI,Wardha</span>
                  </a>
                </div>
              </li>
              <li>
                <div style="display: block; left: 0%; top: 100%;">
                  <a href="#">
                    <img src="images/rurlahta.jpeg" alt="" width="204px" height="160px">
                    <span>Ruralhaat</span>
                  </a>
                </div>
              </li>
              <li>
                <div style="display: block; left: 0%; top: 100%;">
                  <a href="#">
                    <img src="images/khadi_design.jpeg" alt="" width="204px" height="160px">
                    <span>Khadi Design</span>
                  </a>
                </div>
              </li>
              <li>
                <div style="display: block; left: 0%; top: 100%;">
                  <a href="#">
                    <img src="images/NSIC.png" alt="" width="204px" height="160px">
                    <span> NSIC</span>
                  </a>
                </div>
              </li>
              <li>
                <div style="display: block; left: 0%; top: 100%;">
                  <a href="#">
                    <img src="images/COIR_BOARD.jpeg" alt="" width="204px" height="160px">
                    <span>Coir Board</span>
                  </a>
                </div>
              </li>
              <li>
                <div style="display: block; left: 0%; top: 100%;">
                  <a href="#">
                    <img src="images/msmehydra.jpg" alt="" width="204px" height="160px">
                    <span>MSME, Hydrabad</span>
                  </a>
                </div>
              </li>
              <li>
                <div style="display: block; left: 0%; top: 100%;">
                  <a href="#">
                    <img src="images\msme udyam.jpeg" alt="" width="204px" height="160px">
                    <span> MSME,Udyam</span>
                  </a>
                </div>
              </li>
            </ul>
          </section>
        </div>
      </div>
    </div>
    <br>
    <br>


    <!--*****NEWS END ****-->
  </div>
  </div>

  <div class="container padding-bottom-70">
    <div class="row">
      <div class="col-md-12">
        <h3 class="headline_part centered margin-bottom-35 margin-top-70">Most Use Products<span>Discover best things to do Hardware, technologies,industry, Minerals industry and khadi industry<br>around the world by categories.</span></h3>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="#" class="img-box" data-background-image="images/industry.jpeg">
          <div class="utf_img_content_box visible">
            <h4>Industries </h4>
            <span>18 Listings</span>
          </div>
        </a>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="#" class="img-box" data-background-image="images/minerals.jpeg">
          <div class="utf_img_content_box visible">
            <h4>Minerals</h4>
            <span>24 Listings</span>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <a href="#" class="img-box" data-background-image="images/Machines.jpg">
          <div class="utf_img_content_box visible">
            <h4>Machines</h4>
            <span>17 Listings</span>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <a href="#" class="img-box" data-background-image="images/hardware.jpeg">
          <div class="utf_img_content_box visible">
            <h4>Hardware</h4>
            <span>12 Listings</span>
          </div>
        </a>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="listings_list_with_sidebar.html" class="img-box" data-background-image="images/technolog.jpg">
          <div class="utf_img_content_box visible">
            <h4>technolog</h4>
            <span>14 Listings</span>
          </div>
        </a>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="listings_list_with_sidebar.html" class="img-box" data-background-image="images/labour.jpeg">
          <div class="utf_img_content_box visible">
            <h4>Labour</h4>
            <span>9 Listings</span>
          </div>
        </a>
      </div>
      <div class="col-md-12 centered_content"> <a href="#" class="button border margin-top-20">View More Categories</a> </div>
    </div>
  </div>

  <!--- break<!-->

  <!-- <section class="utf_testimonial_part fullwidth_block padding-top-75 padding-bottom-75"> 
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h3 class="headline_part centered">What Say Our Customers <span class="margin-top-15">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard dummy text ever since...</span> </h3>
        </div>
      </div>
    </div>
    <div class="fullwidth_carousel_container_block margin-top-20">
      <div class="utf_testimonial_carousel testimonials"> 
        <div class="utf_carousel_review_part">
          <div class="utf_testimonial_box">
            <div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</div>
          </div>
          <div class="utf_testimonial_author"> <img src="images/happy-client-01.jpg" alt="">
            <h4>Denwen Evil <span>Web Developer</span></h4>
          </div>
        </div>
        <div class="utf_carousel_review_part">
          <div class="utf_testimonial_box">
            <div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</div>
          </div>
          <div class="utf_testimonial_author"> <img src="images/happy-client-02.jpg" alt="">
            <h4>Adam Alloriam <span>Web Developer</span></h4>
          </div>
        </div>
        <div class="utf_carousel_review_part">
          <div class="utf_testimonial_box">
            <div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</div>
          </div>
          <div class="utf_testimonial_author"> <img src="images/happy-client-03.jpg" alt="">
            <h4>Illa Millia <span>Project Manager</span></h4>
          </div>
        </div>
		<div class="utf_carousel_review_part">
          <div class="utf_testimonial_box">
            <div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</div>
          </div>
          <div class="utf_testimonial_author"> <img src="images/happy-client-01.jpg" alt="">
            <h4>Denwen Evil <span>Web Developer</span></h4>
          </div>
        </div>
      </div>
    </div>
  </section>   -->
  <marquee class="sampleMarquee" direction="left" scrollamount="8" behavior="scroll"> Disclaimer - Mahatma Gandhi Institute for Rural Industrilization is not responsible for any legal complications arising between seller and purchaser
  </marquee>


  <?php include "subscribe_newslatter.php"; ?>

  <!-- Footer -->
  <div id="footer" class="footer_sticky_part">
    <div class="container">
      <!-- <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>Useful Links</h4>
          <ul class="social_footer_link">
            <li><a href="#">Home</a></li>
            <li><a href="#">Listing</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>My Account</h4>
          <ul class="social_footer_link">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">My Listing</a></li>
            <li><a href="#">Favorites</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>Pages</h4>
          <ul class="social_footer_link">
            <li><a href="#">Blog</a></li>
            <li><a href="#">Our Partners</a></li>
            <li><a href="#">How It Work</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>Help</h4>
          <ul class="social_footer_link">
            <li><a href="#">Sign In</a></li>
            <li><a href="#">Register</a></li>
            <li><a href="#">Add Listing</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12"> 
          <h4>About Us</h4>
          <p>The new processes, techniques and machines were brought to the knowledge of the public through exhibitions. AIVIA also struggled to bring about a transformation in the villages in terms of sanitation, improved diet, indigenous healthcare and local resource based employment.
            </p>          
        </div>
      </div>-->

      <div class="row">
        <?php include "./component/footer.php"; ?>
      </div>
    </div>
  </div>
  <div id="bottom_backto_top"><a href="#"></a></div>
  </div>

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
  <script>
    $('#state').on('change', function() {
      var state_id = this.value;
      // alert("hello");

      $.ajax({
        url: "./service/cities-by-state.php",
        type: "POST",
        data: {
          state_id: state_id
        },
        cache: false,
        success: function(result) {
          $("#city").empty();
          $("#city").removeClass('selectpicker');

          $("#city").append("",
            <?php

            ?> "<select style='margin-bottom:0px' name='city_id' value='' title='' id='city_id' data-selected-text-format='count'> </select> ",
            <?php
            ?>
          );
          $("#city_id").html(result);
          console.log(result);
        }
      });
    });
  </script>

</body>


</html>