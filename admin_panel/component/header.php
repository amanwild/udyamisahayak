<?php

$user_id = $_SESSION['user_id'];

$default_listing_count  = 0;
$default_listing_query = "SELECT  * FROM `listing`  ";
$default_listing_result = mysqli_query($connect, $default_listing_query);
if($default_listing_result){
  $default_listing_count  = mysqli_num_rows($default_listing_result);

}

$active_listing_count  = 0;
$active_listing_query = "SELECT  * FROM `listing` WHERE `listing_status` LIKE 'Active' ";
$active_listing_result = mysqli_query($connect, $active_listing_query);
if($active_listing_result){
  $active_listing_count  = mysqli_num_rows($active_listing_result);

}

$pending_listing_count  = 0;
$pending_listing_query = "SELECT  * FROM `listing` WHERE `listing_status` LIKE 'Pending' ";
$pending_listing_result = mysqli_query($connect, $pending_listing_query);
if($pending_listing_result){
  $pending_listing_count  = mysqli_num_rows($pending_listing_result);

}

$expired_listing_count  = 0;
$expired_listing_query = "SELECT  * FROM `listing` WHERE `listing_status` LIKE 'Expired'";
$expired_listing_result = mysqli_query($connect, $expired_listing_query);
if($expired_listing_result){
  $expired_listing_count  = mysqli_num_rows($expired_listing_result);

}




$total_enquery_count  = 0;
$total_enquery_query = "SELECT * FROM `enquery` left join listing on enquery.enquery_listing_id = listing.listing_id ";
$total_enquery_result = mysqli_query($connect, $total_enquery_query);
if($total_enquery_result){
  $total_enquery_count  = mysqli_num_rows($total_enquery_result);

}

$total_share_count  = 0;
$total_share_query = "SELECT * FROM `user_interaction` left join users_entries on user_interaction.interaction_on_user_id = users_entries.user_id ";
$total_share_result = mysqli_query($connect, $total_share_query);
if($total_share_result){
  $total_share_count  = mysqli_num_rows($total_share_result);

}

$total_view_count  = 0;
$total_view_query = "SELECT * FROM `user_interaction` left join users_entries on user_interaction.interaction_on_user_id = users_entries.user_id ";
$total_view_result = mysqli_query($connect, $total_view_query);
if($total_view_result){
  
  $total_view_count  = mysqli_num_rows($total_view_result);
}
// $total_view_count  = 0;
// $total_view_query = "SELECT sum(count_view) as view_count FROM ((SELECT count(views_count_id) as count_view FROM `views_count` left join users_entries where views_count.views_count_of like 'ac' ) UNION (SELECT count(views_count_id) as count_view FROM `views_count` left join listing on views_count.views_count_of_id = listing.listing_id where views_count.views_count_of like 'listing' )) as count_view";
// $total_view_result = mysqli_query($connect, $total_view_query);
// if($total_view_result){
//   while($row_for_view_count = mysqli_fetch_assoc($total_view_result)){
//     $total_view_count = $row_for_view_count['view_count'];

//   }
// }
// $total_view_count  = mysqli_num_rows($total_view_result);




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
          <style>
            /* Tooltip container */
            .tooltip {
              position: relative;
              display: inline-block;
              /* If you want dots under the hoverable text */
            }

            /* Tooltip text */
            .tooltip .tooltiptext {
              visibility: hidden;
              background-color: black;
              color: #fff;
              text-align: center;
              padding: 5px 0;
              border-radius: 6px;

              width: 120px;
              top: 100%;
              left: 50%;
              margin-left: -60px;

              /* Position the tooltip text - see examples below! */
              position: absolute;
              z-index: 9999;
            }

            /* Show the tooltip text when you mouse over the tooltip container */
            .tooltip:hover .tooltiptext {
              visibility: visible;
            }
          </style>
          <div class="utf_user_menu">
            <span class="tooltip"><?= $_SESSION['user_email'] ?><span class="tooltiptext"><?= $_SESSION['user_first_name'] ?> <?= $_SESSION['user_last_name'] ?></span></span>
            <div class="utf_user_name">
              <span><img src="
              <?php
              if (false) {
                if ($_SESSION['user_image_url'] != "") {
                  echo $_SESSION['user_image_url'];
                }
              } else {
                if (isset($_SESSION['user_image'])) {
                  echo "../images/" . $_SESSION['user_image'];
                } else {
                  echo "../images/dashboard-avatar.jpg";
                }
              }
              ?>" alt="" /></span>
              <!-- <span><img src="../images/dashboard-avatar.jpg" alt="" /></span> -->
              <!-- <span><img src="../images/dummy_profile_img.webp" alt="" /></span
                      >Hi, John! -->
            </div>
            <ul>
              <li>
                <a href="dashboard.php"><i class="sl sl-icon-layers"></i> Dashboard</a>
              </li>
              <!-- <li>
                <a href="dashboard_my_profile.php"><i class="sl sl-icon-user"></i> My Profile</a>
              </li> -->
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

<style>
    #myTable_next {
      margin-left: 10px;
      border-radius: 3px !important;
      color: white;
      background-color: #343434;
      padding: 5px;
      cursor: pointer;
    }

    #myTable_previous {
      margin-right: 10px;
      border-radius: 3px !important;
      color: white;
      background-color: #343434;
      padding: 5px;
      cursor: pointer;
    }

    .paginate_button {
      margin-right: 10px;
      border-radius: 3px !important;
      color: white;
      background-color: #343434;
      padding: 5px;
      cursor: pointer;
    }

    .paginate_button:hover {
      margin-right: 10px;
      border-radius: 3px !important;
      color: #343434;
      background-color: white;
      padding: 5px;
      cursor: pointer;
    }

    .ellipsis {
      margin-right: 10px;
      border-radius: 3px !important;
      /* color: white;
    background-color: #343434; */
      padding: 5px;
      cursor: pointer;
    }

    .current {
      margin-right: 10px;
      border-radius: 3px !important;
      color: white;
      background-color: #757575;
      padding: 5px;
      cursor: pointer;
    }
  </style>