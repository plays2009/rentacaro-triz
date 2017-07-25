<?php
  session_start();
  include_once("include/db_config.php");
  include("include/session_timer.php")
 ?>

<!DOCTYPE html>
<html>
  <head>
    <title>렌터카로</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/jejugothic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
    body,p,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Open Sans", "Jeju Gothic", sans-serif;}
    </style>

    <script type='text/javascript'>
    </script>
  </head>

  <!-- 화면 비율 기본 9 : 16 -->
  <body class="w3-content">

    <!-- Main Division -->
    <div class="w3-content" style="width: 960px; min-height: 1280px">

      <!-- 상단 회사소개 및 광고 영역 -->
      <div class="" style="width: 960px">
        <?php include("include/topArea.php"); ?>
      </div>

      <!-- 중단 차량소개 영역 -->
      <?php
      // 중단 차량 소개 리스트 출력을 위한 데이터베이스 호출
      $midQuery;
      ?>
      <div class="" style="width: 960px">
        <?php include ("include/midArea.php"); ?>
      </div>


      <!-- 하단 기타 홍보영역 -->
      <?php
      // 하단 기타 홍보물 출력을 위한 데이터베이스 호출
      $botQuery;
      ?>
      <div class="" style="width: 960px; margin-bottom: 300px">
        <?php include("include/botArea.php") ?>
      </div>


      <!-- bottom bar -->
      <div class="w3-padding w3-gray w3-bottom" style="width:960px">
        <?php include("include/bottombar.php"); ?>
      </div>


    </div>
  </body>
</html>
