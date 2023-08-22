<?php include "../validation_of_admin.php";


?>
<?php
if (isset($_POST['edit_sub_category'])) {

    $category_id = "";
    if (isset($_POST['category_id'])) {
        $category_id = $_POST['category_id'];
    }

    foreach ($_FILES as $key => $data) {
        $sub_category_image = "";
        // $sub_category_image = $data;
        $sub_category_id = substr($key, 10);
        
        
        if (isset($_FILES[$key])) {
            if ("" != $_FILES[$key]["tmp_name"]) {
                $sub_category_image = get_server_image_name($key);
            }
        }
        
        // echo $sub_category_id . " -> " . $sub_category_image . "<br>";
        
        
        if ((strpos($key, "logo") !== false) && $sub_category_image != "") {
            unlink_img('sub_category_image', 'sub_category', 'sub_category_id', $sub_category_id, $connect);

            // echo $key . " -> " . $data . "<br>";
            // echo $key . " -> " . $data . "<br>";
            
           

            $update_sub_category_query = "UPDATE `sub_category` SET `sub_category_image` = '$sub_category_image' WHERE `sub_category`.`sub_category_id` = $sub_category_id ";
            // echo $update_sub_category_query ;
            // echo "<br>";
            try {
                $update_sub_category_result = mysqli_query($connect, $update_sub_category_query);
            } catch (Exception $e) {
                // echo "Data insertion failed " . "<br>";
                // echo 'Message: ' . $e->getMessage() . "<br>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="author" content="" />
    <meta name="description" content="" />

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Listing</title>

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
                var d = document.getElementById("user_dashboard_edit_sub_category");
                d.className += "active";
            </script>

            <!-- Content -->
            <div class="utf_dashboard_content">
                <div id="titlebar" class="dashboard_gradient">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Add Listing</h2>
                            <nav id="breadcrumbs">
                                <ul>
                                    <li><a href="index_1.php">Home</a></li>
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li>Add Listing</li>
                                    <!-- <li> -->

                                    <!-- </li> -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">

                        <div id="utf_add_listing_part">
                            <form enctype="multipart/form-data" method="POST" action="<?= $_SERVER["REQUEST_URI"]; ?>">
                                <input type="hidden" name="edit_sub_category" id="edit_sub_category" value="edit_sub_category" />
                                <div class="add_utf_listing_section margin-top-45" validate>
                                    <div class="utf_add_listing_part_headline_part">
                                        <h3><i class="sl sl-icon-tag"></i> Categories & Tags</h3>
                                    </div>

                                    <div class="row with-forms">

                                        <div class="col-md-12">
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
                                        <!-- <div class="col-md-6">
                                            <label for="">Sub-Category</label>
                                            <div class="intro-search-field utf-chosen-cat-single">
                                                <select class=" default" name="sub_category_id" style="margin-bottom:0px" id="sub-category" data-selected-text-format="count" data-size="7" title="Select Sub-Category" required>

                                                </select>
                                            </div>
                                        </div> -->
                                    </div>



                                    <div class="add_utf_listing_section margin-top-45">
                                        <div class="utf_add_listing_part_headline_part">
                                            <h3><i class="sl sl-icon-picture"></i>Set Sub Category Images</h3>
                                        </div>
                                        <div class="row with-forms" id="sub_category_images">
                                        </div>
                                    </div> <!-- <a href="#" class="button preview">Save </a> -->
                                    <button type="submit" class="button preview" id="submit">Save</button>
                            </form>
                        </div>
                    </div>
                    <?php include "./component/footer.php" ?>
                </div>
                <!-- </div> -->

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

    <script>
        $(document).ready(function() {
            $('#sub-category').html('<option value="">Select Category First</option>');
            // $('#state').append('<option value="">Select State</option>');
            $('#city').html('<option value="">Select State First</option>');
            $('#category').on('change', function() {
                // alert("hello");
                var category_id = this.value;
                $.ajax({
                    url: "sub_category_image_by_category.php",
                    type: "POST",
                    data: {
                        category_id: category_id
                    },
                    cache: false,
                    success: function(result) {
                        // alert("hello");
                        // $("#sub-category").html(result);
                        $("#sub_category_images").html(result);
                        console.log(result);
                    }
                });
            });

        });
    </script>
    <script>
        (function($) {
            try {
                var jscr1 = $(".js-scrollbar");
                if (jscr1[0]) {
                    const ps1 = new PerfectScrollbar(".js-scrollbar");
                }
            } catch (error) {
                console.log(error);
            }
        })(jQuery);
    </script>

    <!-- Style Switcher -->

    <!-- Maps -->
    <script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script src="../scripts/infobox.min.js"></script>
    <script src="../scripts/markerclusterer.js"></script>
    <script src="../scripts/maps.js"></script>
    <script src="../scripts/dropzone.js"></script>
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
</body>

</html>