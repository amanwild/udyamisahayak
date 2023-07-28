<ul>
  <?php 
  
  $default_listing_query = "SELECT  * FROM `listing` ";
  $default_listing_result = mysqli_query($connect, $default_listing_query);
  $default_listing_count  = mysqli_num_rows($default_listing_result);
  
  ?>
  <li><a href="admin_all_listing.php">Default <span class="nav-tag "><?= $default_listing_count ?></span></a></li>
 <?php

  $active_listing_query = "SELECT  * FROM `listing` WHERE `listing_status` LIKE 'Active'";
  $active_listing_result = mysqli_query($connect, $active_listing_query);
  $active_listing_count  = mysqli_num_rows($active_listing_result);


  $pending_listing_query = "SELECT  * FROM `listing` WHERE `listing_status` LIKE 'Pending'";
  $pending_listing_result = mysqli_query($connect, $pending_listing_query);
  $pending_listing_count  = mysqli_num_rows($pending_listing_result);

  $email_pending_listing_query = "SELECT  * FROM `listing` WHERE `listing_status` LIKE 'Expired'";
  $email_pending_listing_result = mysqli_query($connect, $email_pending_listing_query);
  $email_pending_listing_count  = mysqli_num_rows($email_pending_listing_result);
  
?>
 
  <li><a href="admin_all_listing.php?filter=active">Active <span class="nav-tag green"><?= $active_listing_count ?></span></a></li>
  <li><a href="admin_all_listing.php?filter=pending">Pending <span class="nav-tag yellow"><?= $pending_listing_count ?></span></a></li>
  <li><a href="admin_all_listing.php?filter=expired">Expired <span class="nav-tag red"><?= $email_pending_listing_count  = mysqli_num_rows($email_pending_listing_result);
 ?></span></a></li>
</ul>