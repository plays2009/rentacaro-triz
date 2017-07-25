<?php
  $uploads_dir = '../img';
  $error = $_FILES['imgFileName']['error'];
  $name = $_FILES['imgFileName']['name'];
  move_uploaded_file( $_FILES['imgFileName']['tmp_name'], "$uploads_dir/$name");

  session_start();

  if ($_SESSION['is_login'])  {
    include_once("db_config.php");

    $idx = $_REQUEST['idx'];
    $fileSendQuery = "UPDATE main_images SET image='$name' WHERE idx='$idx'";
    $fileSendResult = $mysqli->query($fileSendQuery);

    echo "<script>alert('수정 완료')</script>";

    echo "<script> opener.location.reload();</script>";
    echo "<script> 				self.close();				</script>";
  }
 ?>
