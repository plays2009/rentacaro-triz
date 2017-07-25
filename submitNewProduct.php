<?php
  $uploads_dir = 'img';
  $error = $_FILES['product_picture']['error'];
  $name = $_FILES['product_picture']['name'];
  move_uploaded_file( $_FILES['product_picture']['tmp_name'], "$uploads_dir/$name");

  session_start();

  if ($_SESSION['is_login'])  {

    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $first_cost = $_POST['first_cost'];
    $pre_pay_30 = $_POST['pre_pay_30'];
    $note = $_POST['product_note'];
    $is_hot = $_POST['is_hot'];

    include_once("include/db_config.php");

    $fileSendQuery = "INSERT INTO mid_products VALUES ('', '$product_category', '$product_name', '$product_price', '$first_cost', '$pre_pay_30', '$name', '$is_hot', '$note')";
    $fileSendResult = $mysqli->query($fileSendQuery);

    echo "<script>alert('등록 완료')</script>";

    echo "<script> opener.location.reload();</script>";
    echo "<script> 				self.close();				</script>";
  }
 ?>
