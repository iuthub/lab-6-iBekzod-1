<?php
error_reporting(0);

$city=$_REQUEST["city"];
$state=$_REQUEST["state"];
$zip=$_REQUEST["zip"];

$isPost= $_SERVER["REQUEST_METHOD"]=="POST";
$isGet = $_SERVER["REQUEST_METHOD"]=="GET";

$isCityError = $isPost && !$city;
$isStateError = $isPost && !preg_match('/^[a-z]{2}$/i', $state);
$isZipError = $isPost && !preg_match('/^\d{5}$/i', $zip);

$isFormError = $isCityError || $isStateError || $isZipError;
//echo $city." ".$state." ".$zip;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Validation Form</title>
    <style media="screen">
      .error {
        color: red;
      }
    </style>
  </head>
  <body>
      <?php if($isGet || $isFormError) { ?>

      <h1>Validation Form</h1>
      <form action="index.php" method="post">
          <dl>
              <dt>City <span class="error"><?= $isCityError?"Please, enter city info here":"" ?></span> </dt>
              <dd> <input type="text" name="city" value="<?= $city ?>"></dd>

              <dt>State <span class="error"><?= $isStateError?"Please, enter state with 2 chars":"" ?></span> </dt>
              <dd> <input type="text" name="state" value="<?= $state ?>"></dd>

              <dt>Zip Code <span class="error"><?= $isZipError?"Please, enter zip code with 5 chars":"" ?></span> </dt>
              <dd> <input type="text" name="zip" value="<?= $zip ?>"></dd>
          </dl>

          <input type="submit" value="Submit">
      </form>
    <?php } else { ?>
          <h1>Thank you for your submission. You city is <?=  $city ?>!</h1>
    <?php } ?>
  </body>
</html>
