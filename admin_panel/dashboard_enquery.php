<?php include "../validation_of_admin.php" ?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_my_listing.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:50 GMT -->

<head>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Listing</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="images/favicon.png">
  <!-- Style CSS -->
  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/mmenu.css">
  <link rel="stylesheet" href="css/perfect-scrollbar.css">
  <link rel="stylesheet" href="css/style.css" id="colors">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css">
  
</head>

<body>


  <?php include "./component/preloader.php" ?>
  <?php include "./service/pick_ago_time.php" ?>


  <!-- Wrapper -->
  <div id="main_wrapper">
    <?php include "./component/header.php" ?>

    <div class="clearfix"></div>

    <!-- Dashboard -->
    <div id="dashboard">
      <?php include "./component/user_sidebar_navbar.php" ?>
      <script>
        var d = document.getElementById("user_dashboard_enquery");
        d.className += "active";
      </script>

      <div class="utf_dashboard_content">
        <div id="titlebar" class="dashboard_gradient">
          <div class="row">
            <div class="col-md-12">
              <h2>All Enquery</h2>
              <nav id="breadcrumbs">
                <ul>
                  <li><a href="index_1.php">Home</a></li>
                  <li><a href="dashboard.php">Dashboard</a></li>
                  <li>All Enquery</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <?php
        if (isset($_POST["delete_listing"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
          $listing_id = $_POST["listing_id"];
          $delete_query = "DELETE FROM `listing` WHERE `listing`.`listing_id` = $listing_id";
          $delete_result = mysqli_query($connect, $delete_query);
          if ($delete_result) {
            echo '<div class="row"> <div class="col-md-12"> <div class="notification success closeable margin-bottom-30"> <p> Listing Deleted Successfully!!! </p> <a class="close" href="#"></a> </div> </div> </div>'; // echo ("<br> email shooting successfull <br>");

          }
        } ?>



        <?php

        if (isset($_GET['delete'])) {
          $snoDeletes = $_GET['delete'];
          $delete_query  = "DELETE FROM `product` WHERE `product`.`product_id` = $snoDeletes";
          $delete_result = mysqli_query($connect, $delete_query);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          // echo"here";
          if (isset($_POST['snoEdit'])) {
            $nameEdit = $_POST['nameEdit'];
            $brandEdit = $_POST['brandEdit'];
            $categoryEdit = $_POST['categoryEdit'];
            $priceEdit = $_POST['priceEdit'];
            $imageEdit = $_POST['imageEdit'];
            $product_id = $_POST['snoEdit'];

            $update_query = "UPDATE `product` SET `product_name` = '$nameEdit', `product_brand` = '$brandEdit', `product_category` = '$categoryEdit', `product_price` = '$priceEdit',`product_image` = '$imageEdit' WHERE `product`.`product_id` = $product_id";
            // echo$fname,$lname;

            try {
              $update_result = mysqli_query($connect, $update_query);
              // echo"here";

            } catch (Exception $e) {
              $mess = $e->getMessage();
            }
            // echo$update_result;
            // exit();
          }
        }

        $select_listing_query = "SELECT * FROM listing left join sub_category on listing.listing_business_sub_category_id = sub_category.sub_category_id left join category on listing.listing_business_category_id = category.category_id left join cities on listing.listing_city_id=cities.city_id left join states on listing.listing_state_id = states.state_id GROUP BY listing_id ORDER BY `listing`.`listing_timestamp` DESC"; //NOTE: here (`) is not equal to (')
        try {
          $select_listing_result = 0;
          if ($connect) {
            $select_listing_result = mysqli_query($connect, $select_listing_query);
            if ($select_listing_result) {
              $num = mysqli_num_rows($select_listing_result);
            }
          }
        } catch (Exception $e) {
          $mess = $e->getMessage();
        }
        ?>


        <div id="main" class="">
          <div class="allContent-section container   pt-0" style="margin-bottom: 20px;">

            <div class=" my-1">
              <!-- <div id="showLocatonContent" class="d-flex text-center mt-3 ">
                <div class="" style="display:flex;text-align:center; ">
                  <h1 style="margin-right:auto;padding-right:0%;z-index:999;">All Enquery</h1>
                  <button type="button" style="float:left" class="button border" onclick="window.location.href='./dashboard_add_listing.php'">Add Listing
                  </button>
                </div>

              </div> -->
              <br>
             
              <div class="table-responsive" style="border:3px solid grey;padding:5px;">
                <table data-role="table" class="table ui-responsive" id="myTable">

                  <div id="showEditorOption" style="float:left;display:none !important;" class="d-flex text-center">
                    <div class="form-group">
                      <button type="" name="submit" onclick="approve_listing_with_checkbox()" style='background-color:green;color:white;padding:5px;font-weight:700;font-size:15px;' class="btn  sharp btn-md btn-style-one" value="Send">Approve</button>
                      <button type="" style='background-color:red;color:white;padding:5px;font-weight:700;font-size:15px;' name="submit" class="btn  sharp btn-md btn-style-one" onclick="reject_listing_with_checkbox()" value="Send">Reject</button>
                    </div>
                  </div>
                  <!-- <div id="showEditorBtn" style="float:left" class="d-flex text-center">
                    <div class="form-group">
                      <button type="" onclick="show_checkbox()" name="submit" style='background-color:green;color:white;padding:5px;font-weight:700;font-size:15px;' class="btn  sharp btn-md btn-style-one" value="Send">Edit</button>
                    </div>
                  </div> -->

                  <style>
                    .checkBoxOption {
                      width: 77px !important;
                      display: none;
                      margin-right: 0px !important;
                    }
                  </style>
                  <thead>
                    <tr>
                      <th scope="col">Sr. No.</th>
                      <!-- <th scope="col">User Image</th> -->
                      <th scope="col">User Name</th>
                      <th scope="col">User Email</th>
                      <th scope="col">User Phone</th>

                      <!-- <th scope="col">Target Image</th>
                      <th scope="col">On Target Username</th>
                      <th scope="col">Target Email</th>
                      <th scope="col">Target Phone</th> -->

                      <th scope="col">Listing Image</th>
                      <th scope="col">Listing Title</th>
                      <th scope="col">Listing Cost</th>
                      <th scope="col">Listing City</th>
                      <th scope="col">Listing State</th>

                      <th scope="col">Owner Name</th>
                      <th scope="col">Eamil</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Timestamp</th>

                      <!-- <th scope="col">Interaction Type</th> -->
                      <!-- <th scope="col">Way</th> -->

                      <!-- <th scope="col" style="width:110px;">Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $select_query = "SELECT * FROM `enquery` order by enquery_id desc"; //NOTE: here (`) is not equal to (')
                    try {
                      $select_enquery_result = 0;
                      if ($connect) {
                        $select_enquery_result = mysqli_query($connect, $select_query);
                        if ($select_enquery_result) {
                          $member_num = mysqli_num_rows($select_enquery_result);
                        }
                      }
                    } catch (Exception $e) {
                      $mess = $e->getMessage();
                    }

                    if ($member_num > 0) {
                      $sno = 0;
                      //Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
                      // UPDATE `user_interaction` SET `user_id` = '1661', `interaction_on_user_id` = '1661', `interaction_way` = 'facebooka', `interaction_on_listing_id` = '11', `interaction_type` = 'sharea' WHERE `user_interaction`.`interaction_id` = 1;
                      while ($row = mysqli_fetch_assoc($select_enquery_result)) {
                        $sno += 1;
                        $enquery_first_name = $row['enquery_first_name'];
                        $enquery_last_name = $row['enquery_last_name'];
                        $enquery_email = $row['enquery_email'];
                        $enquery_phone = $row['enquery_phone'];
                        $enquery_listing_id = $row['enquery_listing_id'];
                        $enquery_timestamp = $row['enquery_timestamp'];

                        $select_target_listing_query = "SELECT
                    *
                  FROM
                    listing
                    left join category on listing.listing_business_category_id = category.category_id
                    left join sub_category on listing.listing_business_sub_category_id = sub_category.sub_category_id
                    left join states on listing.listing_state_id = states.state_id
                    left join cities on listing.listing_city_id = cities.city_id where listing.listing_id = $enquery_listing_id"; //NOTE: here (`) is not equal to (')
                        //  echo $select_target_listing_query;
                        try {
                          $select_target_listing_result = 0;
                          if ($connect) {
                            $select_target_listing_result = mysqli_query($connect, $select_target_listing_query);
                            if ($select_target_listing_result) {
                              $member_num = mysqli_num_rows($select_target_listing_result);
                            }
                          }
                        } catch (Exception $e) {
                          $mess = $e->getMessage();
                        }
                        while ($row = mysqli_fetch_assoc($select_target_listing_result)) {
                          $interaction_on_listing_title = $row['listing_business_name'];
                          $interaction_on_listing_category_name = $row['category_name'];
                          $interaction_on_listing_price = $row['listing_cost'];
                          $interaction_on_listing_image = $row['listing_image'];
                          $interaction_on_listing_city_name = $row['city_name'];
                          $interaction_on_listing_state_name = $row['state_name'];
                          $interaction_on_listing_listing_email = $row['listing_email'];
                          $interaction_on_listing_listing_phone = $row['listing_phone'];
                          $interaction_on_listing_listing_contact_name = $row['listing_contact_name'];
                          // $interaction_on_listing_listing_status = $row['listing_status'];
                        }

                    ?>

                        <tr>
                          <td><?= $sno ?></td>
                          <!-- <td><img src="../images/<?= $user_image ?>" class="rounded-circle img-fluid" style="object-fit:cover;max-width: 32px;height: auto;" class="mr-3 p-1" alt="." /></td> -->
                          <td><?= $enquery_first_name ?> <?= $enquery_last_name ?></td>
                          <td><?= $enquery_email ?></td>
                          <td><?= $enquery_phone ?></td>


                          <td><img src="../images/<?= $interaction_on_listing_image ?>" class="rounded-circle img-fluid" style="object-fit:cover;max-width: 32px;height: auto;" class="mr-3 p-1" alt="." /></td>
                          <td><?= $interaction_on_listing_title ?></td>
                          <td><?= $interaction_on_listing_price ?></td>
                          <td><?= $interaction_on_listing_city_name ?></td>
                          <td><?= $interaction_on_listing_state_name ?></td>
                          <td><?= $interaction_on_listing_listing_contact_name ?></td>
                          <td><?= $interaction_on_listing_listing_email ?></td>
                          <td><?= $interaction_on_listing_listing_phone ?></td>

                          <td><?= $enquery_timestamp ?></td>


                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>

              </div>


            </div>
          </div>
        </div>
        <?php include "./component/footer.php" ?>



      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="scripts/jquery-3.4.1.min.js"></script>
  <script src="scripts/chosen.min.js"></script>
  <script src="scripts/perfect-scrollbar.min.js"></script>
  <script src="scripts/slick.min.js"></script>
  <script src="scripts/rangeslider.min.js"></script>
  <script src="scripts/magnific-popup.min.js"></script>
  <script src="scripts/jquery-ui.min.js"></script>
  <script src="scripts/mmenu.js"></script>
  <script src="scripts/tooltips.min.js"></script>
  <script src="scripts/color_switcher.js"></script>
  <script src="scripts/jquery_custom.js"></script>
  <script>
    (function($) {
      try {
        var jscr1 = $('.js-scrollbar');
        if (jscr1[0]) {
          const ps1 = new PerfectScrollbar('.js-scrollbar');

        }
      } catch (error) {
        console.log(error);
      }
    })(jQuery);
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
      responsive: true

    });
  </script>
  <!-- <script>
    deletes = document.getElementsByClassName("delete");
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        snoDelete = e.target.id.substr(1, );
        if (confirm("Are you sure? you want to Delete data!")) {
          // window.location = `/author/product_details/index.php?delete=${snoDelete}`
        } else {
          // console.log("No");
        }
        console.log(snoDelete);
      })
    })
  </script> -->
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <script>
    function show_checkbox() {
      $("#check_all").prop("checked", false);
      $("input:checkbox[name='row-check']").prop("checked", false);
      $('.checkBoxOption').show();
      $('#showEditorBtn').hide();
      // $('#showEditorOption').show();
    }

    function hide_checkbox() {
      $("#check_all").prop("checked", false);
      $('.checkBoxOption').hide();
      $('#showEditorBtn').show();
      $('#showEditorOption').hide();
    }


    $(function() {
      //If check_all checked then check all table rows
      $("#check_all").on("click", function() {
        if ($("input:checkbox").prop("checked")) {
          $("input:checkbox[name='row-check']").prop("checked", true);
        } else {
          $("input:checkbox[name='row-check']").prop("checked", false);
        }
        // console.log($("input:checkbox").prop("checked"));
        var markedCheckbox = document.getElementsByName('row-check');
        let array_of_checked_id = [];
        for (var checkbox of markedCheckbox) {
          if (checkbox.checked) {
            array_of_checked_id.push(checkbox.value);
            // $("#row_"+checkbox.value).css("background-color", "#c7d0e7");
          }

        }
        for (var checkbox of markedCheckbox) {
          if (!checkbox.checked) {
            array_of_checked_id.push(checkbox.value);
            // $("#row_"+checkbox.value).css("background-color", "#c7d0e7");
          }

        }
        if (array_of_checked_id.length <= 0) {
          $("input:checkbox[name='row-check']").prop("checked", false);
          $('#showEditorOption').hide();
          $('#showEditorBtn').show();
          $('.checkBoxOption').hide();

        } else {
          $('#showEditorOption').show();
          $('#showEditorBtn').hide();
        }
        console.log(array_of_checked_id);
        console.log("\n");
      });


      // Check each table row checkbox

    });
    // $(function() {
    //   $("#myTable_filter").prop("onclick", alert("aa"));
    //   $("#myTable_filter").on("click", function() {
    //   alert("hello");
    //   });

    // });
    $(function() {
      $("input:checkbox[name='row-check']").on("change", function() {
        var total_check_boxes = $("input:checkbox[name='row-check']").length;
        var total_checked_boxes = $("input:checkbox[name='row-check']:checked").length;

        // If all checked manually then check check_all checkbox
        if (total_check_boxes === total_checked_boxes) {
          $("#check_all").prop("checked", true);
        } else {
          $("#check_all").prop("checked", false);
        }

        var markedCheckbox = document.getElementsByName('row-check');
        let array_of_checked_id = [];
        for (var checkbox of markedCheckbox) {
          if (checkbox.checked) {
            array_of_checked_id.push(checkbox.value);
          }

        }
        if (array_of_checked_id.length <= 0) {
          $('#showEditorOption').hide();
          $('#showEditorBtn').show();
          $('.checkBoxOption').hide();

        } else {
          $('#showEditorOption').show();
          $('#showEditorBtn').hide();
        }
        console.log(array_of_checked_id);
        console.log("\n");

      });

    });

    function approve_listing(id) {
      show_preloader();
      $.ajax({
        url: "./approve_listing.php",
        type: "POST",
        data: {
          type: "approve",
          id: id,
        },
        success: function(result) {
          console.log(result);
          console.log("approve " + id);
          document.getElementById("status_" + id).innerHTML = `<span style="background-color:green;color:white;padding:5px;font-weight:700;border-radius:5px;">Approved</span>`;
          hide_preloader();
        }
      });
    }

    function approve_listing_with_checkbox() {
      hide_checkbox();
      var total_check_boxes = $("input:checkbox[name='row-check']").length;
      var total_checked_boxes = $("input:checkbox[name='row-check']:checked").length;
      show_preloader();
      // If all checked manually then check check_all checkbox
      if (total_check_boxes === total_checked_boxes) {
        $("#check_all").prop("checked", true);
      } else {
        $("#check_all").prop("checked", false);
      }
      // console.log($("input:checkbox[name='row-check']").prop("checked"));
      // console.log(total_check_boxes);
      // console.log(total_checked_boxes);

      var markedCheckbox = document.getElementsByName('row-check');
      var array_of_checked_id = [];
      for (var checkbox of markedCheckbox) {
        if (checkbox.checked) {
          //  data= checkbox.value+";"

          array_of_checked_id.push(checkbox.value);
        }

      }
      if (array_of_checked_id.length <= 0) {
        $('#showEditorOption').hide();
        $('#showEditorBtn').show();
        $('.checkBoxOption').hide();

      } else {
        $('#showEditorOption').hide();
        $('.checkBoxOption').hide();
        $('#showEditorBtn').show();
      }
      console.log(array_of_checked_id);
      console.log("\n");
      array_of_checked_id.forEach(to_Update_Color_green);

      $.ajax({
        url: "./approve_listing.php",
        type: "POST",
        data: {
          type: "approve",
          array_of_checked_id: array_of_checked_id,
        },
        success: function(result) {

          console.log(result);
          hide_preloader();
        }
      });
    }

    function show_preloader() {
      $('#loader').show();
      $("body").append('<div id="overlay" style="background-color:white;position:absolute;top:0;left:0;height:100%;width:100%;z-index:999"></div>');
      $("#overlay").css({
        "position": "absolute",
        "width": $(document).width(),
        "height": $(document).height(),
        "z-index": 99999,
      }).fadeTo(0, 0.3);
    }

    function hide_preloader() {
      $('#loader').hide();
      $("#overlay").remove();
    }

    function reject_listing_with_checkbox() {
      hide_checkbox();
      show_preloader();
      var total_check_boxes = $("input:checkbox[name='row-check']").length;
      var total_checked_boxes = $("input:checkbox[name='row-check']:checked").length;

      // If all checked manually then check check_all checkbox
      if (total_check_boxes === total_checked_boxes) {
        $("#check_all").prop("checked", true);
      } else {
        $("#check_all").prop("checked", false);
      }
      // console.log($("input:checkbox[name='row-check']").prop("checked"));
      // console.log(total_check_boxes);
      // console.log(total_checked_boxes);

      var markedCheckbox = document.getElementsByName('row-check');
      var array_of_checked_id = [];
      for (var checkbox of markedCheckbox) {
        if (checkbox.checked) {
          //  data= checkbox.value+";"

          array_of_checked_id.push(checkbox.value);
        }

      }
      if (array_of_checked_id.length <= 0) {
        $('#showEditorOption').hide();
        $('#showEditorBtn').show();
        $('.checkBoxOption').hide();

      } else {
        $('#showEditorOption').hide();
        $('.checkBoxOption').hide();
        $('#showEditorBtn').show();
      }
      console.log(array_of_checked_id);
      console.log("\n");

      array_of_checked_id.forEach(to_Update_Color_red);
      $.ajax({
        url: "./reject_listing.php",
        type: "POST",
        data: {
          type: "reject",
          array_of_checked_id: array_of_checked_id,
        },
        success: function(result) {
          hide_preloader();
          console.log(result);
          // console.log("approve " + id);




        }
      });
    }

    function to_Update_Color_red(id) {
      // alert("red");
      document.getElementById("status_" + id).innerHTML = `<span style="background-color:red;color:white;padding:5px;font-weight:700;border-radius:5px;">Rejected</span>`;
    }

    function to_Update_Color_green(id) {
      // alert("green");
      document.getElementById("status_" + id).innerHTML = `<span style="background-color:green;color:white;padding:5px;font-weight:700;border-radius:5px;">Approved</span>`;
    }


    function reject_listing(id) {
      show_preloader();
      $.ajax({
        url: "./reject_listing.php",
        type: "POST",
        data: {
          type: "reject",
          id: id,
        },
        success: function(result) {
          console.log(result);
          console.log("reject " + id);
          hide_preloader();
          to_Update_Color_red(id);
        }
      });
    }

    $(document).ready(function() {
      $('#myTable').DataTable();
      responsive: true
    });

    $('#loader')
      .hide() // Hide it initially
      .ajaxStart(function() {
        $(this).show();
      })
      .ajaxStop(function() {
        $(this).hide();
      });
  </script>
</body>

</html>