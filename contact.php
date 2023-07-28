<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/add_listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:43:50 GMT -->

<head>
    <?php
    include "validation_of_session.php";
    include "./service/db.php";
    if (isset($_POST['Submit'])) {

        // Name: Aman Sahu
        // Email: amansahu1130@gmail.com
        // Mobilenno: 8669889436
        // Subject: no
        // Message: ddssa
        // Submit: Submit
        // Submit: 

        $Name = isset($_POST['Name']) ? $_POST['Name'] : '';
        $Email = isset($_POST['Email']) ? $_POST['Email'] : '';
        $Subject = isset($_POST['Subject']) ? $_POST['Subject'] : '';
        $Mobilenno = isset($_POST['Mobilenno']) ? $_POST['Mobilenno'] : '';
        $Message = isset($_POST['Message']) ? $_POST['Message'] : '';

        try {
            $sql = "INSERT INTO `contact_us` (`contact_id`, `contact_name`, `contact_email`, `contact_subject`, `contact_phone`, `contact_message`) VALUES (NULL, '$Name', '$Email','$Subject','$Mobilenno','$Message')";
            // echo $sql;
            $result = mysqli_query($connect, $sql);
        } catch (Exception $e) {
            echo $e;
        }

        if ($result) {
            echo "<script>alert('Contact Form submitted Successfully');</script>";
        } else {

            echo "<script>alert('Contact Form submition Failed ');</script>";
        }
    }


    ?>


    <meta name="author" content="">
    <meta name="description" content="">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us : Udyamisahayak</title>

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
        <?php include "./header/global_header.php"; ?>
        <script>
            document.getElementById("navbar_tab_contact").classList.add("current");
        </script>

        <div class="clearfix"></div>

        <div id="titlebar" class="gradient" style="margin-bottom:0px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Contact Us</h2>
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li>Contact Us</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <section class="fullwidth_block padding-bottom-70" data-background-color="">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="headline_part centered margin-top-80">Contact Us <span class="margin-top-10"></span> </h2>
                    </div>
                </div>
                <div class="row container_icon">
                    <div class=" col-xs-12">
                        <div class="box_icon_two box_icon_with_line"> <i class="im im-icon-Administrator"></i>
                            <h3>Director</h3>
                            <h4>Mahatma Gandhi Institute for Rural Industrialization</h4>
<h4>Maganwadi, Wardha, Maharashtra - 442 001, India.</h4>
<h4>Email: director.mgiri@gmail.com</h4>
<h4>Phone: 07152-253512/13[O], 253513[direct]</h4>
<h4>Fax: 07152-240328</h4>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <div class="container margin-bottom-75">
            <div class="row">
                <div class="col-lg-12">
                    <div id="utf_add_listing_part">

                        <form method="post" action="">
                            <div class="add_utf_listing_section margin-top-45">
                                <div class="utf_add_listing_part_headline_part">
                                    <h3><i class="sl sl-icon-list"></i>Contact Form</h3>
                                </div>
                                <div class="row with-forms">
                                    <div class="col-md-6">
                                        <h5>Full Name</h5>
                                        <input type="text" placeholder="Name" name="Name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Email</h5>
                                        <input type="email" placeholder="Email" name="Email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Phone no.</h5>
                                        <input type="tel" placeholder="Your phone number" name="Mobilenno" required>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Subject</h5>
                                        <input type="text" placeholder="Subject" name="Subject" required>
                                    </div>
                                    <div class="col-md-12">
                                        <h5>Message</h5>
                                        <textarea name="Message" cols="40" rows="3" id="description" placeholder="Type Your Message Here..." spellcheck="true" required></textarea>
                                    </div>
                                </div>
                                <input type="submit" name="Submit" value="Submit" />
                            </div>
                            <input type="hidden" name="Submit" value="" />


                        </form>



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
        <script src="scripts/bootstrap-select.min.js"></script>
        <script src="scripts/magnific-popup.min.js"></script>
        <script src="scripts/jquery-ui.min.js"></script>
        <script src="scripts/mmenu.js"></script>
        <script src="scripts/tooltips.min.js"></script>
        <script src="scripts/color_switcher.js"></script>
        <script src="scripts/jquery_custom.js"></script>



        <!-- Maps -->
        <script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
        <script src="scripts/infobox.min.js"></script>
        <script src="scripts/markerclusterer.js"></script>
        <script src="scripts/maps.js"></script>
        <script>
            $(".utf_opening_day.utf_js_demo_hours .utf_chosen_select").each(function() {
                $(this).append('' +
                    '<option></option>' +
                    '<option>Closed</option>' +
                    '<option>1 AM</option>' +
                    '<option>2 AM</option>' +
                    '<option>3 AM</option>' +
                    '<option>4 AM</option>' +
                    '<option>5 AM</option>' +
                    '<option>6 AM</option>' +
                    '<option>7 AM</option>' +
                    '<option>8 AM</option>' +
                    '<option>9 AM</option>' +
                    '<option>10 AM</option>' +
                    '<option>11 AM</option>' +
                    '<option>12 AM</option>' +
                    '<option>1 PM</option>' +
                    '<option>2 PM</option>' +
                    '<option>3 PM</option>' +
                    '<option>4 PM</option>' +
                    '<option>5 PM</option>' +
                    '<option>6 PM</option>' +
                    '<option>7 PM</option>' +
                    '<option>8 PM</option>' +
                    '<option>9 PM</option>' +
                    '<option>10 PM</option>' +
                    '<option>11 PM</option>' +
                    '<option>12 PM</option>');
            });
        </script>
        <script src="scripts/dropzone.js"></script>
</body>

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/add_listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:43:50 GMT -->

</html>