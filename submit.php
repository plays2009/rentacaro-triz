<?php
  session_start ();

  include_once("include/db_config.php");
  include("include/session_timer");

  $input_name = $_POST['customername'];
  $input_contact = $_POST['contact'];
  $input_carmodel = $_POST['carmodel'];
  $input_email=$_POST['email'];
  $input_region=$_POST['region'];
  $input_mileage=$_POST['mileage'];
  $input_question=$_POST['question'];

  $loginQuery = "SELECT * FROM admin_account WHERE admin_id = '$input_name' AND admin_pw = password('$input_contact') AND admin_pw = password('$input_carmodel')"; // 어드민 로그인 비교용 쿼리
  $loginResult = $mysqli->query($loginQuery);
  if (($loginData = mysqli_fetch_array($loginResult))) {   // 로그인 성공한 경우만 알림창 띄우고 메인 화면으로 전환
    $_SESSION['is_login'] = true;
    echo "<script>alert('관리자 로그인 성공!')</script>";
    echo "<script>location.replace('index.php')</script>";
  }
  // 로그인 실패한 경우 스크립트 마저 진행
  if($input_name!='admin')
  {
    require 'PHPMailerAutoload.php';

    $mail = new PHPMailer(true);

    $mail->IsSMTP();

  try {

  //메일서버나 인증에관련된 내용

    $mail->Host = "smtp.gmail.com";  // 메일서버 주소

    $mail->SMTPAuth = true; // SMTP 인증을 사용함

    $mail->Port = 465; 	// email 보낼때 사용할 포트를 지정

    $mail->SMTPSecure = "ssl";  // SSL을 사용함

    $mail->Username = "sl930905@gmail.com";  // 계정  [ ??? =gmail 메일주소 @앞부분]

    $mail->Password ="g1049217k"; // 패스워드         [ ??? = gamil 계정 페스워드 ]

    $mail->CharSet = 'utf-8';

    $mail->Encoding = "base64";



    //실제 메일에 관련된내용

    $mail->From="sl930905@gmail.com"; // 메일보내는사람 메일주소

    $mail->FromName= "렌터카로"; //보내는사람 이름

    // 받는사람메일주소 , 받는사람이름

    $mail->AddAddress("sl930905@naver.com", "함슬");

    $mail->Subject = $input_name." 고객님의 상담 요청"; // 메일 제목

    $mail->Body = "이름 : ".$input_name."\n"."연락처 : ".$input_contact."\n"."관심차량 : ".$input_carmodel ."\n"."이메일 : ".$input_email."\n"."지역 : ".$input_region."\n"."예상주행거리 / 년 : ".$input_mileage."\n"."문의사항 : ".$input_question;
    $mail->Send(); // 실제로 메일을 보냄
  
  } catch (phpmailerException $e) {

    echo $e->errorMessage();

  } catch (Exception $e) {

    echo $e->getMessage();

  }
  echo "<script>location.replace('index.php')</script>";
  }

 ?>
