<?php include "../validation_of_admin.php" ?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_my_listing.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:50 GMT -->

<head>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="images/favicon.png">
  <!-- Style CSS -->
  <link rel="stylesheet" href="../css/stylesheet.css">
  <link rel="stylesheet" href="../css/mmenu.css">
  <link rel="stylesheet" href="../css/perfect-scrollbar.css">
  <link rel="stylesheet" href="../css/style.css" id="colors">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css">

</head>

<body>


  <?php include "./component/preloader.php" ?>
  <?php include "../service/pick_ago_time.php" ?>


  <!-- Wrapper -->
  <div id="main_wrapper">
    <?php include "./component/header.php" ?>

    <div class="clearfix"></div>

    <!-- Dashboard -->
    <div id="dashboard">
      <?php include "./component/user_sidebar_navbar.php" ?>
      <script>
        var d = document.getElementById("user_dashboard_user_management");
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
                  <li>
                    <!-- array(14) {
  ["user_username"]=>
  string(5) "admin"
  ["user_id"]=>
  string(2) "62"
  ["user_type"]=>
  string(5) "admin"
  ["user_first_name"]=>
  string(5) "admin"
  ["user_last_name"]=>
  string(5) "admin"
  ["user_email"]=>
  string(19) "sahu98272@gmail.com"
  ["user_phone"]=>
  string(10) "8669989436"
  ["user_image"]=>
  string(20) "dashboard-avatar.jpg"
  ["enquery_email"]=>
  string(0) ""
  ["enquery_phone"]=>
  string(0) ""
  ["enquery_id"]=>
  string(0) ""
  ["is_verified_email"]=>
  string(1) "1"
  ["user_request_for_seller"]=>
  string(1) "0"
  ["is_verified_admin"]=>
  string(1) "1" -->

  <!-- array(13) {
  ["user_username"]=>
  string(5) "admin"
  ["user_id"]=>
  string(2) "62"
  ["user_type"]=>
  string(5) "admin"
  ["user_first_name"]=>
  string(4) "Aman"
  ["user_last_name"]=>
  string(4) "Sahu"
  ["user_email"]=>
  string(19) "sahu98272@gmail.com"
  ["user_phone"]=>
  string(10) "8669989436"
  ["user_image"]=>
  string(20) "dashboard-avatar.jpg"
  ["enquery_email"]=>
  string(0) ""
  ["enquery_phone"]=>
  string(0) ""
  ["enquery_id"]=>
  string(0) ""
  ["is_verified_email"]=>
  string(1) "1"
  ["user_request_for_seller"]=>
  string(1) "0"
} -->

  <?php 
  // echo"<pre>";
  // var_dump($_SESSION) ;
  // echo"<pre>";
  ?>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div>
          <div class="row ">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
              <h1 class=" my-auto mr-auto d-inline"> User Management</h1>

            </div>
            <div class="col-md-4 ml-auto">

              <div class="my-auto mr-auto " style="    margin: auto;
    padding-top: 20px;">
                <button type="button" style="padding:10px !important;" class="button" onclick="window.location.href='./adduser.php'">Add User
                </button>
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
               
                <br>
                <div class="table-responsive" style="border:3px solid grey;padding:5px;">
                  <table data-role="table" class="table ui-responsive datatable  " id="myTable">
                    <thead>
                      <tr>
                        <th class="checkBoxOption" style="display:none;width: 77px !important;"><input id="check_all" type="checkbox" value="all" style="width: 205px !important;"><label for="check_all"></label></th>
                        <th class="tbl_head" scope="col">Sr. No.</th>
                        <th class="tbl_head" scope="col">Username </th>
                        <th class="tbl_head" scope="col">First Name </th>
                        <th class="tbl_head" scope="col">Last Name </th>
                        <th class="tbl_head" scope="col">Phone</th>
                        <th class="tbl_head" scope="col">Email</th>
                        <th class="tbl_head" scope="col">Since</th>
                        <th class="tbl_head" scope="col">User Type</th>
                        <th class="tbl_head" scope="col">Status</th>

                        <th class="tbl_head" scope="col" style="width:110px;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $select_user_query = "SELECT * FROM `users_entries` WHERE is_verified_email = 1 ORDER BY `users_entries`.`user_timestamp` DESC";
                      // echo$fname,$lname;
                      try {
                        $select_user_result = mysqli_query($connect, $select_user_query);
                        $num  = mysqli_num_rows($select_user_result);
                      } catch (Exception $e) {
                        $mess = $e->getMessage();
                      }
                      if ($num > 0) {
                        $sno = 0;
                        while ($row = mysqli_fetch_assoc($select_user_result)) {
                          $sno += 1;
                      ?>
                          <tr id="row_<?= $row['user_id'] ?>" class="row_by_id" style="">

                            <td style="display:none;padding: 0px 0px;" class="checkBoxOption"><label for="reg_<?= $row["user_id"] ?>" class="check_container">
                                <input type="checkbox" name="row-check" id="reg_<?= $row["user_id"] ?>" value="<?= $row["user_id"] ?>">
                                <span class="checkmark_for_select text-center" style="padding-right:10px !important;width:100%;"></span>
                              </label>
                            </td>

                            <td><?= $sno ?></td>
                            <td><?= $row["user_username"] ?></td>
                            <td><?= $row["user_first_name"] ?></td>
                            <td><?= $row["user_last_name"] ?></td>
                            <td><?= $row["user_phone"] ?></td>
                            <td><?= $row["user_email"] ?></td>
                            <td><?= $row["user_timestamp"] ?></td>
                            <td><?php if ($row["user_type"] == 'user') {
                                  echo 'Seller';
                                }
                                else if ($row["user_type"] == 'buyer') {
                                  echo 'Buyer';
                                } else {

                                  echo $row['user_type'];
                                } ?></td>
                            <td id="status_<?= $row["user_id"] ?>">
                              <?php
                              if ($row["is_verified_admin"]) {
                                echo "<span style='background-color:green;color:white;padding:5px;font-weight:700;border-radius:5px;'>Approved</span>";
                              } else {
                                echo "<span style='background-color:red;color:white;padding:5px;font-weight:700;border-radius:5px;'>Rejected</span>";
                              }
                              ?></td>
                            <td class="text-center">
                              <a href="../user_management_panel/dashboard.php?slave_id=<?= $row['user_id'] ?>" type="button" style="cursor: pointer;width:50px;margin-right:0px;font-size:25px !important;" id="approve_<?= $row["loc_id"] ?>" class="d-inline edit table_edit_btn"> 📝</a>
                            </td>
                          </tr>
                      <?php
                        }
                      } else {
                        echo "<tr><td class='text-center' colspan='6'>No New Registration Found</td></tr>";
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
    <script src="../scripts/jquery-3.4.1.min.js"></script>
    <script src="../scripts/chosen.min.js"></script>
    <script src="../scripts/perfect-scrollbar.min.js"></script>
    <script src="../scripts/slick.min.js"></script>
    <script src="../scripts/rangeslider.min.js"></script>
    <script src="../scripts/magnific-popup.min.js"></script>
    <script src="../scripts/jquery-ui.min.js"></script>
    <script src="../scripts/mmenu.js"></script>
    <script src="../scripts/tooltips.min.js"></script>
    <script src="../scripts/color_switcher.js"></script>
    <script src="../scripts/jquery_custom.js"></script>
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
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->
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