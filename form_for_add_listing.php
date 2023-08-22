<?php
include "validation_of_session.php";
// addList: addList
// listing_title: sd
// category_id:  83
// cost: 455
// sub_category_id: 261
// product_details: fdsfsd
// contact_person: Aman Sahu
// company_name: dfds
// email_id: asd@dsfs
// phone_no: 542
// url: http://127.0.0.1:8080/author/listing_details/index.php
// state: 12
// pincode: 440035
// city: 333
// location: Bharatwada Road Kalmana
// logo_image: 08.png

// $category_id = $_GET['category_id'];
if (isset($_POST['addList'])) {
  $company_name = "";
  if (isset($_POST['company_name'])) {
    $company_name = $_POST['company_name'];
  }
  $category_id = "";
  if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];
  }
  $sub_category_id = "";
  if (isset($_POST['sub_category_id'])) {
    $sub_category_id = $_POST['sub_category_id'];
  }
  $listing_title = "";
  if (isset($_POST['listing_title'])) {
    $listing_title = $_POST['listing_title'];
  }
  $product_details = "";
  if (isset($_POST['product_details'])) {
    $product_details = $_POST['product_details'];
  }
  $logo_image = "";
  if (isset($_POST['logo_image'])) {
    $logo_image = $_POST['logo_image'];
  }
  $contact_person = "";
  if (isset($_POST['contact_person'])) {
    $contact_person = $_POST['contact_person'];
  }
  $cost = "";
  if (isset($_POST['cost'])) {
    $cost = $_POST['cost'];
  }
  $location = "";
  if (isset($_POST['location'])) {
    $location = $_POST['location'];
  }
  $phone_no = "";
  if (isset($_POST['phone_no'])) {
    $phone_no = $_POST['phone_no'];
  }
  $email_id = "";
  if (isset($_POST['email_id'])) {
    $email_id = $_POST['email_id'];
  }
  $url = "";
  if (isset($_POST['url'])) {
    $url = $_POST['url'];
  }
  $city = "";
  if (isset($_POST['city'])) {
    $city = $_POST['city'];
  }
  $state = "";
  if (isset($_POST['state'])) {
    $state = $_POST['state'];
  }

  $insert_listing_query = "INSERT INTO `listing` (`listing_id`, `listing_business_name`, `listing_business_category_id`, `listing_business_sub_category_id`, `listing_description`, `listing_firm_name`, `listing_cost`, `listing_location`, `listing_phone`, `listing_email`, `listing_website`,`listing_image`,`listing_contact_name`,`listing_state_id`,`listing_city_id`) VALUES (NULL, '$listing_title', '$category_id', '$sub_category_id', '$product_details', '$company_name', '$cost', '$location', '$phone_no', '$email_id', '$url', '$logo_image', '$contact_person', '$state', '$city')";


  // echo$insert_listing_query;
}
?>

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
  <link rel="stylesheet" href="css/forms.css">
  <link rel="stylesheet" href="css/style.css" id="colors">






  <!-- <link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>  -->



  <!--JS-->
  <!-- <script src="js/jquery.js"></script>
  <script src="js/jquery-migrate-1.2.1.js"></script> -->

</head>

