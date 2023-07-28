<form action="search_result.php" method="GET">
  <div class="main_input_search_part" style="margin:0px;">
    <div class="main_input_search_part_item" >
      <input type="text" name="search_by" placeholder="What are you looking for?" value="" />
    </div>

    <div class="main_input_search_part_item intro-search-field">
      <select data-placeholder="All States" class="selectpicker default" title="All States" name="state_id" id="state" data-live-search="true" data-selected-text-format="count" data-size="7" value="">

        <?php
        $select_state_query = "SELECT * FROM `states`";
        try {
          $select_state_result = 0;
          if ($connect) {
            $select_state_result = mysqli_query($connect, $select_state_query);
            if ($select_state_result) {
              $state_num = mysqli_num_rows($select_state_result);
            }
          }
        } catch (Exception $e) {
          $mess = $e->getMessage();
        }

        if ($state_num > 0) {
          $sno = 0;
          while ($row = mysqli_fetch_assoc($select_state_result)) {
        ?>
            <option name="state_id" value="<?= $row['state_id'] ?>"><?= $row['state_name'] ?></option>
        <?php }
        }

        ?>
      </select>
    </div>

    <div class="main_input_search_part_item intro-search-field">
      <select data-placeholder="All Cities" class=" default" name="city_id" title="All Cities" id="city" data-live-search="true" data-selected-text-format="count" data-size="7" value="">
        <option name="city_id" value="">All City</option>

        <?php
        $select_city_query = "SELECT * FROM `cities` order by city_name asc";
        try {
          $select_city_result = 0;
          if ($connect) {
            $select_city_result = mysqli_query($connect, $select_city_query);
            if ($select_city_result) {
              $city_num = mysqli_num_rows($select_city_result);
            }
          }
        } catch (Exception $e) {
          $mess = $e->getMessage();
        }

        if ($city_num > 0) {
          $sno = 0;
          while ($row = mysqli_fetch_assoc($select_city_result)) {
        ?>
            <option name="city_id" value="<?= $row['city_id'] ?>"><?= $row['city_name'] ?></option>
        <?php }
        }

        ?>
      </select>
    </div>
    <div class="main_input_search_part_item intro-search-field">
      <select data-placeholder="All Categories" class="selectpicker default" name="category_id" title="All Categories" data-live-search="true" data-selected-text-format="count" data-size="7" value="">

        <?php
        $select_category_query = "SELECT * FROM `category` ORDER BY category_since DESC";
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
          while ($row = mysqli_fetch_assoc($select_category_result)) {
        ?>
            <option name="category_id" value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
        <?php }
        }

        ?>
      </select>
    </div>
    <input type="hidden" name="search" value="" />
    <button class="button">Search</button>
  </div>
</form>