<?php
  $uploads_dir = 'img';
  $error = $_FILES['product_picture']['error'];
  $name = $_FILES['product_picture']['name'];
  move_uploaded_file( $_FILES['product_picture']['tmp_name'], "$uploads_dir/$name");

  session_start();
  include_once("include/db_config.php");

  if ($_SESSION['is_login'])  {

    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $first_cost = $_POST['first_cost'];
    $pre_pay_30 = $_POST['pre_pay_30'];
    $note = $_POST['product_note'];
    $is_hot = $_POST['is_hot'];

    $targetIdx = $_REQUEST['idx'];

    include_once("db_config.php");

    $fileSendQuery = "UPDATE mid_products SET image='$name', category='$product_category', name='$product_name',
     product_price='$product_price', first_cost='$first_cost', pre_pay_30='$pre_pay_30', note='$note', is_hot='$is_hot' WHERE idx='$targetIdx'";
    $fileSendResult = $mysqli->query($fileSendQuery);

    echo "<script>alert('수정 완료')</script>";

    echo "<script> opener.location.reload();</script>";
    echo "<script> 				self.close();				</script>";
  }
 ?>