<body>

  <?php include "./component/preloader.php"; ?>
  <style>
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
    <!-- <div class="forms_div ">

      <form enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <input type="hidden" id="category_id" name="category_id" value="<?= $category_id ?>">
        <h3 class="headline_part centered margin-bottom-30"> Add Listing </h3>

        <label>Product Name: </label>
        <input type="text" id="product_name" name="product_name" required>

        <label name="sub_category_id">Select Sub Category : </label>
        <select id="sub_category_id" name="sub_category_id">
          <?php
          $select_sub_category_query = "SELECT * FROM `sub_category` WHERE  sub_category_category_id = $category_id ";
          try {
            $select_sub_category_result = mysqli_query($connect, $select_sub_category_query);
          } catch (Exception $e) {
            // echo "Data insertion failed " . "<br>";
            // echo 'Message: ' . $e->getMessage() . "<br>";
          }
          while ($row_for_sub_category = mysqli_fetch_assoc($select_sub_category_result)) {
          ?>
            <option name="sub_category_id" value="<?= $row_for_sub_category['sub_category_id'] ?>"><?= $row_for_sub_category['sub_category_name'] ?></option>
          <?php
          }
          ?>

        </select>

        <label>Details/Benifits/Features (Max. 500 characters) : </label>
        <textarea rows="4" cols="33" maxlength="500" id="product_details" name="product_details"></textarea>

        <label>Load Image: </label>
        <input type="file" id="product_image" name="product_image">

        <label>Firm Name: </label>
        <input type="text" id="company_name" name="company_name" required>

        <label>Contact Person: </label>
        <input type="text" id="contact_person" name="contact_person">

        <label>Cost in Rs.: </label>
        <input type="number" id="cost" name="cost">

        <label>Location: </label>
        <input type="text" id="location" name="location">

        <label>Phone No.:</label>
        <input type="tel" id="phone_no" name="phone_no">

        <label>Email Id: </label>
        <input type="email" id="email_id" name="email_id">

        <label>Website: </label>
        <input type="url" id="website" name="website">

        <input type="submit" class="btn" name="submit" style="font-size: 20px; margin-top:20px; width: 100%" value="submit">
      </form>
    </div> -->

    <div id="titlebar" class="gradient margin-bottom-0">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2> Add Listing</h2>
            <nav id="breadcrumbs">
              <ul>
                <li><a href="index.php">Home</a></li>
                <li> Add Listing</li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">

          <div id="utf_add_listing_part">
            <form enctype="multipart/form-data" method="POST" action="<?= $_SERVER["REQUEST_URI"]; ?>">
              <input type="hidden" name="addList" id="addList" value="addList" />
              <div class="add_utf_listing_section margin-top-45" validate>
                <div class="utf_add_listing_part_headline_part">
                  <h3><i class="sl sl-icon-tag"></i> Categories & Tags</h3>
                </div>

                <div class="row with-forms">
                  <div class="col-md-6">
                    <label for="listing_title">Listing Title</label>
                    <input type="text" title="Listing Title" name="listing_title" id="listing_title" placeholder="Listing Title" required />
                  </div>
                  <div class="col-md-6">
                    <label for="">Category</label>
                    <div class="intro-search-field utf-chosen-cat-single">
                      <select class="selectpicker " name="category_id" id="category" data-selected-text-format="count" data-size="7" title="Select Category" required>


                        <?php

                        $select_category_query = "SELECT * FROM `category`"; //NOTE: here (`) is not equal to (')
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
                        ?> <option value=" <?php echo $row["category_id"]; ?>"><?= $row['category_name'] ?></option>
                        <?php }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row with-forms">
                  <!-- <div class="col-md-6">
                      <label for="keywords">Keywords</label>
                      <input type="text" name="keywords" id="keywords" placeholder="Keywords..." required />
                    </div> -->
                  <div class="col-md-6">
                    <label for="">Cost in Rs.:</label>
                    <div class="fm-input pricing-price">
                      <input type="number" name="cost" id="cost" placeholder="Cost" data-unit="₨" required />
                      <i class="data-unit">₨</i>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="">Sub-Category</label>
                    <div class="intro-search-field utf-chosen-cat-single">
                      <select class=" default" name="sub_category_id" style="margin-bottom:0px" id="sub-category" data-selected-text-format="count" data-size="7" title="Select Sub-Category" required>

                      </select>
                    </div>
                  </div>

                </div>

                <div class="row with-forms">
                  <div class="col-md-12">
                    <label for="product_details">Details/Benifits/Features (Max. 500 characters) : </label>
                    <!-- <input type="text" class="" name="listing_description" id="listing_description" placeholder="" required />  -->
                    <textarea rows="4" cols="33" maxlength="500" id="product_details" name="product_details" required></textarea>
                  </div>
                </div>
              </div>


              <!-- <div class="add_utf_listing_section margin-top-45">
                <div class="utf_add_listing_part_headline_part">
                  <h3><i class="sl sl-icon-phone"></i> Contact Details</h3>
                </div>
                <div class="utf_submit_section">
                  <div class="row with-forms">

                    <div class="col-md-6">
                      <label for="contact_person">Contact Person Name</label>
                      <input type="text" class="input-text" name="contact_person" id="contact_person" placeholder="Contact Person Name" required />
                    </div>

                    <div class="col-md-6">
                      <label for="company_name">Company Name</label>
                      <input type="text" class="input-text" name="company_name" id="company_name" placeholder="Company Name" required />
                    </div>
                    <div class="col-md-6">
                      <label for="email_id">Eamil Id</label>
                      <input type="email" class="input-text" name="email_id" id="email_id" placeholder="Eamil Id" required />
                    </div>

                    <div class="col-md-6">
                      <label for="phone_no">Contact No.</label>
                      <input type="tel" class="input-text" name="phone_no" id="phone_no" placeholder="Contact No." required />
                    </div>
                    <div class="col-md-12">
                      <label for="url">Website URL</label>
                      <input type="url" class="input-text" name="url" id="url" placeholder="Website URL" required />
                    </div>

                  </div>
                </div>
              </div> -->
              <div class="add_utf_listing_section margin-top-45">
                <div class="utf_add_listing_part_headline_part">
                  <h3><i class="sl sl-icon-map"></i> Location</h3>
                </div>
                <div class="utf_submit_section">
                  <div class="row with-forms">
                    <!-- <div class="col-md-6">
                        <label for="country">Country</label>
                        <div class="intro-search-field utf-chosen-cat-single">
                          <select class="selectpicker default" name="country_id" id="country" data-selected-text-format="count" data-size="7" title="Select Country" required>

                            <?php $result = mysqli_query($connect, "SELECT * FROM countries");
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                              <option value=" <?php echo $row["country_id"]; ?>"><?php echo $row["country_name"]; ?></option>
                            <?php
                            } ?>
                          </select>
                        </div>
                      </div> -->
                    <div class="col-md-6" id="state1">
                      <label for="state">State</label>
                      <div class="intro-search-field utf-chosen-cat-single">
                        <select class="selectpicker default" style="margin-bottom:0px" name="state" id="state" title="Select State" required>
                          <?php $result = mysqli_query($connect, "SELECT * FROM states");
                          while ($row_for_state_title = mysqli_fetch_array($result)) {
                          ?>
                            <option name="state" value="<?php echo $row_for_state_title["state_id"]; ?>"><?php echo $row_for_state_title["state_name"]; ?></option>
                          <?php
                          } ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="pincode">Pincode</label>
                      <input type="text" class="input-text" name="pincode" id="pincode" placeholder="Pincode" required />
                    </div>

                    <div class="col-md-6" id="city1">
                      <label for="city">City</label>
                      <div class="intro-search-field utf-chosen-cat-single">
                        <select class=" default" style="margin-bottom:0px" name="city" id="city" title="Select City" required>
                          <?php $select_city_option_query = "SELECT * FROM cities where state_id = " . $row['listing_state_id'];
                          try {
                            $select_city_option_result = 0;
                            if ($connect) {
                              // echo $select_city_option_query;
                              $select_city_option_result = mysqli_query($connect, $select_city_option_query);
                              if ($select_city_option_result) {
                                $select_city_option_num = mysqli_num_rows($select_city_option_result);
                              }
                            }
                          } catch (Exception $e) {
                            $mess = $e->getMessage();
                          }
                          if ($select_city_option_num > 0) {
                            while ($row_for_city_option = mysqli_fetch_assoc($select_city_option_result)) {
                          ?>
                              <option name="city" value="<?= $row_for_city_option['city_id'] ?>" select><?= $row_for_city_option['city_name'] ?></option>
                          <?php
                            }
                          } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="location">Address</label>
                      <input type="text" class="input-text" name="location" id="location" placeholder="Address" required />
                    </div>

                  </div>
                </div>
              </div>

              <div class="add_utf_listing_section margin-top-45">
                <div class="utf_add_listing_part_headline_part">
                  <h3><i class="sl sl-icon-picture"></i> Images</h3>
                </div>
                <div class="row with-forms">
                  <div class="utf_submit_section col-md-4">
                    <h4>Logo</h4>
                    <!-- <form></form> -->
                    <div class="">
                      <input type="file" onchange="showimg();" name="logo_image" id="logo_image" required>
                    </div>
                    <div class="">
                      <img style="display:none" class="dropzone" name="view_logo_image" id="view_logo_image" src="" />
                    </div>

                    <script>
                      function showimg() {
                        document.getElementById("view_logo_image").style.display = "block";
                        var x = (document.getElementById("logo_image").value).slice(12, 100);
                        console.log(x);
                        document.getElementById("view_logo_image").src = "./images/" + x;
                        // alert("hello");
                      }
                    </script>

                    </input>
                  </div>
                </div>
              </div> <!-- <a href="#" class="button preview">Save </a> -->
              <button type="submit" class="button preview" id="submit">Save</button>
            </form>
          </div>
        </div>
        <?php include "./component/footer.php" ?>
      </div>
    </div>

    <br><br><br><br><br>

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
  <script src="scripts/magnific-popup.min.js"></script>
  <script src="scripts/jquery-ui.min.js"></script>
  <script src="scripts/bootstrap-select.min.js"></script>
  <script src="scripts/mmenu.js"></script>
  <script src="scripts/tooltips.min.js"></script>
  <script src="scripts/jquery_custom.js"></script>
  <?php if (isset($_POST['addList'])) {
    try {
      $insert_listing_result = mysqli_query($connect, $insert_listing_query);
      // echo "Data insertion " . "<br>";
      echo "<script>alert('Listing Added Successfully');</script>";
    } catch (Exception $e) {
      echo "<script>alert('Listing Addition failed ');</script>";
      // echo "Data insertion failed " . "<br>";
      // echo 'Message: ' . $e->getMessage() . "<br>";
    }
  } ?>
  <script>
    $(document).ready(function() {
      $('#sub-category').html('<option value="">Select Category First</option>');
      // $('#state').append('<option value="">Select State</option>');
      $('#city').html('<option value="">Select State First</option>');
      $('#category').on('change', function() {
        // alert("hello");
        var category_id = this.value;
        $.ajax({
          url: "./service/sub_category_by_category.php",
          type: "POST",
          data: {
            category_id: category_id
          },
          cache: false,
          success: function(result) {
            // alert("hello");
            $("#sub-category").html(result);
            console.log(result);
          }
        });
      });
      // $('#country').on('change', function() {
      //   // alert("hello");
      //   var country_id = this.value;
      //   $.ajax({
      //     url: "./service/states-by-country.php",
      //     type: "POST",
      //     data: {
      //       country_id: country_id
      //     },
      //     cache: false,
      //     success: function(result) {
      //       // alert("hello");
      //       $("#state").html(result);
      //       $('#city').html('<option value="">Select State First</option>');
      //       console.log(result);
      //     }
      //   });
      // });
      // $('#state').on('change', function() {
      //   var state_id = this.value;
      //   $.ajax({
      //     url: "./service/cities-by-state.php",
      //     type: "POST",
      //     data: {
      //       state_id: state_id
      //     },
      //     cache: false,
      //     success: function(result) {
      //       $("#city").html(result);
      //     }
      //   });
      // });


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
            $("#city1").empty();
            $("#city1").append("<label for=''>City</label>",
              <?php

              ?> "<div class='intro-search-field utf-chosen-cat-single'><select style='margin-bottom:0px' name='city' value='' title='' id='city' data-selected-text-format='count'> </select> </div>",

              <?php
              ?>
            );
            $("#city").html(result);
            console.log(result);
          }
        });
      });

    });
  </script>
</body>


</html>