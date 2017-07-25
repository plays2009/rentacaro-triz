<?php
  $uploads_dir = '../img';
  $error = $_FILES['imgFileName']['error'];
  $name = $_FILES['imgFileName']['name'];
  move_uploaded_file( $_FILES['imgFileName']['tmp_name'], "$uploads_dir/$name");

  session_start();

  if ($_SESSION['is_login'])  {
    include_once("db_config.php");

    $fileSendQuery = "INSERT INTO main_images VALUES('','', '$name' )";
    $fileSendResult = $mysqli->query($fileSendQuery);

    echo "<script>alert('추가 완료')</script>";

    echo "<script> opener.location.reload();</script>";
    echo "<script> 				self.close();				</script>";
  }
 ?>
