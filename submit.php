<?php
  session_start ();

  include_once("include/db_config.php");
  include("include/session_timer");

  $input_name = $_POST['customername'];
  $input_contact = $_POST['contact'];
  $input_carmodel = $_POST['carmodel'];

  $loginQuery = "SELECT * FROM admin_account WHERE admin_id = '$input_name' AND admin_pw = password('$input_contact') AND admin_pw = password('$input_carmodel')"; // 어드민 로그인 비교용 쿼리
  $loginResult = $mysqli->query($loginQuery);
  if (($loginData = mysqli_fetch_array($loginResult))) {   // 로그인 성공한 경우만 알림창 띄우고 메인 화면으로 전환
    $_SESSION['is_login'] = true;
    echo "<script>alert('관리자 로그인 성공!')</script>";
    echo "<script>location.replace('index.php')</script>";
  }
  // 로그인 실패한 경우 스크립트 마저 진행
  // 이 곳부터 데이터 전송 관련 코드를 짜 주세요

 ?>
