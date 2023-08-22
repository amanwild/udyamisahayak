<?php include "../validation_of_admin.php" ?>
<?php
// echo"here";

$category_id = $_POST["category_id"];
$result = mysqli_query($connect, "SELECT * FROM sub_category where sub_category_category_id = $category_id");
?>
<?php
// echo"SELECT * FROM sub_category where category_id = $category_id";
while ($row = mysqli_fetch_array($result)) {
?>

    <!-- <div class="utf_submit_section col-md-4">
        <h4>Logo</h4>
        <div class="">
            <input type="file" name="category_image" id="category_image">
        </div>
        <div class="">
            <img style="" class="dropzone" name="view_logo_image" id="view_logo_image" src="../images/" />
        </div>
        </input>
    </div> -->

    <div class="" style="margin-top:1px">
        <div class="utf_submit_section col-md-3" style="padding:1px;margin:0px;border:solid #ffd5d5 1px;">

            <h4><b><?php echo $row["sub_category_name"]; ?> </b>Logo</h4>
            <div class="">
                <input type="file" name="logo_image<?php echo $row["sub_category_id"]; ?>" id="logo_image<?php echo $row["sub_category_id"]; ?>">
            </div>
            <div class="">
                <?php
                if ('' != $row["sub_category_image"]) {
                ?>
                    <img style="" class="dropzone" name="view_logo_image<?php echo $row["sub_category_id"]; ?>" id="view_logo_image<?php echo $row["sub_category_id"]; ?>" src="../images/<?php echo $row["sub_category_image"]; ?>" />
                <?php

                } else {
                ?>
                    

                <?php
                } ?>
            </div>

            <!-- <script>
                function showimg<?php echo $row["sub_category_id"]; ?>() {
                    document.getElementById("view_logo_image<?php echo $row["sub_category_id"]; ?>").style.display = "block";
                    var x = (document.getElementById("logo_image<?php echo $row["sub_category_id"]; ?>").value).slice(12, 100);
                    console.log(x);
                    document.getElementById("view_logo_image<?php echo $row["sub_category_id"]; ?>").src = "../images/" + x;
                }
            </script> -->

            </input>
        </div>
    </div>

    <!-- <option value="<?php echo $row["sub_category_id"]; ?>"><?php echo $row["sub_category_name"]; ?></option> -->
<?php
}
?>