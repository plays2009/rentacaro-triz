<?php
  session_start();
  include_once("include/db_config.php");

  if ($_SESSION['is_login'])
  {
    $deleteidx = $_REQUEST['idx'];

    $deleteImageQuery = "DELETE FROM admin_mail WHERE idx = '$deleteidx'";
    $deleteImageResult = $mysqli->query($deleteImageQuery);

    echo "<script>alert('삭제 완료')</script>";
    echo "<script>location.replace('index.php')</script>";
  }
 ?>
