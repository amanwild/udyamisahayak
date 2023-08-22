<header id="header_part" class="fullwidth">
  <!-- <img style="margin-top: -14px; margin-left: 10px;" class="img-responsive" src="images/logomgiri.jpg" alt="Classiera Classifieds Ads WordPress Theme"> -->
  <div class="image-container">
    <!-- <img class="img-responsive" src="images/mgirilogo2.png" alt="Logo"> -->
  </div>
  <div id="header">
    <div class="container">
      <div class="utf_left_side">
        <!-- <div id="logo"> <a href="index.php" style="cursor:pointer">𝕌𝕕𝕪𝕒𝕞𝕚𝕊𝕒𝕙𝕒𝕪𝕒𝕜</a> </div> -->
        <div id="logo"> <a href="index.php" style="cursor:pointer"> <img src='./images/mgiri.png' style="padding:5px;max-height:40px;width:auto;"></img>
          </a> </div>
        <div class="mmenu-trigger">
          <button class="hamburger utfbutton_collapse" type="button">
            <span class="utf_inner_button_box">
              <span class="utf_inner_section"></span>
            </span>
          </button>
        </div>
        <nav id="navigation" class="style_one">
          <ul id="responsive">
            <li><a id="navbar_tab_home" href="index.php">Home</a>
            </li>
            <?php
            $select_category_query = "SELECT * FROM `category` where category_id in (132,131) ORDER BY category_since DESC"; //NOTE: here (`) is not equal to (')
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
                $select_listing_count_query = "SELECT * FROM `listing` where listing_permission LIKE 'Approved' and listing_business_category_id = " . $row["category_id"]; //NOTE: here (`) is not equal to (')
                try {
                  $select_listing_count_result = 0;
                  if ($connect) {
                    $select_listing_count_result = mysqli_query($connect, $select_listing_count_query);
                    if ($select_listing_count_result) {
                      $num_for_listing_count = mysqli_num_rows($select_listing_count_result);
                    }
                  }
                } catch (Exception $e) {
                  $mess = $e->getMessage();
                }
            ?>
                <li><a id="navbar_tab_<?= $row['category_id'] ?>" href="./sub_category.php?category_id=<?php echo $row["category_id"]; ?>"> <?= $row['category_name'] ?></a></li>
            <?php }
            }
            ?>
            <li><a id="navbar_tab_about" href="page_about.php">About Us</a></li>
            <li><a id="navbar_tab_contact" href="contact.php">Contact</a></li>
            <li><a id="navbar_tab_admin_panel" href="./admin_panel/dashboard.php" class="button border with-icon"> Admin Panel</a></li>
          </ul>
        </nav>
        <div class="clearfix"></div>
      </div>
      <div class="utf_right_side">
        <div class="header_widget">
          <a href="./logout/index.php" class="button border sign-in "><i class="fa fa-sign-in"></i> Logout</a>
          <!-- <a href="./register.php" class="button border "><i class="sl sl-icon-user"></i> Register</a> -->
        </div>
      </div>
    </div>
  </div>
</header>