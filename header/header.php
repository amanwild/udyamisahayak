<?php
//  include "../validation_of_user.php";

// if ($_SESSION['user_type'] =="user") {
// } else {
//   header("location: .././index.php");
// }

?>


<header id="header_part" class="fixed fullwidth_block dashboard">
  <div id="header" class="not-sticky">
    <div class="container">
      <div class="utf_left_side">
        <div id="logo">
          <a href="index_1.php" style="cursor:pointer"><img src="images/mgirilogo2.png" alt="" /></a>

          <a href="index_1.php" class="dashboard-logo" style="cursor:pointer"><img src="images/mgirilogo2.png" alt="" /></a>
        </div>
        <div class="mmenu-trigger">

        </div>

        <div class="clearfix"></div>
      </div>
      <div class="utf_right_side">
        <div class="header_widget">
          <div class="dashboard_header_button_item has-noti js-item-menu">
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
                <a href="#">View All Notification</a>
              </div>
            </div>
          </div>
          <div class="utf_user_menu">
            <div class="utf_user_name">
              <span><img src="<?php if($_SESSION['user_image']!=""){echo $_SESSION['user_image'] ;}else{ echo"../images/dashboard-avatar.jpg" ;}?>"  alt="" /></span>
              <!-- <span><img src="../images/dashboard-avatar.jpg" alt="" /></span> -->
              <!-- <span><img src="../images/dummy_profile_img.webp" alt="" /></span
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
              <li>
                <a href="dashboard_messages.php"><i class="sl sl-icon-envelope-open"></i> Messages</a>
              </li>
              <li>
                <a href="dashboard_bookings.php"><i class="sl sl-icon-docs"></i> Booking</a>
              </li>
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



<?php
  include "../service/db.php";
  ?>