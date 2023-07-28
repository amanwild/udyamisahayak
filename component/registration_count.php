<ul>
  <?php 
  
  $default_registration_query = "SELECT  * FROM `users_entries`  WHERE `user_type` LIKE 'user' ";
  $default_registration_result = mysqli_query($connect, $default_registration_query);
  $default_registration_count  = mysqli_num_rows($default_registration_result);
  
  ?>
  <li><a href="admin_all_registration.php">Default <span class="nav-tag "><?= $default_registration_count ?></span></a></li>
 <?php

  $approved_registration_query = "SELECT  * FROM `users_entries` WHERE `is_verified_email` LIKE '1' AND `is_verified_admin` LIKE '1'";
  $approved_registration_result = mysqli_query($connect, $approved_registration_query);
  $approved_registration_count  = mysqli_num_rows($approved_registration_result);


  $pending_registration_query = "SELECT  * FROM `users_entries` WHERE `is_verified_email` LIKE '1' AND `is_verified_admin` LIKE '0'";
  $pending_registration_result = mysqli_query($connect, $pending_registration_query);
  $pending_registration_count  = mysqli_num_rows($pending_registration_result);

  $email_pending_registration_query = "SELECT  * FROM `users_entries` WHERE `is_verified_email` LIKE '0' AND `is_verified_admin` LIKE '0'";
  $email_pending_registration_result = mysqli_query($connect, $email_pending_registration_query);
  $email_pending_registration_count  = mysqli_num_rows($email_pending_registration_result);
  
?>
 
  <li><a href="admin_all_registration.php?filter=approved">Approved <span class="nav-tag green"><?= $approved_registration_count ?></span></a></li>
  <li><a href="admin_all_registration.php?filter=pending">Pending <span class="nav-tag yellow"><?= $pending_registration_count ?></span></a></li>
  <li><a href="admin_all_registration.php?filter=email_pending">Email verification Pending<span class="nav-tag red"><?= $email_pending_registration_count ?></span></a></li>
</ul>