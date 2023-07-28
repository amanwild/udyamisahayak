<?php
include "validation_of_session.php";
$category_id = $_GET['category_id'];


?> <?php
    $num_for_listing = 0;
    $select_category_name_query = "SELECT * FROM `category` WHERE  category_id = $category_id ";
    try {
      $select_category_name_result = mysqli_query($connect, $select_category_name_query);
    } catch (Exception $e) {
      // echo "Data insertion failed " . "<br>";
      // echo 'Message: ' . $e->getMessage() . "<br>";
    }
    // echo $select_category_name_query;
    if ($select_category_name_result) {
      $num_for_listing = mysqli_num_rows($select_category_name_result);
    }
    if ($num_for_listing > 0) {
      $sno = 0;
      while ($row_for_listing = mysqli_fetch_assoc($select_category_name_result)) {
        $category_name = $row_for_listing['category_name'];
      }
    } ?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/listings_list_full_width.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:21:13 GMT -->

<head>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sub Categories</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="images/favicon.png">
  <!-- Style CSS -->
  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/mmenu.css">
  <link rel="stylesheet" href="css/style.css" id="colors">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css">
</head>

<body>

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
    <?php include "./header/global_header.php";
    if ($category_id == '131' || $category_id == '132') {
    ?>
      <script>
        document.getElementById("navbar_tab_<?= $category_id?>").classList.add("current");
      </script>
    <?php
    }
    ?>


    <div class="clearfix"></div>


    <div id="titlebar" class="gradient margin-bottom-0">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>Category : <?= $category_name ?></h2>
            <nav id="breadcrumbs">
              <ul>
                <li><a href="index.php">Home</a></li>
                <li>Sub Categories</li>
              </ul>
              
            </nav>
          </div>
        </div>
      </div>
    </div>
    <?php include "./component/searchbar.php";?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class=" margin-top-30">

          </div>
          <div class="col-md-12">
            <div class="row">
              <?php
              $num_for_listing = 0;
              $select_listing_query = "SELECT * FROM `sub_category` WHERE  sub_category_category_id = $category_id ORDER BY `sub_category`.`sub_category_timestamp` DESC";
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
                $sno = 0;
                while ($row_for_listing = mysqli_fetch_assoc($select_listing_result)) {
                  ++$sno;
              ?>
                  <div class="utf_listing_item-container list-layout"> <a href="listings.php?category_id=<?= $category_id ?>&sub_category_id=<?= $row_for_listing['sub_category_id'] ?>" class="utf_listing_item" style="height: 70px;">

                      <!-- <span class="utf_open_now">Open Now</span> -->
                      <div class="utf_listing_item_content">
                        <div class="utf_listing_item-inner">

                          <h3><?= $sno ?> ) <?= $row_for_listing['sub_category_name'] ?></h3>
                          <?php $select_listing_count_query = "SELECT * FROM `listing` where listing_permission LIKE 'Approved' and listing_business_sub_category_id = " . $row_for_listing['sub_category_id']; //NOTE: here (`) is not equal to (')
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
                          } ?>
                          <span class="right"><i class="fa fa-list"></i> <?= $num_for_listing_count ?> Listing</span>
                          <!-- <span><i class="fa fa-phone"></i> (+15) 124-796-3633</span> -->
                          <!-- <div class="utf_star_rating_section" data-rating="4.5"> -->
                          <!-- <div class="utf_counter_star_rating">(4.5)</div> -->
                          <!-- </div> -->
                        </div>
                      </div>
                    </a>
                  </div>

                <?php
                }
              } else {
                ?>
                <div class="utf_listing_item-container list-layout">
                  <a href="#" class="utf_listing_item">
                    <div class="utf_listing_item_content">
                      <div class="utf_listing_item-inner">
                        <h3>No Sub Category Found</h3>
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
    <?php include "./component/footer_section_two.php"; ?>

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

</body>

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/listings_list_full_width.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:21:13 GMT -->

</html>