<?php

$slave_id = $_SESSION['slave_id'];

$default_listing_query = "SELECT  * FROM `listing` WHERE `listing_owner_id` = $slave_id ";
$default_listing_result = mysqli_query($connect, $default_listing_query);
$default_listing_count  = mysqli_num_rows($default_listing_result);
// echo $default_listing_count;

$active_listing_query = "SELECT  * FROM `listing` WHERE `listing_status` LIKE 'Active' AND `listing_owner_id` = $slave_id  ";
// SELECT * FROM `listing` WHERE `listing_status` LIKE 'active' AND `listing_owner_id` = 166
$active_listing_result = mysqli_query($connect, $active_listing_query);
$active_listing_count  = mysqli_num_rows($active_listing_result);
// echo $active_listing_count;

$pending_listing_query = "SELECT  * FROM `listing` WHERE `listing_status` LIKE 'Pending' AND `listing_owner_id` = $slave_id  ";
$pending_listing_result = mysqli_query($connect, $pending_listing_query);
$pending_listing_count  = mysqli_num_rows($pending_listing_result);
// echo $pending_listing_count;

$expired_listing_query = "SELECT  * FROM `listing` WHERE `listing_status` LIKE 'Expired' AND `listing_owner_id` = $slave_id ";
$expired_listing_result = mysqli_query($connect, $expired_listing_query);
$expired_listing_count  = mysqli_num_rows($expired_listing_result);
// echo $expired_listing_count;

?>

<header id="header_part" class="fixed fullwidth_block dashboard">
  <div id="header" class="not-sticky">
    <div class="container">
      <div class="utf_left_side">
        <div id="logo">
        <a href="../index.php" style="font-size:20px;padding:10px"><img src="../images/" alt="" />𝕌𝕕𝕪𝕒𝕞𝕚𝕊𝕒𝕙𝕒𝕪𝕒𝕜</a>

<a href="../index.php" class="dashboard-logo" style="color:#fff;font-size:20px;padding:20px"><img src="../images/" alt="" />𝕌𝕕𝕪𝕒𝕞𝕚𝕊𝕒𝕙𝕒𝕪𝕒𝕜</a>
        </div>
        <div class="mmenu-trigger">

        </div>

        <div class="clearfix"></div>
      </div>
      <div class="utf_right_side">
        <div class="header_widget">
          <!-- <div class="dashboard_header_button_item has-noti js-item-menu">
            <i class="sl sl-icon-bell"></i>
            <div class="dashboard_notifi_dropdown js-dropdown">
              <div class="dashboard_notifi_title">
                <p>You Have 2 Notifications</p>
              </div>

              <div class="dashboard_notifi_item">
                <div class="bg-c1 red">
                  <i class="fa fa-check"></i>
                </div>
                <div class="content">
                  <p>
                    Your Listing <b>Burger House (MG Road)</b> Has Been
                    Approved!
                  </p>
                  <span class="date">2 hours ago</span>
                </div>
              </div>

              <div class="dashboard_notifi_item">
                <div class="bg-c1 green">
                  <i class="fa fa-envelope"></i>
                </div>
                <div class="content">
                  <p>You Have 7 Unread Messages</p>
                  <span class="date">5 hours ago</span>
                </div>
              </div>


              <div class="dashboard_notify_bottom text-center pad-tb-20">
                <a href="./dashboard_notification.php">View All Notification</a>
              </div>


            </div>
          </div> -->
          <div class="utf_user_menu">
            <div class="utf_user_name">
              <span><img src="<?php
              if (false) {
                if ($_SESSION['slave_image_url'] != "") {
                  echo $_SESSION['slave_image_url'];
                }
              } else {
                if (isset($_SESSION['slave_image']) && $_SESSION['slave_image'] != "") {
                  echo "../wp-content/uploads/data/" . $_SESSION['slave_image'];
                } else {
                  echo "../wp-content/uploads/data/dashboard-avatar.jpg";
                }
              }
              ?>" 
              
              alt="" /></span>
              <!-- <span><img src="../wp-content/uploads/data/dashboard-avatar.jpg" alt="" /></span> -->
              <!-- <span><img src="../wp-content/uploads/data/dummy_profile_img.webp" alt="" /></span
                      >Hi, John! -->
            </div>
            <ul>
              <li>
                <a href="dashboard.php"><i class="sl sl-icon-layers"></i> Dashboard</a>
              </li>
              <li>
                <a href="dashboard_my_profile.php"><i class="sl sl-icon-user"></i> My Profile</a>
              </li>
              <li>
                <a href="dashboard_my_listing.php"><i class="sl sl-icon-list"></i> My Listing</a>
              </li>
              <!-- <li>
                <a href="dashboard_messages.php"><i class="sl sl-icon-envelope-open"></i> Messages</a>
              </li>
              <li>
                <a href="dashboard_bookings.php"><i class="sl sl-icon-docs"></i> Booking</a>
              </li> -->
              <li>
                <a href="../logout/index.php"><i class="sl sl-icon-power"></i> Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>