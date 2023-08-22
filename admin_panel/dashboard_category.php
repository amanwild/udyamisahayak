<?php include "../validation_of_admin.php" ?>

<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_add_listing.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:50 GMT -->

<head>
  <meta name="author" content="" />
  <meta name="description" content="" />

  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Lisiting</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="../images/favicon.png" />
  <!-- Style CSS -->
  <link rel="stylesheet" href="../css/stylesheet.css" />
  <link rel="stylesheet" href="../css/mmenu.css" />
  <link rel="stylesheet" href="../css/perfect-scrollbar.css" />
  <link rel="stylesheet" href="../css/style.css" id="colors" />
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css" />
</head>

<body onload="validate_user()">

  <?php include "./component/preloader.php" ?>

  <!-- Wrapper -->
  <div id="main_wrapper">
    <?php include "./component/header.php" ?>
    <div class="clearfix"></div>

    <!-- Dashboard -->
    <div id="dashboard">
      <?php include "./component/user_sidebar_navbar.php" ?>

      <script>
        var d = document.getElementById("user_dashboard_category");
        d.className += "active";
      </script>

      <!-- Content -->
      <div class="utf_dashboard_content">
        <div id="titlebar" class="dashboard_gradient">
          <div class="row">
            <div class="col-md-12">
              <h2>Category</h2>
              <nav id="breadcrumbs">
                <ul>
                  <li><a href="index_1.php">Home</a></li>
                  <li><a href="dashboard.php">Dashboard</a></li>
                  <li>Category</li>
                  <!-- <li> -->

                  <!-- </li> -->
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <?php


        if (isset($_POST["delete_category"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
          $category_id = $_POST["category_id"];
          $delete_query = "DELETE FROM `category` WHERE `category`.`category_id` = $category_id";
          $delete_result = mysqli_query($connect, $delete_query);
          if ($delete_result) {
            echo '<div class="row"> <div class="col-md-12"> <div class="notification success closeable margin-bottom-30"> <p> Category Deleted Successfully!!! </p> <a class="close" href="#"></a> </div> </div> </div>'; // echo ("<br> email shooting successfull <br>");

          }
        }




        $select_query = "SELECT * FROM `category` ORDER BY `category`.`category_since` DESC"; //NOTE: here (`) is not equal to (')
        try {
          $select_result = 0;
          if ($connect) {
            $select_result = mysqli_query($connect, $select_query);
            if ($select_result) {
              $num = mysqli_num_rows($select_result);
            }
          }
        } catch (Exception $e) {
          $mess = $e->getMessage();
        }
        ?>


        <div id="main" class="">
          <div class="allContent-section container   pt-0" style="margin-bottom: 20px;">

            <div class=" my-1">
              <div id="showLocatonContent" class="d-flex text-center mt-3 ">
                <div class="" style="display:flex;text-align:center; ">
                  <h1 style="margin-right:auto;padding-right:0%;z-index:999;">All Category</h1>
                  <button type="button" style="float:left" class="button border" onclick="window.location.href='./addcategory.php'">Add Category
                  </button>
                </div>

              </div>
              <br>
              <div class="table-responsive" style="border:3px solid grey;padding:5px;margin:10px;">
                <table data-role="table" class="table ui-responsive" id="myTable">
                  <thead>
                    <tr>
                      <th scope="col">Sr. No.</th>
                      <th scope="col">Category Name</th>
                      <th scope="col">Color</th>
                      <th scope="col">Sub-Category</th>
                      <th scope="col">Image</th>
                      <th scope="col">Products</th>

                      <th scope="col" style="width:110px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    if ($num > 0) {
                      $sno = 0;
                      //Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
                      while ($row = mysqli_fetch_assoc($select_result)) {
                        $sno += 1;

                    ?>

                        <tr>
                          <td><?= $sno ?></td>
                          <td><?= $row['category_name'] ?></td>
                          <td><?= $row['category_color'] ?></td>

                          <td> <select name="category_subcategory" id="category_subcategory" style="padding:5px !important;width:auto;padding:5px;margin-bottom:0px; height:32px;" class="p-1">

                              <?php

                              $select_sub_category_query = "SELECT * FROM category left join sub_category on category.category_id = sub_category.sub_category_category_id where category.category_id = " . $row['category_id']; //NOTE: here (`) is not equal to (')
                              try {
                                $select_sub_category_result = 0;
                                if ($connect) {
                                  $select_sub_category_result = mysqli_query($connect, $select_sub_category_query);
                                  if ($select_sub_category_result) {
                                    $num_for_sub_category = mysqli_num_rows($select_sub_category_result);
                                  }
                                }
                              } catch (Exception $e) {
                                $mess = $e->getMessage();
                              }

                              if ($num_for_sub_category > 0) {
                                while ($row_for_sub_category = mysqli_fetch_assoc($select_sub_category_result)) {
                                  echo '<option style="font-size:17px !important;margin-bottom:0px;padding:15px;height:32px;" value="' . $row_for_sub_category['sub_category_id'] . '">' . $row_for_sub_category['sub_category_name'] . ' </option>';
                                  // echo($string);
                                }
                              }
                              ?>
                            </select></td>
                          <td><img src="../images/<?= $row['category_image'] ?>" class="rounded-circle img-fluid" style="object-fit:cover;max-width: 32px;height: auto;" class="mr-3 p-1" alt="." /></td>
                          <td>100</td>
                          <td class="text-center">

                            <button type="submit" onclick="window.location.href='./editcategory.php?cat_id=<?= $row['category_id'] ?>'" class="d-inlineedit table_edit_btn " style="border:none;background-color:transparent;font-size:inherit;">📝</button>

                            <form enctype="multipart/form-data" onsubmit="return confirm('Are you sure? you want to Delete Category!');" method="POST" style="display:inline-block" action="<?= $_SERVER["REQUEST_URI"]; ?>">
                              <input type="hidden" id="category_id" name="category_id" value="<?= $row['category_id'] ?>" />
                              <input type="hidden" id="delete_category" name="delete_category" value="true" />

                              <button type="submit" class="d-inline delete table_delete_btn " style="border:none;background-color:transparent;font-size:inherit;">❌</button>
                            </form>
                          </td>
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
  <script src="../scripts/jquery-3.4.1.min.js"></script>
  <script src="../scripts/chosen.min.js"></script>
  <script src="../scripts/perfect-scrollbar.min.js"></script>
  <script src="../scripts/slick.min.js"></script>
  <script src="../scripts/rangeslider.min.js"></script>
  <script src="../scripts/bootstrap-select.min.js"></script>
  <script src="../scripts/magnific-popup.min.js"></script>
  <script src="../scripts/jquery-ui.min.js"></script>
  <script src="../scripts/mmenu.js"></script>
  <script src="../scripts/tooltips.min.js"></script>
  <script src="../scripts/color_switcher.js"></script>
  <script src="../scripts/jquery_custom.js"></script>

  <!-- Maps -->
  <script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
  <script src="../scripts/infobox.min.js"></script>
  <script src="../scripts/markerclusterer.js"></script>
  <script src="../scripts/maps.js"></script>
  <script src="../scripts/dropzone.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
      responsive: true

    });
  </script>

</body>

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_add_listing.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:50 GMT -->

</html>