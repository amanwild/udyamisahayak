<?php include "db.php" ?>
<?php
// $connect = $GLOBALS['connect'];
$state_id = $_POST["state_id"];
$result = mysqli_query($connect,"SELECT * FROM cities");
if($state_id != ''){
    $result = mysqli_query($connect,"SELECT * FROM cities where state_id = $state_id");
}
?>
<option name="city_id" value="" >All Cities</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option name="city_id" value="<?php echo $row["city_id"];?>"><?php echo $row["city_name"];?></option>
<?php
}
?>