<?php
  session_start();

  if ($_SESSION['is_login'])  {
    include_once("include/db_config.php");

    $mailAddress = $_POST['input_mail'];
    $idx = $_REQUEST['idx'];

    if ($idx == 0) {
      // 새로운 메일 주소를 추가할 때
    $fileSendQuery = "INSERT INTO admin_mail VALUES('', '$mailAddress')";
    $fileSendResult = $mysqli->query($fileSendQuery);

    echo "<script>alert('추가 완료')</script>";
    }  else {
      // 기존의 메일 주소를 수정할 때
      $fileSendQuery = "UPDATE admin_mail SET address='$mailAddress' WHERE idx='$idx'";
      $fileSendResult = $mysqli->query($fileSendQuery);

      echo "<script>alert('수정 완료')</script>";
    }
    echo "<script> opener.location.reload();</script>";
    echo "<script> 				self.close();				</script>";
  }
 ?>
