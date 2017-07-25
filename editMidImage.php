<?php
  include_once("include/db_config.php");
  session_start();
  include("include/session_timer.php");
  $targetIdx = $_REQUEST['idx'];
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <title>렌터카로 제품 정보 수정 페이지</title>
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

   <body class="w3-content">
    <form class="w3-center" method=post enctype= "multipart/form-data" action="sendproductinfo.php?idx=<?=$targetIdx?>">
      <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);

        $getProductQuery = "SELECT * FROM mid_products WHERE idx = '$targetIdx'";  // 카테고리에 해당하는 데이터를 가져오는 쿼리
        $getProductResult = $mysqli->query($getProductQuery);

        $getProductData = mysqli_fetch_array($getProductResult);
       ?>

       <h5 class="w3-left" style="margin-left: 10px">차량명 : <input type="text" name="product_name" placeholder="<?=$getProductData['name']?>"></input></h5>
       <h5 class="w3-left" style="margin-left: 10px">사진 : <input type="file" name="product_picture"></input></h5>

     <table class="w3-table w3-striped w3-bordered" style="width: 100%">
       <tr>
         <td><b>차종</b></td>
         <td><input type="text" name="product_category" placeholder="<?=$getProductData['category']?>"></input></td>
       </tr>
      <tr>
        <td><b>차량 가격</b></td>
        <td><input type="text" name="product_price" placeholder="<?=$getProductData['product_price']?>"></input>원</td>
      </tr>
      <tr>
        <td style="background-color: #3a4547; color: #ffffff" colspan="2"><center><b>월 렌탈료</b><center></td>
      </tr>
      <tr>
        <td><b>초기비용 0원</b></td>
        <td style="color: blue"><input type="text" name="first_cost" placeholder="<?=$getProductData['first_cost']?>"></input>원</td>
      </tr>
      <tr>
        <td><b>선수금 30%</b></td>
        <td style="color: red"><input type="text" name="pre_pay_30" placeholder="<?=$getProductData['pre_pay_30']?>"></input>원</td>
      </tr>
      <tr>
        <td><b>비고</b></td>
        <td><input type="text" name="product_note" placeholder="<?=$getProductData['note']?>"></input></td>
      </tr>
     </table>
      <input type="checkbox" name="is_hot" value="1">Hot 상품 적용 여부</input>
      <div class="w3-margin">
       <button class="w3-button w3-blue">확인</button>
       <button class="w3-button w3-blue" onclick="javascript:self.close();">취소</button>
      </div>
    </form>
   </body>
 </html>
